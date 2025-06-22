<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <nav class="bg-blue-600 text-white p-4 flex justify-between">
        <div><a href="{{ route('dashboard') }}" class="font-bold">GERENCIADOR DE TAREFAS</a></div>
        <div class="flex gap-4">
            <a href="{{ route('categorias.index') }}">Categorias</a>
            <a href="{{ route('tarefas.index') }}">Tarefas</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Sair</button>
            </form>
        </div>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
