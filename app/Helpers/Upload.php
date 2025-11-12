<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class Upload
{
    public function uploadImage(UploadedFile $image, int $userId): string
    {
        return $this->uploadImageToCloudinary($image, $userId);
    }

    private function uploadImageToCloudinary(UploadedFile $image, int $userId): string
    {
        $cloudName = config('services.cloudinary.cloud_name');
        $apiKey    = config('services.cloudinary.api_key');
        $apiSecret = config('services.cloudinary.api_secret');
        $baseFolder = trim(config('services.cloudinary.base_folder', 'projects'), '/');
        $appName    = trim(config('services.cloudinary.app_name', 'tanyain'), '/');
        $module     = 'questions';

        if (! $cloudName || ! $apiKey || ! $apiSecret || ! $baseFolder || ! $appName || ! $module) {
            throw ValidationException::withMessages([
                'image' => 'Layanan upload gambar belum dikonfigurasi.',
            ]);
        }
        $folderPath = trim("{$baseFolder}/{$appName}/{$module}", '/');
        $publicIdSuffix = 'question_' . $userId . '_' . Str::lower(Str::random(12));
        $publicId       = $folderPath . '/' . $publicIdSuffix;
        $timestamp      = time();

        $paramsToSign = [
            'public_id' => $publicId,
            'timestamp' => $timestamp,
        ];
        ksort($paramsToSign);
        $signatureBase = urldecode(http_build_query($paramsToSign));
        $signature     = sha1($signatureBase . $apiSecret);

        $response = Http::timeout(20)
            ->retry(2, 250)
            ->asMultipart()
            ->attach('file', file_get_contents($image->getRealPath()), $image->getClientOriginalName())
            ->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
                'api_key'    => $apiKey,
                'timestamp'  => $timestamp,
                'signature'  => $signature,
                'public_id'  => $publicId,
            ]);

        if ($response->failed()) {
            throw ValidationException::withMessages([
                'image' => 'Gagal mengunggah gambar. Silakan coba lagi nanti.',
            ]);
        }

        $data = $response->json();
        $imageUrl = $data['secure_url'] ?? $data['url'] ?? null;

        if (! $imageUrl) {
            throw ValidationException::withMessages([
                'image' => 'Cloudinary tidak mengembalikan URL yang valid.',
            ]);
        }

        return $imageUrl;
    }
}
