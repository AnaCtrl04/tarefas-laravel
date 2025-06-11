@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Bem-vindo(a) ao seu gerenciador de Tarefas!</h1>

    <p class="mb-4">O que você deseja fazer hoje?</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('categorias.index') }}" class="bg-pink-500 text-white p-4 rounded shadow hover:bg-pink-600">
            Gerenciar Categorias
        </a>
        <a href="{{ route('tarefas.index') }}" class="bg-purple-500 text-white p-4 rounded shadow hover:bg-purple-600">
            Gerenciar Tarefas
        </a>
    </div>
@endsection
