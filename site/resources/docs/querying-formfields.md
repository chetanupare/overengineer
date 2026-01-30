# Querying `formFields`

`formFields` can be queried from a `GfForm` or a `GfEntry`.

There are two common approaches:

- **Deterministic** queries (query specific field types)
- **Interface-driven** queries (query based on shared settings/interfaces)

## Basic Usage (deterministic)

```graphql
{
  gfForm(id: 1, idType: DATABASE_ID) {
    databaseId
    formFields(first: 300) {
      nodes {
        databaseId
        type
        cssClass
        ... on TextField {
          description
          label
          isRequired
        }
        ... on CheckboxField {
          description
          label
          choices {
            isSelected
            text
            value
          }
        }
        ... on NameField {
          description
          label
          inputs {
            isHidden
            label
            placeholder
          }
        }
      }
    }
  }
}
```

## Advanced Usage (interfaces)

This approach scales better when forms are configurable and field types vary.

```graphql
{
  gfForm(id: 1, idType: DATABASE_ID) {
    databaseId
    formFields(where: { pageNumber: 1 }) {
      nodes {
        databaseId
        inputType
        type
        ... on GfFieldWithLabelSetting {
          label
        }
        ... on GfFieldWithRulesSetting {
          isRequired
        }
        ... on GfFieldWithInputs {
          inputs {
            id
            label
          }
        }
        ... on GfFieldWithChoices {
          choices {
            text
            value
          }
        }
      }
    }
  }
}
```

For more examples (including filtering and entry values), see upstream docs:
https://github.com/AxeWP/wp-graphql-gravity-forms/blob/develop/docs/querying-formfields.md
