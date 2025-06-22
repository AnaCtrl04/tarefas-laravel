@extends('layouts.app')

@section('title', 'Nova Tarefa')

@section('content')
<h1 class="text-2xl font-bold mb-4">Nova Tarefa</h1>

<a href="{{ route('tarefas.index') }}" class="inline-block mb-4 bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
    ← Voltar
</a>

<form method="POST" action="{{ isset($tarefa) ? route('tarefas.update', $tarefa) : route('tarefas.store') }}">
    @csrf
    @if(isset($tarefa)) @method('PUT') @endif

    <div class="mb-4">
        <label class="block font-semibold">Título</label>
        <input type="text" name="titulo" value="{{ old('titulo', $tarefa->titulo ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('titulo') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Categoria</label>
        <select name="categoria_id" class="w-full border rounded px-3 py-2">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    {{ (old('categoria_id', $tarefa->categoria_id ?? '') == $categoria->id) ? 'selected' : '' }}>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2">
            @foreach(['pendente', 'concluida'] as $status)
                <option value="{{ $status }}"
                    {{ (old('status', $tarefa->status ?? '') == $status) ? 'selected' : '' }}>
                    {{ ucfirst(str_replace('_', ' ', $status)) }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Descrição</label>
        <textarea name="descricao" class="w-full border rounded px-3 py-2">{{ old('descricao', $tarefa->descricao ?? '') }}</textarea>
    </div>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Salvar</button>
</form>
@endsection
