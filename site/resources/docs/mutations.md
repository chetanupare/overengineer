# Mutations

Use mutations to submit a form from a headless frontend.

```graphql
mutation Submit {
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
    }
    errors {
      message
    }
  }
}
```
