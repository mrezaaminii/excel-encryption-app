<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'encrypted_path',
        'decrypted_path',
        'encryption_key',
        'mime_type',
        'size',
    ];
}
