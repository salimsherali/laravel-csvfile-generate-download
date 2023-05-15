<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $u = new \App\Models\User();
        $u->name = "admin";
        $u->email = "admin@admin.com";
        $u->password = \Illuminate\Support\Facades\Hash::make('admin123');
        $u->save();
    }
}