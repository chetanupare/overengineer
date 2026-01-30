@extends('layouts.app')

@section('title', 'WPGraphQL Gravity Forms')
@section('meta_description', 'Expose Gravity Forms data and entries over WPGraphQL. Query forms, fields, and entries with a developer-friendly schema.')
@section('theme', 'light')
@section('main_class', 'w-full')

@section('content')
    <section class="relative w-full overflow-hidden bg-[#f6f1e8] text-slate-950">
        <div id="hero-particles" class="pointer-events-none absolute inset-0 z-0"></div>

        <div class="relative z-10">
            <div class="mx-auto w-full max-w-6xl px-6 py-16 sm:px-10 sm:py-20">
                <div class="grid items-start gap-12 lg:grid-cols-12 lg:gap-16">
                    <div class="lg:col-span-6" data-animate="hero">
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/60 px-3 py-1 text-xs font-semibold text-slate-800 shadow-sm ring-1 ring-black/5">
                            <span class="h-1.5 w-1.5 rounded-full bg-cyan-500"></span>
                            <span>WPGraphQL + Gravity Forms</span>
                        </div>

                        <h1 class="mt-6 text-4xl font-black italic tracking-tight sm:text-6xl">
                            Query
                            <span class="text-cyan-700">Gravity Forms</span>
                            with GraphQL.
                        </h1>

                        <p class="mt-6 max-w-xl text-base leading-relaxed text-slate-700">
                            Query forms and fields, fetch entries, and submit forms via GraphQL.
                        </p>

                        <div class="mt-10 flex flex-col gap-3 sm:flex-row">
                            <a
                                href="{{ route('docs.show') }}"
                                class="inline-flex items-center justify-center rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:scale-[1.02] hover:bg-slate-900"
                            >
                                Get started
                            </a>
                            <a
                                href="https://github.com/AxeWP/wp-graphql-gravity-forms"
                                target="_blank"
                                rel="noreferrer"
                                class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-black/5 transition hover:scale-[1.02] hover:bg-white/80"
                            >
                                GitHub
                            </a>
                        </div>

                        <div class="mt-10 grid max-w-xl grid-cols-3 gap-4">
                            <div class="rounded-2xl bg-white/70 p-4 shadow-sm ring-1 ring-black/5">
                                <div class="text-sm font-semibold text-slate-900">Typed</div>
                                <div class="mt-1 text-xs text-slate-600">Predictable schema.</div>
                            </div>
                            <div class="rounded-2xl bg-white/70 p-4 shadow-sm ring-1 ring-black/5">
                                <div class="text-sm font-semibold text-slate-900">Focused</div>
                                <div class="mt-1 text-xs text-slate-600">Minimal API.</div>
                            </div>
                            <div class="rounded-2xl bg-white/70 p-4 shadow-sm ring-1 ring-black/5">
                                <div class="text-sm font-semibold text-slate-900">Practical</div>
                                <div class="mt-1 text-xs text-slate-600">Built for real sites.</div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-6" data-animate="fade-up">
                        <div class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-lg shadow-slate-900/5 ring-1 ring-black/5">
                            <div data-animate="graphql-logo" class="pointer-events-none absolute -right-10 -top-10 rounded-full bg-white/70 p-4 shadow-sm ring-1 ring-black/5">
                                <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="block">
                                    <g stroke="#E535AB" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M60 18 L94 38 L94 82 L60 102 L26 82 L26 38 Z" />
                                        <path d="M60 18 L60 102" />
                                        <path d="M26 38 L94 82" />
                                        <path d="M94 38 L26 82" />
                                    </g>
                                    <g fill="#E535AB">
                                        <circle cx="60" cy="18" r="6" />
                                        <circle cx="94" cy="38" r="6" />
                                        <circle cx="94" cy="82" r="6" />
                                        <circle cx="60" cy="102" r="6" />
                                        <circle cx="26" cy="82" r="6" />
                                        <circle cx="26" cy="38" r="6" />
                                    </g>
                                </svg>
                            </div>

                            <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                                <div class="flex items-center gap-2">
                                    <span class="h-2.5 w-2.5 rounded-full bg-rose-400"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-amber-300"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-emerald-300"></span>
                                </div>
                                <div class="text-xs font-medium text-slate-500">Example query</div>
                            </div>

                            <pre class="mt-4 overflow-x-auto rounded-2xl bg-slate-950 p-4 text-xs leading-relaxed text-slate-100"><code>query Forms {
  gravityForms {
    forms(first: 10) {
      nodes {
        databaseId
        title
        fields {
          nodes {
            id
            type
            label
          }
        }
      }
    }
  }
}</code></pre>

                            <div class="mt-4 grid gap-3 sm:grid-cols-3">
                                <div class="rounded-2xl bg-slate-50 p-4 ring-1 ring-slate-900/5">
                                    <div class="text-xs font-semibold text-slate-600">Forms</div>
                                    <div class="mt-1 text-lg font-black text-slate-900">10</div>
                                </div>
                                <div class="rounded-2xl bg-slate-50 p-4 ring-1 ring-slate-900/5">
                                    <div class="text-xs font-semibold text-slate-600">Fields</div>
                                    <div class="mt-1 text-lg font-black text-slate-900">Typed</div>
                                </div>
                                <div class="rounded-2xl bg-slate-50 p-4 ring-1 ring-slate-900/5">
                                    <div class="text-xs font-semibold text-slate-600">Entries</div>
                                    <div class="mt-1 text-lg font-black text-slate-900">Paged</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="w-full">
        <div class="mx-auto w-full max-w-6xl px-6 py-14 sm:px-10">
            <div class="max-w-2xl" data-animate="fade-up">
                <div class="text-xs font-semibold uppercase tracking-wide text-slate-600">Features</div>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight text-slate-950 sm:text-4xl">Built for real projects</h2>
                <p class="mt-4 text-sm leading-relaxed text-slate-700">A focused schema for Gravity Forms—designed to be easy to query, easy to extend, and safe by default.</p>
            </div>

            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3" data-animate="stagger">
                <a href="{{ route('docs.show', ['page' => 'querying-forms']) }}" class="group rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5 transition duration-300 ease-out hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/5">
                    <div class="flex items-start gap-4">
                        <div class="grid h-10 w-10 place-items-center rounded-2xl bg-cyan-500/10 text-cyan-700 ring-1 ring-cyan-500/15">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                <path d="M4 7h16M7 12h10M10 17h4" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-slate-950">Forms & fields</div>
                            <div class="mt-1 text-sm text-slate-700">Query forms, field definitions, and metadata in one place.</div>
                            <div class="mt-3 text-xs font-semibold text-slate-500 group-hover:text-slate-900">Read docs</div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('docs.show', ['page' => 'querying-entries']) }}" class="group rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5 transition duration-300 ease-out hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/5">
                    <div class="flex items-start gap-4">
                        <div class="grid h-10 w-10 place-items-center rounded-2xl bg-emerald-500/10 text-emerald-700 ring-1 ring-emerald-500/15">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                <path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="2" />
                                <path d="M8 10h8M8 14h6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-slate-950">Entries</div>
                            <div class="mt-1 text-sm text-slate-700">Fetch entries with pagination.</div>
                            <div class="mt-3 text-xs font-semibold text-slate-500 group-hover:text-slate-900">Read docs</div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('docs.show', ['page' => 'submitting-forms']) }}" class="group rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5 transition duration-300 ease-out hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/5">
                    <div class="flex items-start gap-4">
                        <div class="grid h-10 w-10 place-items-center rounded-2xl bg-fuchsia-500/10 text-fuchsia-700 ring-1 ring-fuchsia-500/15">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                <path d="M12 4v16M4 12h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-slate-950">Submitting forms</div>
                            <div class="mt-1 text-sm text-slate-700">Submit entries and draft entries with predictable inputs.</div>
                            <div class="mt-3 text-xs font-semibold text-slate-500 group-hover:text-slate-900">Read docs</div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('docs.show', ['page' => 'updating-entries']) }}" class="group rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5 transition duration-300 ease-out hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/5">
                    <div class="flex items-start gap-4">
                        <div class="grid h-10 w-10 place-items-center rounded-2xl bg-slate-950 text-white">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                <path d="M12 6v6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <path d="M8 3h8v3H8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                                <path d="M6 12h12v9H6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-slate-950">Updating entries</div>
                            <div class="mt-1 text-sm text-slate-700">Update submitted entries and draft entries via GraphQL.</div>
                            <div class="mt-3 text-xs font-semibold text-slate-500 group-hover:text-slate-900">Read docs</div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('docs.show', ['page' => 'deleting-entries']) }}" class="group rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5 transition duration-300 ease-out hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/5">
                    <div class="flex items-start gap-4">
                        <div class="grid h-10 w-10 place-items-center rounded-2xl bg-rose-500/10 text-rose-700 ring-1 ring-rose-500/15">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                <path d="M9 3h6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <path d="M6 6h12" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <path d="M8 6l1 15h6l1-15" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-slate-950">Deleting entries</div>
                            <div class="mt-1 text-sm text-slate-700">Delete entries and draft entries via GraphQL mutations.</div>
                            <div class="mt-3 text-xs font-semibold text-slate-500 group-hover:text-slate-900">Read docs</div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('docs.show', ['page' => 'build-triggers']) }}" class="group rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5 transition duration-300 ease-out hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/5">
                    <div class="flex items-start gap-4">
                        <div class="grid h-10 w-10 place-items-center rounded-2xl bg-cyan-500/10 text-cyan-700 ring-1 ring-cyan-500/15">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                <path d="M5 15c2-6 4-6 7 0s5 6 7 0" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <path d="M6 7h12" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-slate-950">Build triggers</div>
                            <div class="mt-1 text-sm text-slate-700">Trigger builds with WPGatsby and Jamstack Deployments.</div>
                            <div class="mt-3 text-xs font-semibold text-slate-500 group-hover:text-slate-900">Read docs</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="w-full">
        <div class="mx-auto w-full max-w-6xl px-6 py-14 sm:px-10">
            <div class="grid gap-10 lg:grid-cols-12 lg:items-start">
                <div class="lg:col-span-5" data-animate="fade-up">
                    <div class="text-xs font-semibold uppercase tracking-wide text-slate-600">Quickstart</div>
                    <h2 class="mt-3 text-3xl font-semibold tracking-tight text-slate-950 sm:text-4xl">Go from install to query in minutes</h2>
                    <p class="mt-4 text-sm leading-relaxed text-slate-700">A minimal setup for local development and a first query you can paste into GraphiQL.</p>

                    <div class="mt-8 grid gap-4" data-animate="stagger">
                        <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5">
                            <div class="flex items-start gap-3">
                                <div class="mt-0.5 grid h-8 w-8 place-items-center rounded-2xl bg-slate-950 text-xs font-black text-white">1</div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-950">Install WPGraphQL + Gravity Forms</div>
                                    <div class="mt-1 text-sm text-slate-700">Install & activate WPGraphQL, then Gravity Forms (and any supported addons).</div>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5">
                            <div class="flex items-start gap-3">
                                <div class="mt-0.5 grid h-8 w-8 place-items-center rounded-2xl bg-slate-950 text-xs font-black text-white">2</div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-950">Install this plugin</div>
                                    <div class="mt-1 text-sm text-slate-700">Download the release ZIP and activate it (or install via Composer for dev workflows).</div>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5">
                            <div class="flex items-start gap-3">
                                <div class="mt-0.5 grid h-8 w-8 place-items-center rounded-2xl bg-slate-950 text-xs font-black text-white">3</div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-950">Query and submit</div>
                                    <div class="mt-1 text-sm text-slate-700">Use GraphiQL to query forms/entries and submit entries via `submitGfForm`.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 rounded-3xl bg-white/60 p-5 ring-1 ring-black/5" data-animate="fade-up">
                        <div class="text-xs font-semibold uppercase tracking-wide text-slate-600">Links</div>
                        <div class="mt-3 grid gap-2 text-sm">
                            <a class="text-slate-700 hover:text-slate-950" href="https://github.com/AxeWP/wp-graphql-gravity-forms/releases/latest" target="_blank" rel="noreferrer">Latest release</a>
                            <a class="text-slate-700 hover:text-slate-950" href="https://github.com/axewp/wp-graphql-gravity-forms/releases/latest/download/wp-graphql-gravity-forms.zip" target="_blank" rel="noreferrer">Download plugin ZIP</a>
                            <a class="text-slate-700 hover:text-slate-950" href="https://github.com/dre1080/wp-graphql-upload" target="_blank" rel="noreferrer">WPGraphQL Upload (recommended for file uploads)</a>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('docs.show') }}" class="inline-flex items-center justify-center rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-900">Open full docs</a>
                    </div>
                </div>

                <div class="lg:col-span-7" data-animate="fade-up">
                    <div class="relative overflow-hidden rounded-3xl bg-slate-950 p-6 text-slate-100 shadow-lg shadow-slate-900/10 ring-1 ring-black/10">
                        <div class="flex items-center justify-between">
                            <div class="text-xs font-semibold text-slate-300">Copy/paste example</div>
                            <div class="rounded-full bg-fuchsia-500/15 px-3 py-1 text-xs font-semibold text-fuchsia-200">GraphQL</div>
                        </div>

                        <pre class="mt-4 overflow-x-auto rounded-2xl bg-black/30 p-4 text-xs leading-relaxed"><code>query Forms {
  gravityForms {
    forms(first: 10) {
      nodes {
        databaseId
        title
        fields {
          nodes {
            id
            type
            label
          }
        }
      }
    }
  }
}

