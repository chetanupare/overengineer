# Recipes

## Register a custom Gravity Forms entries connection

Connections to submitted Gravity Forms entries can be created using `\WPGraphQL\GF\Data\Factory::resolve_entries_connection()`.

```php
'resolve' => static function( $source, array $args, \WPGraphQL\AppContext $context, \GraphQL\Type\Definition\ResolveInfo $info ) {
  return \WPGraphQL\GF\Data\Factory::resolve_entries_connection($source, $args, $context, $info );
}
```

### Example: Create a connection from a Post to entries for a form ID stored in post meta

```php
add_action( 'graphql_register_types', 'my_add_entries_to_post' );
function my_add_entries_to_post() {
  register_graphql_connection(
    [
      'fromType' => 'Post',
      'toType'   => \WPGraphQL\GF\Type\WPObject\Entry\SubmittedEntry::$type,
      'resolve' => static function( $source, array $args, \WPGraphQL\AppContext $context, \GraphQL\Type\Definition\ResolveInfo $info ) {
        $form_id = get_post_meta( $source->ID, 'my_custom_meta_field_form_id', true );
        $args['where']['formIds'] = $form_id;
        return \WPGraphQL\GF\Data\Factory::resolve_entries_connection($source, $args, $context, $info );
      }
    ]
  );
}
```
