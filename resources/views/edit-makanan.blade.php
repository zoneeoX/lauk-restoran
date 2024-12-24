<x-layout>
    <section class="flex flex-1 w-screen h-full justify-center items-center bg-slate-900 flex-col text-center">
        <h1 class="font-header text-6xl text-white font-semibold mb-10">Edit Makanan</h1>
        <form action="/edit-menu/{{ $makanan->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-6 text-white font-header">
                <input type="text" name="title" placeholder="Nama makanan."
                    class=" bg-slate-800 border-b border-white/20 px-4 min-w-10 py-2 text-lg outline-none" value="{{$makanan->title}}" />
                <input type="number" name="harga" placeholder="Harga makanan."
                    class=" bg-slate-800 border-b border-white/20 px-4 min-w-10 py-2 text-lg outline-none" value="{{$makanan->harga}}"  />
                <input type="text" name="body" placeholder="Deskripsi makanan."
                    class=" bg-slate-800 border-b border-white/20 px-4 min-w-10 py-2 text-lg outline-none col-span-2" value="{{$makanan->body}}" />
                    <div class="flex flex-col col-span-2">
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
            </div>

            <button
            class="text-4xl font-header w-full mt-10 font-semibold bg-slate-800 border border-white/20 hover:bg-emerald-700 transition p-2 rounded text-white">✨Confirm</button>        </form>
    </section>
</x-layout>
