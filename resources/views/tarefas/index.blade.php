@extends('layouts.app')

@section('title', 'Tarefas')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tarefas</h1>

<a href="{{ route('dashboard') }}" class="inline-block mb-4 bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
    ← Voltar
</a>

<a href="{{ route('tarefas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nova Tarefa</a>

<form method="GET" class="flex gap-4 mt-4">
    <select name="categoria_id" class="border rounded px-3 py-2">
        <option value="">Todas Categorias</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select>

    <select name="status" class="border rounded px-3 py-2">
        <option value="">Todos Status</option>
        <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
        <option value="em_andamento" {{ request('status') == 'em_andamento' ? 'selected' : '' }}>Em andamento</option>
        <option value="concluida" {{ request('status') == 'concluida' ? 'selected' : '' }}>Concluída</option>
    </select>

    <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded">Filtrar</button>
</form>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 mt-2 rounded">
        {{ session('success') }}
    </div>
@endif

<table class="w-full mt-4 bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2">Título</th>
            <th class="p-2">Categoria</th>
            <th class="p-2">Status</th>
            <th class="p-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tarefas as $tarefa)
        <tr class="border-t">
            <td class="p-2">{{ $tarefa->titulo }}</td>
            <td class="p-2">{{ $tarefa->categoria->nome }}</td>
            <td class="p-2">{{ ucfirst(str_replace('_', ' ', $tarefa->status)) }}</td>
            <td class="p-2 flex gap-2">
                <a href="{{ route('tarefas.edit', $tarefa) }}" class="text-blue-600">Editar</a>
                <form method="POST" action="{{ route('tarefas.destroy', $tarefa) }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
