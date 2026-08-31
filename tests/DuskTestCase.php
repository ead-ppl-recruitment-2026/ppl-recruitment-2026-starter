<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Collection;
use Laravel\Dusk\TestCase as BaseTestCase;
use PHPUnit\Framework\Attributes\BeforeClass;

abstract class DuskTestCase extends BaseTestCase
{
    #[BeforeClass]
    public static function prepare(): void
    {
        if (static::runningInSail()) {
            return;
        }

        if (filter_var(getenv('DUSK_START_CHROMEDRIVER'), FILTER_VALIDATE_BOOL)) {
            static::startChromeDriver(['--port=9515']);
        }
    }

    protected function driver(): RemoteWebDriver
    {
        $options = (new ChromeOptions)->addArguments(collect([
            $this->shouldStartMaximized() ? '--start-maximized' : '--window-size=1440,900',
            '--disable-search-engine-choice-screen',
            '--disable-smooth-scrolling',
        ])->unless($this->hasHeadlessDisabled(), function (Collection $items) {
            return $items->merge(['--disable-gpu', '--headless=new']);
        })->all());

        return RemoteWebDriver::create(
            (string) (getenv('DUSK_DRIVER_URL') ?: 'http://127.0.0.1:9515'),
            DesiredCapabilities::chrome()->setCapability(ChromeOptions::CAPABILITY, $options),
            5000,
            5000,
        );
    }

    protected function requireDuskEnabled(): void
    {
        if (! filter_var(getenv('DUSK_ENABLED'), FILTER_VALIDATE_BOOL)) {
            $this->markTestSkipped('BLOCKED/CONFIG REQUIRED: set DUSK_ENABLED=true after browser, driver, base URL, and policy are configured.');
        }
    }

    protected function requireDuskRegressionReady(): void
    {
        if (! filter_var(getenv('DUSK_REGRESSION_READY'), FILTER_VALIDATE_BOOL)) {
            $this->markTestSkipped('CONFIG REQUIRED: run this regression after the stale resolved_at defect is fixed and approved for verification.');
        }
    }
}
