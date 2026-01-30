# Installation

## System Requirements

- PHP: 7.4-8.4+
- WordPress: 6.0+
- WPGraphQL: 1.26.0+
- Gravity Forms: 2.7+
- Recommended: [WPGraphQL Upload](https://github.com/dre1080/wp-graphql-upload) (used for file uploads)

## Quick Install

1. Install & activate [WPGraphQL](https://www.wpgraphql.com/).
2. Install & activate [Gravity Forms](https://www.gravityforms.com/) and any supported addons.
3. Download `wp-graphql-gravity-forms.zip` from the [latest release](https://github.com/AxeWP/wp-graphql-gravity-forms/releases/latest), upload it to your WordPress install, and activate the plugin.

> **Important**
>
> Make sure you are downloading [`wp-graphql-gravity-forms.zip`](https://github.com/axewp/wp-graphql-gravity-forms/releases/latest/download/wp-graphql-gravity-forms.zip) from the releases page, not the `Source code (zip)` file.
>
> If you wish to use the source code, you will need to run `composer install` inside the plugin folder to install the required dependencies.

## Verify

Visit your WPGraphQL endpoint and confirm the schema includes the Gravity Forms types (for example, queries like `gfForms`, `gfEntries`, and `submitGfForm`).

## With Composer

```bash
composer require harness-software/wp-graphql-gravity-forms
```
