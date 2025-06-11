<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Categoria;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $query = Tarefa::query();

        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tarefas = $query->with('categoria')->get();

        return view('tarefas.index', compact('tarefas', 'categorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('tarefas.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'status' => 'required|in:pendente,em_andamento,concluida',
        ]);

        Tarefa::create($request->all());
        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada!');
    }

    public function edit(Tarefa $tarefa)
    {
        $categorias = Categoria::all();
        return view('tarefas.edit', compact('tarefa', 'categorias'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'status' => 'required|in:pendente,em_andamento,concluida',
        ]);

        $tarefa->update($request->all());
        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada!');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('success', 'Tarefa removida!');
    }
}
