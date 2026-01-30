# Submitting Forms

Form submissions are handled with the `submitGfForm` mutation.

This mutation can be used either to submit an Entry or to submit a draft entry by setting `saveAsDraft: true`.

> **Important**
>
> Due to GraphQL not supporting input unions, you must use the value input that matches the specific field type.

## Example mutation

```graphql
{
  submitGfForm(
    input: {
      id: 50
      entryMeta { createdById: 1 ip: "" }
      fieldValues: [
        { id: 1 value: "This is a text field value." }
        { id: 2 values: ["First Choice", "Second Choice"] }
        {
          id: 3
          addressValues: {
            street: "1600 Pennsylvania Avenue NW"
            lineTwo: "Office of the President"
            city: "Washington"
            state: "DC"
            zip: "20500"
            country: "USA"
          }
        }
        {
          id: 5
          checkboxValues: [
            { inputId: 5.1, value: "This checkbox field is selected" }
            { inputId: 5.2, value: "This checkbox field is also selected" }
          ]
        }
      ]
      saveAsDraft: false
      sourcePage: 1
      targetPage: 0
    }
  ) {
    confirmation { type message url }
    errors {
      id
      message
      connectedFormField { database type }
    }
    entry {
      id
      ... on GfSubmittedEntry { databaseId }
      ... on GfDraftEntry { resumeToken }
    }
  }
}
```

## Captcha validation

As of v0.11.0, server-side captcha validation is supported. Pass the captcha response token as the field value.

## Submitting file uploads

To submit files via `fileUploadValues` or `postImageValues`, install and activate [WPGraphQL Upload](https://github.com/dre1080/wp-graphql-upload) (adds the `Upload` scalar).

> **Important**
>
> Many GraphQL clients require `graphql-multipart-request-spec` support (e.g. `apollo-upload-client`).

Example:

```graphql
mutation submit($exampleUploads: [Upload], $exampleImageUpload: Upload) {
  submitGfForm(
    input: {
      id: 50
      fieldValues: [
        { id: 1 fileUploadValues: $exampleUploads }
        {
          id: 2
          postImageValues {
            altText: "Some alt text"
            caption: "Some caption"
            image: $exampleImageUpload
            description: "Some description"
            title: "Some title"
          }
        }
      ]
    }
  ) {
    errors { id message }
    confirmation { message }
    entry { databaseId }
  }
}
```

## Multi-page forms

Use `sourcePage` and `targetPage` to validate a page before progressing.

For full details and additional field inputs, see upstream docs:
https://github.com/AxeWP/wp-graphql-gravity-forms/blob/develop/docs/submitting-forms.md
