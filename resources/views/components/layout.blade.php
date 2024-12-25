<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lauk Restoran * by kelompok 7</title>
    @vite([])
    @vite('resources/css/app.css')
</head>

<body>
    <header class="sticky z-50 top-0">
        <nav class="w-screen h-[110px] font-header bg-purple-900 filter backdrop-blur-lg border-b-black">
            <ul class="flex items-center justify-between p-4">
                @auth
                    <div class="cursor-pointer flex flex-row gap-2 bg-purple-800 justify-center items-center p-2 rounded-xl">
                        <div class="w-16 h-16 bg-slate-50 rounded-full flex justify-center items-center">
                            <h1>USER</h1>
                        </div>

                        @if (Auth::check() && Auth::user()->role === 'admin')
                            <div class="flex flex-col text-white font-header">
                                <span>ADMIN USER</span>
                                <span class="opacity-50">*note untuk modify menu</span>
                            </div>
                        @else
                            <div class="flex flex-col text-white font-header">
                                <span>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
                                <span class="opacity-50">{{ Auth::user()->email }}</span>
                            </div>
                        @endif




                        <form action="/logout" method="POST">
                            @csrf
                            <button class="ml-10 bg-slate-50 p-2 rounded-lg hover:bg-slate-100">Logout</button>
                        </form>
                    </div>
                @else
                    <a href="/">
                        <div class="cursor-pointer ">
                            <h1 class="text-6xl text-white font-black">LAUK</h1>
                            <span class="text-red-600 font-semibold">by kelompok 7</span>
                        </div>
                    </a>
                @endauth
                <div
                    class="flex flex-row gap-4 text-xl text-white font-medium justify-center items-center *:cursor-pointer">
                    <a href="/">
                        <li>Home</li>
                    </a>

                    <a href="/invoices">
                        <li>Invoices</li>
                    </a>

                    <a href="/menu-pesan">
                        <li class="bg-white text-black px-2 py-1 hover:text-white hover:bg-black transition">Pesan
                            Online!</li>
                    </a>
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <a href="/tambah-menu">
                            <li class="bg-red-700 text-white px-2 py-1 hover:bg-red-800 transition">Tambah
                                Menu</li>
                        </a>
                    @endif
                </div>
            </ul>
        </nav>
    </header>

    <main class="h-screen grid place-items-center">
        {{ $slot }}
    </main>

</body>

</html>
