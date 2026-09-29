# Social Sign-in Setup

Google, Microsoft, and Yahoo sign-in creates new local accounts with the `student` role. Provider identities are stored separately and linked to local accounts only when the provider confirms an existing email address.

## Register OAuth applications

Create a web OAuth application with each provider you want to enable. For local development, register this exact redirect URI with each application:

```text
http://localhost:8000/authenication/oauth/callback.php
```

Use the HTTPS callback URL with your production hostname when deploying.

## Configure `.env`

Copy the relevant client ID and client secret into the root `.env` file. Never commit or share client secrets.

```dotenv
GOOGLE_OAUTH_CLIENT_ID=
GOOGLE_OAUTH_CLIENT_SECRET=
GOOGLE_OAUTH_REDIRECT_URI=http://localhost:8000/authenication/oauth/callback.php

MICROSOFT_OAUTH_CLIENT_ID=
MICROSOFT_OAUTH_CLIENT_SECRET=
MICROSOFT_OAUTH_TENANT=common
MICROSOFT_OAUTH_REDIRECT_URI=http://localhost:8000/authenication/oauth/callback.php

YAHOO_OAUTH_CLIENT_ID=
YAHOO_OAUTH_CLIENT_SECRET=
YAHOO_OAUTH_REDIRECT_URI=http://localhost:8000/authenication/oauth/callback.php
```

The Microsoft tenant can be `common`, `organizations`, `consumers`, or a tenant ID, depending on the application registration.

## Create the provider-account table

Apply `Database/oauth_accounts_table.sql` to the configured database. PHP's cURL and OpenSSL extensions must be enabled. The flow validates OAuth state, uses PKCE for Google and Microsoft, and verifies TLS certificates for provider requests.