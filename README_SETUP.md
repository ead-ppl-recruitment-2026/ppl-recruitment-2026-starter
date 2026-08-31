# EAD Laboratory — Campus Room Reservation Starter

## Prerequisites

- PHP 8.2+ with SQLite enabled (PHP 8.3 is the local baseline used by panitia).
- Composer 2 (Composer 2.4+ is sufficient for the local baseline).
- A browser for the optional local smoke check.

The starter does not require one exact patch version. Use the version already available on your laptop as long as the project runs; newer stable versions are recommended. Do not spend assessment time upgrading dependencies unless it is relevant to your implementation.

## Install from a clean clone

```text
composer validate
composer install
copy .env.example .env
php artisan key:generate
if not exist database\database.sqlite type nul > database\database.sqlite
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000` locally. The demo account is `demo@eadlaboratory.test` with password `password`.

On PowerShell, the SQLite file command can be:

```powershell
New-Item -ItemType File -Force database/database.sqlite
```

## Test ringan

```text
composer test
php artisan test
```

The baseline contains small PHPUnit smoke tests for login, room catalog, reservation list, and the intentionally incomplete reservation submit path. One optional Dusk technical smoke test checks that the login page renders. Dusk is disabled by default until a local browser/driver is available.

## Study-case boundary

The app covers a campus room catalog, sample reservations, a demo login, and the starting reservation form. The persistence, capacity rule, time-range rule, overlap detection, ownership, and candidate-owned automated tests are intentionally left for the study case. See `docs/STARTER_BASELINE.md` and `docs/INTENTIONAL_GAPS.md` for the exact boundary. Candidates should use their own fork/repository and never commit credentials.

## Troubleshooting

- If `composer install` cannot reach Packagist, keep `composer.json` and the source scaffold unchanged, record the exact network error, and retry in an approved network environment. Do not add a vendor directory or credentials.
- If SQLite is unavailable, enable the PHP SQLite extension or use the configured approved database only after panitia confirms it; the intended default is SQLite.
- If migrations fail, confirm `.env` exists, `DB_CONNECTION=sqlite`, `DB_DATABASE=database/database.sqlite`, and that the file exists.
- If a test fails, record the command, first failure, expected/actual result, and safe evidence reference. Never paste secrets or personal data into logs.

## Configuration register

The following are candidate/panitia choices: PHP/Laravel patch level, optional Chrome/ChromeDriver versions for Dusk, repository/fork name, submission deadline, and evidence links. No real credentials or private URLs are part of this repository.
