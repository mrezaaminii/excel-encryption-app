<?php

namespace App\Contracts;

interface FileRepositoryInterface
{
    public function getAllEncryptedFiles();
    public function getAllDecryptedFiles();
    public function storeFile(array $data);
    public function updateFile(int $id, array $data);
}
