# Querying Entries & Draft Entries

Gravity Forms entries are registered to the GraphQL schema as the `GfEntry` interface, with entry types implementing that interface.

Supported entry types:

- `SubmittedEntry` (submitted entries)
- `DraftEntry` (Save & Continue draft entries, queried by `resumeToken`)

## Get a single entry

You can query entries via `gfSubmittedEntry` or through the `gfEntry` interface.

The `id` input accepts either a Gravity Forms Entry ID (`idType: DATABASE_ID`) or a global ID (`idType: ID`). See: [Global IDs vs Database IDs](/docs/using-global-ids).

### Example

```graphql
{
  gfEntry(id: 2977, idType: DATABASE_ID) {
    id
    formDatabaseId
    isDraft
    formFields(first: 300) {
      nodes {
        databaseId
        type
        ... on TextField {
          label
          value
        }
      }
    }
    ... on SubmittedEntry {
      databaseId
      isStarred
    }
  }

  gfSubmittedEntry(id: 2977, idType: DATABASE_ID) {
    databaseId
    id
    formDatabaseId
    isDraft
    isStarred
    formFields(first: 300) {
      nodes {
        databaseId
        type
        ... on TextField {
          label
          value
        }
      }
    }
  }
}
```

### Draft entry by resume token

```graphql
{
  gfEntry(id: "f82a5d986f4d4f199893f751adee98e9", idType: RESUME_TOKEN) {
    ... on GfDraftEntry {
      resumeToken
    }
  }
}
```

## Get a list of entries

Cursor-based pagination is supported.

```graphql
{
  gfEntries(
    first: 20
    after: "YXJyYXljb25uZWN0aW9uOjk="
    where: {
      formIds: [1]
      dateFilters: { startDate: "2019-09-22 02:26:23", endDate: "2019-10-25 02:26:23" }
      entryType: SUBMITTED
      fieldFiltersMode: ALL
      fieldFilters: [
        { key: "id", intValues: [5, 27, 350] }
        { key: "created_by", intValues: [1], operator: IN }
        { key: "5", stringValues: ["somevalue"], operator: IN }
        { stringValues: "somevalue", operator: CONTAINS }
      ]
      orderby: { order: ASC, isNumeric: false, field: "date_created" }
      status: ACTIVE
    }
  ) {
    pageInfo {
      startCursor
      endCursor
      hasPreviousPage
      hasNextPage
    }
    nodes {
      formDatabaseId
      isDraft
      formFields(first: 300) {
        nodes {
          ... on TextField {
            value
          }
        }
      }
      ... on GfSubmittedEntry {
        databaseId
        status
      }
    }
  }
}
```

## Access Permissions

This plugin respects Gravity Forms default access permissions.

By default, logged-in users may access their own individual submitted entries. Users with either the `gravityforms_view_entries` or `gform_full_access` capabilities can view others' submitted entries and query lists.

To customize access, see [Actions & Filters](/docs/actions-and-filters).
