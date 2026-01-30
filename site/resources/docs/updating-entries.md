# Updating Entries & Draft Entries.

## Update an Entry

You can update a Gravity Forms entry with the `updateGfEntry` mutation.

```graphql
{
  updateGfEntry(
    input: {
      id: 1
      entryMeta: {
        isRead: false
        isStarred: false
        status: ACTIVE
      }
      fieldValues: [
        { id: 1, value: "This is a text field value." }
      ]
      shouldValidate: true
    }
  ) {
    errors {
      id
      message
      connectedFormField {
        id
        type
      }
    }
    entry {
      id
    }
  }
}
```

## Update a Draft Entry

Updating a draft entry uses `updateGfDraftEntry`.

```graphql
{
  updateGfDraftEntry(
    input: {
      id: "f82a5d986f4d4f199893f751adee98e9"
      idType: RESUME_TOKEN
      entryMeta: { dateCreatedGmt: "2021-12-31 23:59:59" }
      fieldValues: [
        { id: 1, value: "This is a text field value." }
      ]
    }
  ) {
    draftEntry {
      resumeToken
    }
  }
}
```
