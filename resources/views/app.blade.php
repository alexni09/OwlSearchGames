<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @if (app()->getLocale() === 'en')
        <meta name="description" content="An educative game: search for the words hidden inside a randomly generated grid. Each game is unique. No ads! Play now!">
        @elseif (app()->getLocale() === 'pt')
        <meta name="description" content="Um jogo educativo: encontre as palavras ocultas em um tabuleiro gerado aleatoriamente. Cada jogo é único. Sem anúncios! Jogue agora!">
        @endif

        <title inertia>{{ config('app.name', 'Owl Search Games') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
