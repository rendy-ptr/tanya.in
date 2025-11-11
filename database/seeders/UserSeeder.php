<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@mail.com',
                'password' => bcrypt('password123'),
                'bio' => 'Saya seorang pengembang web dengan minat dalam teknologi terbaru.',
                'age' => 28,
                'address' => 'Jl. Merdeka No. 10, Jakarta',
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bob@mail.com',
                'password' => bcrypt('password123'),
                'bio' => 'Penggemar database dan optimasi kinerja.',
                'age' => 32,
                'address' => 'Jl. Sudirman No. 45, Bandung',
            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'charlie@mail.com',
                'password' => bcrypt('password123'),
                'bio' => 'Mobile developer yang suka bereksperimen dengan framework baru.',
                'age' => 25,
                'address' => 'Jl. Diponegoro No. 78, Surabaya',
            ],
            [
                'name' => 'Diana Prince',
                'email' => 'diana@mail.com',
                'password' => bcrypt('password123'),
                'bio' => 'DevOps engineer dengan pengalaman di cloud computing.',
                'age' => 30,
                'address' => 'Jl. Gatot Subroto No. 12, Medan',
            ],
            [
                'name' => 'Ethan Hunt',
                'email' => 'ethan@mail.com',
                'password' => bcrypt('password123'),
                'bio' => 'Full-stack developer yang menyukai tantangan baru.',
                'age' => 29,
                'address' => 'Jl. Thamrin No. 34, Yogyakarta',
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
        $this->command->info('Berhasil membuat ' . count($users) . ' User!');
    }
}
