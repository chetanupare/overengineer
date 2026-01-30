# Global IDs vs Database IDs

The `id` input for Form and Entry queries accepts either the Gravity Forms ID (`idType: DATABASE_ID`) assigned to the WordPress database, or a global (base-64 encoded) ID (`idType: ID`).

To generate a global ID for an object, encode the name of the WPGraphQL Data Loader, followed by the database ID.

In JavaScript you can do this using `btoa()`:

```js
const globalId = btoa(`gf_form:1`); // "Z2ZfZm9ybTox"
```

You can also retrieve the global ID by returning the `id` field on the object.

## Example

```graphql
query gfForm {
  gfForm(id: "Z2ZfZm9ybTox", idType: ID) {
    databaseId
    id
    dateCreated
    isActive
    isTrash
  }
}
```
