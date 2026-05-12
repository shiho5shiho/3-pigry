<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ピグリー' }}</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100 text-gray-800">

    <x-navigation />

    <main class="max-w-6xl mx-auto px-4 py-8">
        {{ $slot }}
    </main>

</body>

</html>