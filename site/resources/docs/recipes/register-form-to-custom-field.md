# Recipes

## Register a Gravity Forms form to a custom GraphQL field

Individual Gravity Forms forms can be fetched performantly using a WPGraphQL Loader.

```php
'resolve' => static function( $source, array $args, AppContext $context, ResolveInfo $info ) {
  $form_id = 1;

  return $context->get_loader( \WPGraphQL\GF\Data\Loader\FormsLoader::$name )->load_deferred( $form_id );
}
```

### Example: Resolve a Gravity Forms form from custom Post meta

```php
add_action( 'graphql_register_types', 'my_add_form_to_post' );
function my_add_form_to_post() {
  register_graphql_field(
    'Post',
    'form',
    [
      'description' => static fn () => __( 'The Gravity Forms form for the post', 'my-plugin' ),
      'type' => \WPGraphQL\GF\Type\WPObject\Form\Form::$type,
      'resolve' => static function( $source, array $args, \WPGraphQL\AppContext $context ){
        $form_id = get_post_meta( $source->ID, 'my_custom_meta_field_form_id', true );
        return \WPGraphQL\GF\Data\Factory::resolve_form( $form_id, $context );
      }
    ]
  );
}
```
