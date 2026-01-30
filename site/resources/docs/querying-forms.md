# Querying Forms

Gravity Forms form objects can be queried with `gfForm`. The examples below show how to fetch a Form and its associated `formFields`.

The `id` input accepts either the Gravity Forms form ID (`idType: DATABASE_ID`) or a global ID (`idType: ID`). See: [Global IDs vs Database IDs](/docs/using-global-ids).

## Get a Single Form

```graphql
{
  gfForm(id: 50, idType: DATABASE_ID) {
    cssClass
    databaseId
    dateCreated
    formFields {
      nodes {
        databaseId
        type
        ... on TextField {
          label
          description
        }
      }
    }
    title
  }
}
```

## Get a List of Forms

Cursor-based pagination is supported. Use `first`, `last`, `before`, `after`, plus `pageInfo`.

```graphql
{
  gfForms(
    first: 10
    after: "YXJyYXljb25uZWN0aW9uOjM="
    where: {
      formIds: [1]
      orderby: { order: ASC, field: "title" }
      status: ACTIVE
    }
  ) {
    pageInfo {
      startCursor
      endCursor
      hasPreviousPage
      hasNextPage
    }
    edges {
      cursor
      node {
        databaseId
        title
        formFields(first: 300) {
          nodes {
            type
            databaseId
            cssClass
            ... on TextField {
              label
            }
          }
        }
      }
    }
  }
}
```

## Query an embedded Form from the Gravity Forms Block

Gravity Forms can be embedded using the Gravity Forms block.

When coupled with [WPGraphQL Content Blocks](https://github.com/wpengine/wp-graphql-content-blocks), you can query the embedded form directly from the parsed block content.

> **Important**
>
> To query the `GfForm` object from the block content, you must have WPGraphQL Content Blocks v4.0+ installed and activated.

```graphql
{
  post(id: $post_id, idType: DATABASE_ID) {
    databaseId
    editorBlocks {
      name
      ... on GravityformsForm {
        attributes {
          form {
            databaseId
            formFields {
              nodes {
                databaseId
                type
                ... on TextField {
                  label
                  description
                }
              }
            }
            title
          }
        }
      }
    }
  }
}
```
