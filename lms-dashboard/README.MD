# TechWorld Academy LMS Dashboard

The LMS dashboard is the student-facing learning area of the TechWorld Academy PHP application. It provides course browsing and playback, learning progress, study resources, account settings, and support tools. The LMS uses the shared MySQL database and session established by the main authentication pages.

## Requirements

- PHP 8.0 or later
- MySQL or MariaDB
- PHP `pdo_mysql` enabled
- PHP `curl` and `openssl` enabled for OAuth and external integrations
- A modern browser with JavaScript enabled

The LMS uses Bootstrap and Bootstrap Icons from CDNs. AOS, Swiper, GLightbox, and the dashboard's custom JavaScript are served from this folder's local `css/vendor` and `js/vendor` directories.

## Local Setup

Run these steps from the repository root, not from inside `lms-dashboard`.

1. Copy `.env.example` to `.env` if the environment file does not already exist. Configure the database values for the local MySQL server:

	```dotenv
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=techworld_db
	DB_USERNAME=root
	DB_PASSWORD=
	DB_CHARSET=utf8mb4
	```

2. Create or import the project database using `Database/techworld_db.sql`. Apply the additional SQL files in `Database/` when the corresponding optional LMS features are needed, such as course content, learning paths, saved courses, reviews, or resource libraries.

3. Start the PHP development server from the repository root:

	```powershell
	php -S localhost:8000 -t .
	```

4. Open the main login page:

	```text
	http://localhost:8000/authenication/login/login.php
	```

Sign in with an account whose database role is `student`. Successful login routes student accounts to the LMS dashboard. Protected LMS pages redirect users without a valid student session back to the login page.

## Main Routes

| Feature | Route |
| --- | --- |
| Student dashboard | `/lms-dashboard/lms_dashboard/lms_dashboard.php` |
| Browse courses | `/lms-dashboard/courses/courses.php` |
| Course player | `/lms-dashboard/course-player/course-player.php?course_id=COURSE_ID` |
| Account settings | `/lms-dashboard/settings/settings.php` |
| Login | `/authenication/login/login.php` |
| Logout | `/authenication/logout/logout.php` |

Additional learning, progress, resource, career, support, and study-tool pages are grouped under `My Learning/`, `Resources/`, and `More/`.

## Project Layout

- `lms_dashboard/` contains the student dashboard landing page.
- `courses/` and `course-player/` contain course discovery and lesson playback.
- `My Learning/` contains activity, saved-course, path, certificate, and progress pages.
- `Resources/` contains the student library and study-material pages.
- `More/` contains career, support, and study-tool pages.
- `ajax/` contains profile, password, lesson-progress, note, and question endpoints.
- `includes/auth/auth.php` enforces a signed-in student session.
- `includes/db/db.php` loads the shared `get_db()` PDO connection.
- `includes/header/`, `includes/navbar/`, `includes/sidebar/`, and `includes/footer/` provide shared layout components.
- `modals/` contains profile, feedback, and other shared modal markup.
- `css/` and `js/` contain LMS styles, vendor assets, and dashboard behavior.

## Data And Security

The shared PDO connection is defined in `Database/db/db.php` and configured through the root `.env` file. Keep `.env` out of source control and never place database, OAuth, or payment secrets in browser code.

Protected student pages should include `includes/auth/auth.php` before rendering output. Forms or requests that mutate data should validate the application's CSRF token. AJAX endpoints should validate the session and permissions for the requested record; a logged-in user must only be able to update their own data.

Social sign-in setup, callback URLs, and provider configuration are documented in `docs/oauth_signin_setup.md`. Provider buttons remain unavailable until the corresponding client credentials are configured locally.

## Validation

From the repository root, check PHP syntax for all LMS PHP files:

```powershell
Get-ChildItem .\lms-dashboard -Recurse -Filter *.php | ForEach-Object { php -l $_.FullName }
```

Check the main dashboard JavaScript:

```powershell
node --check .\lms-dashboard\js\main.js
```

When a page reports a missing asset, compare the URL in the browser console with the actual file path. LMS asset URLs should normally start with `/lms-dashboard/` or `/assets/`; avoid paths relative to a deeply nested PHP page.

## Troubleshooting

- **Redirected to login:** confirm the account exists, has role `student`, and the browser is retaining its PHP session cookie.
- **Database connection error:** confirm MySQL is running and the root `.env` database settings match the local database.
- **Missing table or column:** import the base schema and apply the matching SQL migration from `Database/`. For an existing database that is missing only `course_modules`, run `php scripts/run_migrations/run_migrations.php` from the repository root after configuring `.env`.
- **Asset returns 404:** check filename capitalization and use the correct site-root path under `/lms-dashboard/` or `/assets/`.
- **OAuth button says provider is not configured:** add that provider's client ID and secret to the local `.env` and register the callback URL described in the OAuth setup guide.
