<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/docs/{page?}', function (Request $request, ?string $page = null) {
    $page = $page ?: 'index';
    $page = trim($page, '/');

    abort_if($page === '', 404);
    abort_if(str_contains($page, '..'), 404);

    $path = resource_path("docs/{$page}.md");
    abort_unless(is_file($path), 404);

    $sections = config('docs.sections', []);
    $title = 'Docs';

    foreach ($sections as $section) {
        foreach (($section['pages'] ?? []) as $p) {
            if (($p['slug'] ?? null) === $page) {
                $title = $p['title'] ?? $title;
                break 2;
            }
        }
    }

    if ($title === 'Docs') {
        $title = $page === 'index' ? 'Introduction' : Str::of($page)->replace('-', ' ')->title()->toString();
    }

    if ($request->boolean('_partial')) {
        return response()->json([
            'page' => $page,
            'title' => $title,
            'html' => Str::markdown(file_get_contents($path)),
        ]);
    }

    return view('docs.show', [
        'page' => $page,
        'title' => $title,
        'sections' => $sections,
        'markdown' => file_get_contents($path),
    ]);
})
    ->where('page', '.*')
    ->name('docs.show');
