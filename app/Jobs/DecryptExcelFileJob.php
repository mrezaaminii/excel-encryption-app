<?php

namespace App\Jobs;

use App\Repositories\FileRepository;
use App\Services\FileService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DecryptExcelFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $filePath;
    protected $fileId;
    private $service;
    private $repo;

    public function __construct($filePath, $fileId)
    {
        $this->filePath = $filePath;
        $this->fileId = $fileId;
        $this->service = app(FileService::class);
        $this->repo = app(FileRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $decryptedFilePath = $this->service->decryptFile($this->filePath, $this->fileId);

        $this->repo->updateFile($this->fileId, ['decrypted_path' => $decryptedFilePath]);
    }
}
