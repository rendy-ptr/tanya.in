<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        if ($users->isEmpty()) {
            $this->command->error('Tidak ada user! Buat user dulu dengan register.');
            return;
        }

        if ($categories->isEmpty()) {
            $this->command->error('Tidak ada kategori! Jalankan CategorySeeder dulu.');
            return;
        }

        $questions = [
            [
                'title' => 'Bagaimana cara belajar Laravel untuk pemula?',
                'content' => 'Saya baru mulai belajar web development dan tertarik dengan Laravel. Dari mana saya harus memulai? Apakah ada roadmap atau tutorial yang direkomendasikan untuk pemula?',
                'category' => 'Pemrograman',
            ],
            [
                'title' => 'Apa perbedaan antara MySQL dan PostgreSQL?',
                'content' => 'Saya sedang memilih database untuk project baru. Bisa tolong jelaskan perbedaan utama antara MySQL dan PostgreSQL? Mana yang lebih cocok untuk aplikasi web skala menengah?',
                'category' => 'Database',
            ],
            [
                'title' => 'Cara implementasi authentication di React JS?',
                'content' => 'Bagaimana cara terbaik untuk implementasi sistem login/logout di React? Apakah menggunakan JWT token atau session? Dan bagaimana cara menyimpan token dengan aman?',
                'category' => 'Web Development',
            ],
            [
                'title' => 'Tips optimasi query database yang lambat?',
                'content' => 'Query di aplikasi saya mulai lambat ketika data sudah mencapai 100rb records. Apa saja teknik optimasi yang bisa dilakukan? Apakah perlu indexing atau ada cara lain?',
                'category' => 'Database',
            ],
            [
                'title' => 'Bagaimana cara deploy Laravel ke production?',
                'content' => 'Saya sudah selesai develop aplikasi Laravel dan ingin deploy ke server production. Apa saja yang perlu dipersiapkan? Bagaimana dengan environment variables dan database migration?',
                'category' => 'DevOps',
            ],
            [
                'title' => 'Rekomendasi library untuk state management di React?',
                'content' => 'Selain Redux, ada alternatif library untuk state management yang lebih simple? Saya dengar tentang Zustand dan Jotai, mana yang lebih direkomendasikan?',
                'category' => 'Web Development',
            ],
            [
                'title' => 'Cara membuat REST API dengan Laravel?',
                'content' => 'Saya ingin membuat REST API untuk aplikasi mobile. Bagaimana struktur yang baik untuk API di Laravel? Apakah perlu menggunakan API Resources atau cukup return JSON biasa?',
                'category' => 'Pemrograman',
            ],
            [
                'title' => 'Error "Class not found" setelah composer update',
                'content' => 'Setelah menjalankan composer update, aplikasi Laravel saya error "Class not found". Sudah coba composer dump-autoload tapi masih error. Ada solusi lain?',
                'category' => 'Pemrograman',
            ],
            [
                'title' => 'Perbedaan Flutter dan React Native untuk mobile app?',
                'content' => 'Saya mau mulai belajar mobile development. Lebih baik pilih Flutter atau React Native? Apa kelebihan dan kekurangan masing-masing framework?',
                'category' => 'Mobile Development',
            ],
            [
                'title' => 'Bagaimana cara setup CI/CD untuk Laravel?',
                'content' => 'Saya ingin implementasi CI/CD di project Laravel. Apakah lebih baik pakai GitHub Actions, GitLab CI, atau Jenkins? Dan bagaimana cara setup automated testing?',
                'category' => 'DevOps',
            ],
        ];

        foreach ($questions as $questionData) {
            $category = $categories->where('name', $questionData['category'])->first();

            if (!$category) {
                continue;
            }

            $question = Question::create([
                'user_id' => $users->random()->id,
                'category_id' => $category->id,
                'title' => $questionData['title'],
                'content' => $questionData['content'],
            ]);

            $answerCount = rand(1, 4);
            for ($i = 0; $i < $answerCount; $i++) {
                Answer::create([
                    'user_id' => $users->random()->id,
                    'question_id' => $question->id,
                    'content' => $this->generateRandomAnswer(),
                ]);
            }
        }

        $this->command->info('Berhasil membuat ' . count($questions) . ' pertanyaan dengan jawaban!');
    }

    private function generateRandomAnswer(): string
    {
        $answers = [
            'Terima kasih atas pertanyaannya! Menurut pengalaman saya, cara terbaik adalah dengan memulai dari dokumentasi official dan mengikuti tutorial step-by-step.',
            'Saya pernah mengalami masalah yang sama. Solusinya adalah dengan melakukan X, Y, dan Z. Semoga membantu!',
            'Menarik pertanyaannya! Saya sarankan untuk mencoba pendekatan A terlebih dahulu, jika tidak berhasil baru coba pendekatan B.',
            'Berdasarkan best practice yang saya tahu, sebaiknya menggunakan metode ini karena lebih maintainable dan scalable.',
            'Saya setuju dengan pendapat di atas. Tambahan dari saya, jangan lupa untuk memperhatikan aspek security dan performance juga.',
            'Ada beberapa cara untuk menyelesaikan ini. Yang paling simple adalah metode pertama, tapi kalau mau yang lebih robust bisa pakai metode kedua.',
        ];

        return $answers[array_rand($answers)];
    }
}
