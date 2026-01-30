# Gravity Forms Field Support

Gravity Forms has a robust ecosystem of extensions. WPGraphQL for Gravity Forms aims to make customization easy, but there are limitations to what can be supported out of the box.

By default, WPGraphQL for Gravity Forms adds basic query support for all Form fields recognized by Gravity Forms (including custom ones). These types inherit the `FormField` interface.

> **Note**
>
> As of v0.10.0, Experimental fields are hidden by default and must be enabled.

## Form Field input types

Some fields can resolve dynamically to multiple types. For Gravity Forms core, these are registered as GraphQL interfaces with concrete object types.

Developers supporting custom multi-type fields can use the `graphql_gf_form_field_child_types` filter (see recipes).

## Mutation Support

Only certain fields are supported by mutations. Custom fields often require registering a custom `FieldValueInput`.

## Enabling/Disabling Field Support

You can enable/disable support for individual field types using `graphql_gf_ignored_field_types`:

```php
add_filter(
  'graphql_gf_ignored_field_types',
  function( array $ignored_fields ) : array {

    // Disable the 'MultiSelect' field.
    $ignored_fields[] = 'multiselect';

    // Enable the repeater field:
    $ignored_fields = array_diff( $ignored_fields, ['repeater'] );

    return $ignored_fields;
  }
);
```

For the full list of supported/experimental/unsupported fields, see upstream docs:
https://github.com/AxeWP/wp-graphql-gravity-forms/blob/develop/docs/form-field-support.md
