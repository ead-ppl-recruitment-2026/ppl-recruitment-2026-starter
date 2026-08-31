# Starter Baseline — EAD Laboratory Campus Room Reservation

## Purpose

This repository is a deterministic Laravel baseline for the PPL recruitment study case. It models a small campus room-reservation workspace. The baseline is intentionally small so a candidate can demonstrate planning, implementation, defect work, traceability, testing, and explanation without receiving a hidden reference implementation.

## Included baseline flow

- Sign in with one seeded demo account.
- Browse active rooms with location and capacity.
- Browse two seeded sample reservations and open a detail page.
- Open a reservation form with room, date, time, purpose, and participant fields.
- Run the app with a repeatable SQLite seed.

## Domain boundaries

The starter has one seeded demo user only. The login is a navigation aid, not a production identity system. The candidate may evolve it into a proper account/role model if their design requires it.

## Intentional future gaps

- Reservation persistence from the form, ownership, capacity validation, time-range validation, and overlap detection are candidate-owned implementation work.
- Edit/cancel/approval flows, notifications, audit history, analytics, API/mobile clients, deployment, and CI/CD are out of starter scope.
- Jira/GitHub integration and issue-key traceability are managed in the recruitment workflow, not wired to credentials here.
- The single Dusk test is a technical smoke check only; candidate business Dusk tests are their responsibility.
- Exact stack patch versions are intentionally flexible as long as the project runs.

## Privacy boundary

Do not commit `.env`, APP_KEY values for real environments, tokens, passwords, PATs, private URLs, personal names, email addresses, phone numbers, or real incident data. Use anonymized IDs and safe dummy text in evidence. The included test APP_KEY is a non-production test placeholder only.

## Verification intent

The starter should pass Composer validation, migrations, seeding, and the small PHPUnit smoke suite from a clean clone after dependencies are installed. Record the exact PHP, Laravel, Composer, database, and test commands used in the candidate README and evidence index.
