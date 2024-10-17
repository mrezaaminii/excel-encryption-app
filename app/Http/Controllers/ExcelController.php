<?php

namespace App\Http\Controllers;

use App\Http\Requests\DecryptFileRequest;
use App\Http\Requests\EncryptFileRequest;
use App\Jobs\DecryptExcelFileJob;
use App\Jobs\EncryptExcelFileJob;
use App\Repositories\FileRepository;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExcelController extends Controller
{
    public function __construct(private readonly FileRepository $repository, private readonly FileService $service)
    {

    }

    public function showImportForm()
    {
        $files = $this->repository->getAllEncryptedFiles();
        return view('excel.import', compact('files'));
    }

    public function import(EncryptFileRequest $request)
    {

        list($filePath, $data) = $this->service->getFileInfo($request);

        $file = $this->repository->storeFile($data);

        EncryptExcelFileJob::dispatch($filePath, $file->id);

        return back()->with('success', 'آپلود در حال انجام است');

    }

    public function downloadEncrypted(Request $request)
    {
        return response()->download(Storage::path('/'. $request->post('encrypted_file')));
    }

    public function downloadDecrypted(Request $request)
    {
        return response()->download(Storage::path('/'. $request->post('decrypted_file')));
    }

    public function showDecryptForm()
    {
        $files = $this->repository->getAllDecryptedFiles();
        return view('excel.decrypt',compact('files'));
    }

    public function decrypt(DecryptFileRequest $request)
    {
        list($filePath, $data) = $this->service->getFileInfo($request);

        $file = $this->repository->storeFile($data);

        DecryptExcelFileJob::dispatch($filePath, $file->id);

        return back()->with('success', 'آپلود در حال انجام است');
    }

}
