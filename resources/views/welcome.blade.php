<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel/livewire components</title>
        <!-- Styles
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
        <script src="https://cdn.tailwindcss.com"></script>
        <livewire:styles />
    </head>
    <body>
        <livewire:trello />

        <livewire:scripts />
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    </body>
</html>
