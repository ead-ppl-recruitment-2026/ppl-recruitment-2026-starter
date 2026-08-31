# Intentional gaps for the recruitment starter

The repository is a starting point, not an expected solution. These gaps are deliberate so every candidate has meaningful implementation work:

- `ReservationController::store` validates the shape of the form, then returns a starter notice. Candidates implement persistence and the resulting success state.
- Capacity checks must compare `participant_count` with the selected room capacity.
- Time checks must reject an end time that is not after the start time.
- Overlap detection must prevent two active reservations for the same room and date whose time ranges intersect.
- Ownership, edit/cancel rules, and richer status handling are candidate design decisions.
- Candidate-owned unit/feature/browser tests should cover their chosen rules.

The starter intentionally does not include a hidden reference implementation or answer key. It only provides routes, models, deterministic seed data, and a neutral UI so candidates can begin from the same baseline.
