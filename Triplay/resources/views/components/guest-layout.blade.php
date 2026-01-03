<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Triplay Healing</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-neutral-900 via-neutral-800 to-black flex items-center justify-center">

    <div class="w-full max-w-md bg-neutral-900/80 backdrop-blur-xl rounded-2xl shadow-2xl p-8 border border-neutral-700">
        <h1 class="text-2xl font-bold text-center text-white mb-6">
            Triplay Healing
        </h1>

        {{ $slot }}

    </div>

</body>
</html>
