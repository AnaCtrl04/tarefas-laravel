@extends('layouts.app')

@section('title', 'Nova Categoria')

@section('content')
<h1 class="text-2xl font-bold mb-4">Nova Categoria</h1>

<a href="{{ route('categorias.index') }}" class="inline-block mb-4 bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
    ← Voltar
</a>

<form method="POST" action="{{ isset($categoria) ? route('categorias.update', $categoria) : route('categorias.store') }}">
    @csrf
    @if(isset($categoria)) @method('PUT') @endif

    <div class="mb-4">
        <label class="block font-semibold">Nome</label>
        <input type="text" name="nome" value="{{ old('nome', $categoria->nome ?? '') }}"
               class="w-full border rounded px-3 py-2">
        @error('nome') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Salvar</button>
</form>
@endsection
