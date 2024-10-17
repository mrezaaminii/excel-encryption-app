<?php

namespace App\Repositories;

use App\Contracts\FileRepositoryInterface;
use App\Models\File;

class FileRepository extends BaseRepository implements FileRepositoryInterface
{

    public function __construct(File $file)
    {
        parent::__construct($file);
    }

    public function storeFile(array $data)
    {
        return $this->storeData($data);
    }

    public function updateFile(int $id, array $data)
    {
        return $this->updateData($id, $data);
    }

    public function getAllEncryptedFiles()
    {
        return $this->findBy('encrypted_path', null, '!=')->get();
    }

    public function getAllDecryptedFiles()
    {
        return $this->findBy('decrypted_path', null, '!=')->get();
    }
}
