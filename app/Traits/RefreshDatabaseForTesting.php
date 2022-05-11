<?php

namespace App\Traits;


trait RefreshDatabaseForTesting
{
    
    public function refresh_database_seed_passport_install()
    {
        $this->artisan('migrate:fresh');

        $this->artisan('passport:install');
        
        $this->artisan('db:seed');


    }
}
