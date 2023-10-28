<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">


    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

@include('layouts.includes.navbar')
@include('layouts.includes.sidebar')

<div class="p-4 sm:ml-64">
    @yield('content')


</div>

@yield('scripts')
@livewireScripts
</body>
</html>
