<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        if (!isset($_ENV["SETUP_DB"])) {
            $this->artisan("migrate:fresh");
            $this->artisan("db:seed");

            $_ENV["SETUP_DB"] = true;
        }
    }
}
