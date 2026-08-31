<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StarterSmokeBrowserTest extends DuskTestCase
{
    public function test_login_page_renders(): void
    {
        $this->requireDuskEnabled();

        $this->browse(function (Browser $browser): void {
            $browser->visit('/login')->assertSee('EAD Laboratory')->assertSee('Masuk ke workspace');
        });
    }
}
