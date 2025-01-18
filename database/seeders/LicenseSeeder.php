<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\License;


class LicenseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        License::create([
            'key' => 'EXAMPLE-1234-5678-91011',
            'expires_at' => now()->addYear(),
        ]);
    }
}
