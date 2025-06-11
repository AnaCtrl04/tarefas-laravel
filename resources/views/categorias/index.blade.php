@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
<h1 class="text-2xl font-bold mb-4">Categorias</h1>

<a href="{{ route('dashboard') }}" class="inline-block mb-4 bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
    ← Voltar
</a>

<a href="{{ route('categorias.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nova Categoria</a>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 mt-2 rounded">
        {{ session('success') }}
    </div>
@endif

<ul class="mt-4 space-y-2">
    @foreach($categorias as $categoria)
        <li class="bg-white p-4 rounded shadow flex justify-between items-center">
            {{ $categoria->nome }}
            <div class="flex gap-2">
                <a href="{{ route('categorias.edit', $categoria) }}" class="text-blue-600">Editar</a>
                <form method="POST" action="{{ route('categorias.destroy', $categoria) }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600">Excluir</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
@endsection
