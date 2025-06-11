<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tarefas', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->text('descricao')->nullable();
        $table->enum('status', ['pendente', 'em andamento', 'concluída']);
        $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }

    public function create(): void
    {
    Schema::create('tarefas', function (Blueprint $table) {
    $table->id();
    $table->string('titulo');
    $table->text('descricao')->nullable();
    $table->enum('status', ['pendente', 'em_andamento', 'concluida'])->default('pendente');
    $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});

    }

};
