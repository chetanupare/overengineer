# Actions & Filters

WPGraphQL for Gravity Forms exposes actions and filters to customize schema registration, access permissions, and query/mutation behavior.

## Actions

- `graphql_gf_init`
- `graphql_gf_after_register_types`
- `graphql_gf_before_register_types`
- `graphql_gf_after_register_form_field`
- `graphql_gf_after_register_form_field_object`

## Filters

- `graphql_gf_can_view_draft_entries`
- `graphql_gf_can_view_entries`
- `graphql_gf_entries_connection_query_args`
- `graphql_gf_field_value_input_class`
- `graphql_gf_field_value_input_args`
- `graphql_gf_field_value_input_name`
- `graphql_gf_field_value_input_prepared_value`
- `graphql_gf_forms_connection_query_args`
- `graphql_gf_form_field_child_types`
- `graphql_gf_form_field_name_map`
- `graphql_gf_form_field_setting_choice_fields`
- `graphql_gf_form_field_setting_input_fields`
- `graphql_gf_form_field_setting_fields`
- `graphql_gf_form_field_settings_with_choices`
- `graphql_gf_form_field_settings_with_inputs`
- `graphql_gf_form_field_value_fields`
- `graphql_gf_form_field_values_input_fields`
- `graphql_gf_form_object`
- `graphql_gf_gatsby_enabled_actions`
- `graphql_gf_ignored_field_types`
- `graphql_gf_update_repo_url`

For the full, detailed reference (including signatures and examples), see upstream docs:
https://github.com/AxeWP/wp-graphql-gravity-forms/blob/develop/docs/actions-and-filters.md
