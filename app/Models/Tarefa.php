<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;


class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'status', 'categoria_id'];

    public function categoria()
{
    return $this->belongsTo(Categoria::class);
}

}


