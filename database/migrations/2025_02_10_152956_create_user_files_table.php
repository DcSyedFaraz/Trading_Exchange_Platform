<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->string('path'); // File ka path
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_files');
    }
};
