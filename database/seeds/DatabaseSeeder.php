<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DevGroupSeeder::class);
        $this->call(PublicGroupSeeder::class);
        
        $this->call(DevUserSeeder::class);
        
        $this->call(CreatedPermissionsSeeder::class);
        
        $this->call(PermissionsDevGroupSeeder::class);
        $this->call(PermissionsPublicGroupSeeder::class);
    }
}