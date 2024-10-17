<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function getFileInfo($request): array
    {
        $filePath = $request->file('excel_file')->store('uploads');

        $data =  [
            'name' => $request->file('excel_file')->getClientOriginalName(),
            'path' => $filePath,
            'mime_type' => $request->file('excel_file')->getMimeType(),
            'size' => $request->file('excel_file')->getSize(),
        ];

        return [$filePath, $data];
    }

    public function uploadEncryptedFile($relativeFilePath, $excelFileId)
    {
        $filePath = storage_path('app/private/'. $relativeFilePath);

        if (!file_exists($filePath)) {
            throw new \Exception("File not found: {$filePath}");
        }

        $content = file_get_contents($filePath);

        $encryptedContent = Crypt::encryptString($content);
        $encryptedFilePath = 'encrypted/excel_' . $excelFileId . '.txt';

        Storage::put($encryptedFilePath, $encryptedContent);

        return $encryptedFilePath;

    }

    public function decryptFile($relativeFilePath, $fileId)
    {
        $filePath = storage_path('app/private/' . $relativeFilePath);

        if (!file_exists($filePath)) {
            throw new \Exception("File not found: {$filePath}");
        }

        $encryptedContent = file_get_contents($filePath);
        $decryptedContent = Crypt::decryptString($encryptedContent);

        $decryptedFilePath = 'decrypted/excel_' . $fileId . '.xlsx';
        Storage::put($decryptedFilePath, $decryptedContent);

        return $decryptedFilePath;
    }

}
