<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite([])
    @vite('resources/css/app.css')
</head>

<body>
    <header class="absolute z-50">
        <nav class="w-screen h-[10vh] font-header">
            <ul class="flex items-center justify-between p-4">
                <a href="/">
                    <div class="cursor-pointer ">
                        <h1 class="text-6xl text-white font-black">LAUK</h1>
                        <span class="text-red-600 font-semibold">by kelompok 7</span>
                    </div>
                </a>
                <div
                    class="flex flex-row gap-4 text-xl text-white font-medium justify-center items-center *:cursor-pointer">
                    <a href="/">
                        <li>Home</li>
                    </a>
                    <a href="">
                        <li>Menu</li>
                    </a>
                    <a href="/register">
                        <li class="bg-white text-black px-2 py-1 hover:text-white hover:bg-black transition">Pesan Online!</li>
                    </a>
                </div>
            </ul>
        </nav>
    </header>

    <main class="h-screen grid place-items-center text-7xl font-black">
        {{ $slot }}
    </main>

</body>

</html>
