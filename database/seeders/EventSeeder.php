<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventCategory;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'PreEvent'],
            ['name' => 'MainEvent'],
        ];

        foreach ($categories as $category) {
            EventCategory::create($category);
        }
    }
}
