<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Pemrograman',
            'Database',
            'Web Development',
            'Mobile Development',
            'DevOps',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }

        $this->command->info('Berhasil membuat ' . count($categories) . ' Category!');
    }
}
