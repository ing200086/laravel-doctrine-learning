<?php

namespace Tests;

abstract class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    protected function getDBDriver()
    {
        $currentDB = config('database.default');
        $currentConnection = config('database.connections.' . $currentDB);
        return $currentConnection['driver'];
    }

    protected function buildSchema()
    {
        if ($this->getDBDriver() == "sqlite") {
            \Artisan::call('doctrine:schema:create');
        }
    }

    protected function seedDB()
    {
        \Artisan::call('db:seed');
    }
}
