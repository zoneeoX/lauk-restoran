<x-layout>
    <section class="w-screen min-h-screen bg-slate-900 relative overflow-x-hidden">
        <div class="flex flex-col p-10">
            <div class="flex rounded-xl text-white flex-col ">
                <div class="flex flex-col  text-white w-screen">
                    <h1 class="font-header text-4xl font-bold">Tambahkan Menu</h1>
                    <p class="text-lg font-normal opacity-50">Khusus untuk role admin! </p>
                </div>

                <fieldset class="w-full bg-slate-800 p-4">
                    <form action="/tambah-menu" method="POST" class="flex flex-col gap-6" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col basis-auto">
                            <label for="">Nama makanan</label>
                            <input type="text" name="title" placeholder="Nama makanan."
                                class=" bg-slate-800 border-b border-white/20 px-4 min-w-10 py-2 text-lg outline-none" />
                        </div>
                        <div class="flex flex-col basis-2/3">
                            <label for="">Informasi Makanan</label>
                            <input type="text" name="body" placeholder="Deskripsi makanan."
                                class=" bg-slate-800 border-b border-white/20 px-4 py-2 text-lg outline-none" />
                        </div>
                        <div class="flex flex-col basis-auto">
                            <label for="">Harga makanan</label>
                            <input type="number" name="harga" placeholder="Harga makanan."
                                class=" bg-slate-800 border-b border-white/20 px-4 py-2 text-lg outline-none" />

                        </div>
                        <div class="flex flex-col basis-auto">
                            <label for="photo">Foto makanannya</label>
                            <input type="file" name="photo"
                                class="bg-slate-800 border-b border-white/20 px-4 py-2 text-lg outline-none
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-slate-700 file:text-white
                        hover:file:bg-slate-600 file:px-4" />
                            @error('photo')
                                <span>Error: {{ $message }}</span>
                            @enderror
                        </div>

                        <button
                            class="text-2xl font-header font-semibold bg-slate-800 border border-white/20 hover:bg-emerald-700 transition p-2 rounded">✨Confirm</button>
                    </form>
                </fieldset>

            </div>

            <div class="mt-10">
                <h1 class="text-4xl text-white font-header font-semibold">Sistem Menu Management</h1>
                <p class="text-lg font-normal opacity-50 text-white">Khusus untuk role admin! </p>

                <div
                    class="bg-slate-900 w-full min-h-[10vh] rounded p-4 text-white gap-6 grid grid-cols-1  sm:grid-cols-2 xl:grid-cols-3">
                    @foreach ($menuList as $makanan)
                        <div class="bg-slate-800 w-full h-fit overflow-hidden rounded-xl relative p-4">
                            <div class="h-full flex flex-row gap-2">
                                <img src="{{ asset('storage/' . $makanan->photo) }}" alt="Gambar {{ $makanan->title }}"
                                    class="max-h-28 object-cover object-center rounded-lg">
                                <div>
                                    <h1 class="font-semibold text-xl lg:text-2xl font-header">{{ $makanan['title'] }}
                                    </h1>
                                    <h2 class="w-[100%] font-paragraph h-20 text-sm opacity-50">{{ $makanan['body'] }}
                                    </h2>
                                </div>
                            </div>
                            <div class="mt-4 flex flex-row justify-between items-center">
                                <h3 class="text-lg font-semibold font-header">Rp. {{ $makanan['harga'] }}</h3>

                                <div class="font-header flex flex-row gap-4">
                                    <a href="/edit-menu/{{$makanan->id}}">Edit</a>

                                    <form action="/delete-menu/{{$makanan->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button>Delete</button>
                                    </form>

                                </div>


                            </div>


                            {{-- <div class="flex flex-row max-h-48 gap-2 overflow-hidden">
                                <img src="{{ asset('storage/' . $makanan->photo) }}" alt="Gambar {{ $makanan->title }}"
                                    class="w-full h-52 object-cover object-center rounded">
                                <div class="flex flex-col justify-between p-2">
                                    <div>
                                        <h1 class="font-semibold text-xl lg:text-2xl font-header">{{ $makanan['title'] }}</h1>
                                        <h2 class="w-[12vw] font-paragraph text-sm opacity-50">{{ $makanan['body'] }}
                                        </h2>

                                    </div>
                                    <h3>Rp. {{ $makanan['harga'] }}</h3>
                                </div>

                            </div> --}}
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</x-layout>
