# Delete an Entry or Draft Entry

## Delete an Entry

Use `deleteGfEntry`.

```graphql
mutation {
  deleteGfEntry(input: { id: 5 }) {
    deletedId
  }
}
```

## Delete a Draft Entry

Use `deleteGfDraftEntry`.

```graphql
mutation {
  deleteGfDraftEntry(
    input: { id: "524d5f3a30c845b29a8db35c9f2aaf29", idType: RESUME_TOKEN }
  ) {
    deletedId
  }
}
```
