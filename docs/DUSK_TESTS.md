# Laravel Dusk Test Assets

**Candidate-facing technical notes — EAD Laboratory Campus Room Reservation**

## Purpose and boundary

This directory contains one small, optional technical smoke test. It checks that a clean app can render the login page. It does not attempt a full business regression suite; candidates should add tests that match their own implementation.

The current lock includes `laravel/dusk:8.6.0`, which works with Laravel 12 and PHP 8.2+. You may use a newer compatible version if you intentionally update the lock and the app still runs.

The test is skipped by default through `DUSK_ENABLED=false`, so a missing local browser/driver is not reported as a product failure.

## Files

- `tests/DuskTestCase.php`: browser driver setup with a configurable driver URL and optional local ChromeDriver startup.
- `tests/Browser/StarterSmokeBrowserTest.php`: one login-page render check.
- `phpunit.dusk.xml`: bounded Browser suite and safe local defaults.
- `.env.dusk.local.example`: non-secret local configuration template. Keep the actual `.env.dusk.local` ignored.
- `tests/Browser/.gitignore`: prevents screenshots, console logs, source dumps, and test cache from being committed.

## Local setup

Use a disposable clone and configure only local dummy data. Browser and driver versions are local choices; keep them compatible with your installed Chrome.

```powershell
Set-Location -LiteralPath 'C:\Path\starter_repository'
composer validate --no-check-publish
composer install --no-interaction --prefer-dist
Copy-Item -LiteralPath '.env.dusk.local.example' -Destination '.env.dusk.local'
php artisan key:generate --env=dusk.local
if (-not (Test-Path -LiteralPath 'database\database.sqlite')) {
    New-Item -ItemType File -Force -Path 'database\database.sqlite' | Out-Null
}
php artisan migrate:fresh --seed --env=dusk.local
```

The repository does not commit ChromeDriver or any browser binary. Start the app with the configured local command and keep `.env.dusk.local` private.

## Running all or filtered tests

The safe default is `DUSK_ENABLED=false`; this keeps an unconfigured browser environment from being reported as a false PASS. After browser, driver, base URL, and policy are configured, enable the run in the local environment and execute:

```powershell
$env:DUSK_ENABLED = 'true'
$env:DUSK_START_CHROMEDRIVER = 'true' # only when an approved local driver binary is available
php artisan dusk --without-tty
```

If an external local driver is already running, keep `DUSK_START_CHROMEDRIVER=false` and set `DUSK_DRIVER_URL` accordingly. For a focused run:

```powershell
php artisan dusk --without-tty --filter=login_page_renders
vendor\bin\phpunit -c phpunit.dusk.xml --filter=login_page_renders
```

Run the smoke test only when a local Chrome/ChromeDriver is available. Do not treat a skipped Dusk run as a business-quality assessment.

## Test contract

| Test | Baseline selector/flow | Expected result |
| --- | --- | --- |
| Login render | `/login`, `EAD Laboratory` | The starter login page renders successfully |

The starter smoke test is intentionally narrow. The candidate's own business tests remain the assessment evidence.

## Evidence and diagnosis

Record the command, environment versions, status, output reference, and first safe failure summary if the optional smoke run is used.

Classify a result as `PASS`, `FAIL`, or `BLOCKED` based on observed output:

- `BLOCKED`: Chrome/driver unavailable, base URL cannot be reached, dependency/SQLite setup incomplete, or policy access is unresolved. Record the first safe error, impact, and next action. Do not call this a product PASS.
- `FAIL`: the environment is valid but the login-page assertion is not met.
- `PASS`: the configured assertion and evidence are visible and reproducible.

Screenshots, console logs, and page source are stored under ignored paths and must be scrubbed before sharing. Remove credentials, cookies, tokens, `.env` values, private URLs, and PII.

## Baseline and known gaps

No browser binary or runtime Dusk result is included. The business rules remain candidate-owned.

If the workspace path contains square brackets, use `Set-Location -LiteralPath` and quote all paths.

## References

- `README_SETUP.md`
- `docs/STARTER_BASELINE.md`
- `docs/INTENTIONAL_GAPS.md`
- `outputs/04_technical_assets/32_Test_Plan_dan_Uji_Coba_Study_Case.xlsx`
- The public study-case guide and rubric supplied in the candidate pack

This document is setup guidance, not an expected-solution disclosure. Keep browser credentials and private URLs out of source control.
