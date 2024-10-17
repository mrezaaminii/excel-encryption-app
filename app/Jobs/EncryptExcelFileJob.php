<?php

namespace App\Jobs;

use App\Repositories\FileRepository;
use App\Services\FileService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EncryptExcelFileJob implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     */

    private $service;
    private $repo;
    protected $filePath;
    protected $excelFileId;

    public function __construct($filePath, $excelFileId)
    {
        $this->filePath = $filePath;
        $this->excelFileId = $excelFileId;
        $this->service = app(FileService::class);
        $this->repo = app(FileRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $encryptedFilePath = $this->service->uploadEncryptedFile($this->filePath, $this->excelFileId);

        $this->repo->updateFile($this->excelFileId, ['encrypted_path' => $encryptedFilePath]);

    }
}
