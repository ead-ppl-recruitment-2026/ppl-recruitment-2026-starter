<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Candidate extensions may register policy or service bindings here.
    }

    public function boot(): void
    {
        // Explicit file paths keep migrations reliable when the repository is
        // checked out under a Windows path containing square brackets (glob()
        // treats square brackets as a character class).
        $this->loadMigrationsFrom([
            database_path('migrations/2026_08_31_000000_create_users_table.php'),
            database_path('migrations/2026_08_31_000001_create_rooms_table.php'),
            database_path('migrations/2026_08_31_000002_create_reservations_table.php'),
        ]);
    }
}