# Tip: introspect the schema to see available field types.</code></pre>

                        <div class="mt-4 grid gap-3 sm:grid-cols-3">
                            <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                                <div class="text-xs text-slate-300">Docs</div>
                                <div class="mt-1 text-sm font-semibold text-white">Markdown-based</div>
                            </div>
                            <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                                <div class="text-xs text-slate-300">SEO</div>
                                <div class="mt-1 text-sm font-semibold text-white">Static pages</div>
                            </div>
                            <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                                <div class="text-xs text-slate-300">DX</div>
                                <div class="mt-1 text-sm font-semibold text-white">Predictable API</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="use-cases" class="w-full">
        <div class="mx-auto w-full max-w-6xl px-6 py-14 sm:px-10">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
                <div data-animate="fade-up">
                    <h2 class="text-2xl font-semibold tracking-tight text-slate-950">Use cases</h2>
                    <p class="mt-3 text-sm leading-relaxed text-slate-700">Headless sites, internal tooling, and integrations that need structured form data.</p>

                    <div class="mt-8 grid gap-4" data-animate="stagger">
                        <div class="group rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5 transition duration-300 ease-out hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/5">
                            <div class="flex items-start gap-4">
                                <div class="grid h-10 w-10 place-items-center rounded-2xl bg-slate-950 text-white">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                        <path d="M7 7h10M7 12h10M7 17h6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-950">Headless frontends</div>
                                    <div class="mt-1 text-sm text-slate-700">Build UIs that query and submit forms via GraphQL.</div>
                                    <div class="mt-3 text-xs font-semibold text-slate-500">Next.js, Astro, Remix</div>
                                </div>
                            </div>
                        </div>
                        <div class="group rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5 transition duration-300 ease-out hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/5">
                            <div class="flex items-start gap-4">
                                <div class="grid h-10 w-10 place-items-center rounded-2xl bg-cyan-500/10 text-cyan-700 ring-1 ring-cyan-500/15">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                        <path d="M12 3v18M3 12h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-950">Integrations</div>
                                    <div class="mt-1 text-sm text-slate-700">Sync entries to CRMs, analytics, and data pipelines.</div>
                                    <div class="mt-3 text-xs font-semibold text-slate-500">ETL-friendly</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 rounded-3xl bg-white/60 p-5 ring-1 ring-black/5" data-animate="fade-up">
                        <div class="text-xs font-semibold uppercase tracking-wide text-slate-600">Works with</div>
                        <div class="mt-3 grid gap-2 sm:grid-cols-3">
                            <div class="rounded-2xl bg-white p-4 ring-1 ring-black/5">
                                <div class="text-sm font-semibold text-slate-950">WordPress</div>
                                <div class="mt-1 text-xs text-slate-600">Your existing stack</div>
                            </div>
                            <div class="rounded-2xl bg-white p-4 ring-1 ring-black/5">
                                <div class="text-sm font-semibold text-slate-950">Gravity Forms</div>
                                <div class="mt-1 text-xs text-slate-600">Forms + entries</div>
                            </div>
                            <div class="rounded-2xl bg-white p-4 ring-1 ring-black/5">
                                <div class="text-sm font-semibold text-slate-950">WPGraphQL</div>
                                <div class="mt-1 text-xs text-slate-600">GraphQL endpoint</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative" data-animate="fade-up">
                    <div class="absolute -inset-6 rounded-3xl bg-gradient-to-br from-cyan-400/20 via-transparent to-white/20 blur-2xl"></div>
                    <div class="relative rounded-3xl bg-white p-6 shadow-lg shadow-slate-900/5 ring-1 ring-black/5">
                        <div class="text-xs font-semibold text-slate-600">Example mutation</div>
                        <pre class="mt-4 overflow-x-auto rounded-2xl bg-slate-950 p-4 text-xs leading-relaxed text-slate-100"><code>mutation Submit {
  submitGravityForm(
    input: {
      formId: 1
      fieldValues: [
        { id: 1, value: "alex@example.com" }
        { id: 2, value: "Hello" }
      ]
    }
  ) {
    entry {
      databaseId
      dateCreated
    }
    errors {
      message
    }
  }
}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full" data-animate="fade-up">
        <div class="mx-auto w-full max-w-6xl px-6 pb-16 sm:px-10">
            <div class="relative overflow-hidden rounded-3xl bg-slate-950 px-6 py-12 text-white shadow-lg shadow-slate-900/10 ring-1 ring-black/10 sm:px-10">
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-fuchsia-500/20 via-cyan-500/10 to-transparent"></div>
                <div class="relative grid gap-10 lg:grid-cols-2 lg:items-center">
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wide text-slate-300">Get started</div>
                        <h2 class="mt-3 text-3xl font-semibold tracking-tight sm:text-4xl">Get started quickly</h2>
                        <p class="mt-4 text-sm leading-relaxed text-slate-200">Install the plugin and start querying Gravity Forms from your frontend.</p>

                        <div class="mt-6 grid gap-3 sm:grid-cols-3">
                            <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                                <div class="text-xs text-slate-300">Docs</div>
                                <div class="mt-1 text-sm font-semibold">Markdown</div>
                            </div>
                            <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                                <div class="text-xs text-slate-300">DX</div>
                                <div class="mt-1 text-sm font-semibold">Typed schema</div>
                            </div>
                            <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                                <div class="text-xs text-slate-300">Style</div>
                                <div class="mt-1 text-sm font-semibold">Clean</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                        <a href="{{ route('docs.show') }}" class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-950 hover:bg-slate-100">Open docs</a>
                        <a href="https://github.com/AxeWP/wp-graphql-gravity-forms" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center rounded-xl bg-white/5 px-5 py-3 text-sm font-semibold text-white ring-1 ring-white/15 hover:bg-white/10">Star on GitHub</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full">
        <div class="mx-auto w-full max-w-6xl px-6 py-14 sm:px-10">
            <div class="text-center">
                <div class="text-xs font-semibold uppercase tracking-wide text-slate-600">Downloads</div>
                <h2 class="mt-3 text-2xl font-semibold tracking-tight text-slate-950 sm:text-3xl">Get the plugin</h2>
                <p class="mt-4 text-sm leading-relaxed text-slate-700">Install from the latest release or use Composer for development workflows.</p>
                <div class="mt-6 flex flex-wrap justify-center gap-4">
                    <a href="https://github.com/AxeWP/wp-graphql-gravity-forms/releases/latest" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-900">Latest release</a>
                    <a href="https://github.com/axewp/wp-graphql-gravity-forms/releases/latest/download/wp-graphql-gravity-forms.zip" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-950 ring-1 ring-black/5 hover:bg-slate-100">Download ZIP</a>
                </div>
                <div class="mt-8">
                    <div class="mx-auto max-w-md rounded-2xl bg-white/60 p-4 shadow-sm ring-1 ring-black/5">
                        <div class="text-xs font-semibold text-slate-600">Composer</div>
                        <pre class="mt-2 overflow-x-auto rounded-lg bg-slate-950 p-3 text-xs text-slate-100"><code>composer require harness-software/wp-graphql-gravity-forms</code></pre>
                        <div class="mt-3 text-xs text-slate-700">
                            <span class="font-semibold">Note:</span> Use the release ZIP unless you need source code. If using source, run <code class="rounded bg-slate-200 px-1 py-0.5 text-xs">composer install</code> in the plugin folder.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full">
        <div class="mx-auto w-full max-w-6xl px-6 py-14 sm:px-10">
            <div class="text-center">
                <div class="text-xs font-semibold uppercase tracking-wide text-slate-600">Sponsors</div>
                <h2 class="mt-3 text-2xl font-semibold tracking-tight text-slate-950 sm:text-3xl">Support the project</h2>
                <p class="mt-4 text-sm leading-relaxed text-slate-700">Development of WPGraphQL for Gravity Forms is provided by AxePress Development. Community contributions are welcome and encouraged.</p>
                <div class="mt-6 flex flex-wrap justify-center gap-4">
                    <a href="https://github.com/sponsors/AxeWP" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-900">Sponsor on GitHub</a>
                    <a href="https://axepress.dev" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-950 ring-1 ring-black/5 hover:bg-slate-100">AxePress.dev</a>
                    <a href="https://discord.gg/Hp6fQbqvwe" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-700">Join Discord</a>
                </div>
                <div class="mt-8 flex justify-center">
                    <div class="flex items-center gap-3 rounded-2xl bg-white/60 px-4 py-2 shadow-sm ring-1 ring-black/5">
                        <span class="text-xs font-semibold text-slate-600">Primary sponsor</span>
                        <a href="https://mysafetyhq.com/" target="_blank" rel="sponsored" class="flex items-center gap-2">
                            <img src="https://avatars.githubusercontent.com/u/50597878?s=32&v=4" alt="SafetyHQ" class="h-6 w-6 rounded-full" />
                            <span class="text-xs font-medium text-slate-900">SafetyHQ</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        (function () {
            const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const isMobile = window.innerWidth < 768;
            if (reduceMotion || isMobile) return;

            const el = document.getElementById('hero-particles');
            if (!el || typeof window.particlesJS !== 'function') return;

            window.particlesJS('hero-particles', {
                particles: {
                    number: { value: 55, density: { enable: true, value_area: 900 } },
                    color: { value: '#E535AB' },
                    shape: { type: 'circle' },
                    opacity: { value: 0.35, random: true },
                    size: { value: 2.4, random: true },
                    line_linked: {
                        enable: true,
                        distance: 140,
                        color: '#E535AB',
                        opacity: 0.22,
                        width: 1,
                    },
                    move: {
                        enable: true,
                        speed: 0.55,
                        direction: 'none',
                        random: false,
                        straight: false,
                        out_mode: 'out',
                        bounce: false,
                    },
                },
                interactivity: {
                    detect_on: 'canvas',
                    events: {
                        onhover: { enable: true, mode: 'grab' },
                        onclick: { enable: false, mode: 'push' },
                        resize: true,
                    },
                    modes: {
                        grab: { distance: 180, line_linked: { opacity: 0.35 } },
                    },
                },
                retina_detect: true,
            });
        })();
    </script>
@endpush
