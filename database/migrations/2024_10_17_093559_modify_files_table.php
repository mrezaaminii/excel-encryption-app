<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('files', function (Blueprint $table) {
            $table->text('encryption_key')->nullable()->change();
            $table->text('encrypted_path')->nullable()->change();
            $table->string('mime_type')->after('encryption_key');
            $table->unsignedBigInteger('size')->after('mime_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('files', function (Blueprint $table) {
            $table->text('encryption_key')->change();
            $table->dropColumn(['mime_type', 'size']);
        });
    }
};
