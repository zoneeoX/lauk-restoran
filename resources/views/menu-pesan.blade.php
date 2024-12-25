<x-layout>
    <section class="bg-slate-900 w-screen max-h-screen text-white p-4 flex flex-row gap-6 overflow-auto">
        <div class="flex flex-1 h-screen mt-4 flex-col gap-4">
            @if ($menuList->isEmpty())
                <p>Tidak ada item.</p>
            @else
                <ul class="grid grid-cols-2 2xl:grid-cols-3 gap-4">
                    @foreach ($menuList as $menu)
                        <div class="bg-slate-800 w-full h-fit overflow-y-auto rounded-xl relative p-4">
                            <div class="h-full flex flex-row gap-2">
                                <img src="{{ asset('storage/' . $menu->photo) }}" alt="Gambar {{ $menu->title }}"
                                    class="max-h-28 object-cover object-center rounded-lg">
                                <div>
                                    <h1 class="font-semibold text-xl lg:text-2xl font-header">{{ $menu['title'] }}</h1>
                                    <h2 class="w-[100%] font-paragraph h-20 text-sm opacity-50">{{ $menu['body'] }}</h2>
                                </div>
                            </div>
                            <div class="mt-4 flex flex-row justify-between items-center">
                                <h3 class="text-lg font-semibold font-header">Rp. {{ $menu['harga'] }}</h3>

                                <div class="font-header flex flex-row gap-4">
                                    <form method="POST" action="{{ route('cart.remove', $menu->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="bg-purple-700 hover:bg-purple-800 w-8 rounded-full">-</button>
                                    </form>
                                    <p>{{ session('cart')[$menu->id]['quantity'] ?? 0 }}</p>
                                   
                                    <form method="POST" action="{{ route('cart.add', $menu->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="bg-purple-700 hover:bg-purple-800 w-8 rounded-full">+</button>
                                    </form>
                                </div>
                            </div>



                        </div>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="w-3/12 bg-slate-800 h-full sticky top-0 p-4 mt-4 rounded-lg overflow-y-auto">
            <h1 class="font-semibold text-4xl font-header">Checkout</h1>
            <ul class="mt-4">
                @php
                    $subtotal = 0;
                    $tax = 3000;
                @endphp
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        @php $subtotal += $details['harga'] * $details['quantity']; @endphp
                        <li class="flex justify-between mb-4 font-header">
                            <div>
                                <div class="flex flex-row gap-2">
                                    <img src="{{ asset('storage/' . $details['photo']) }}"
                                        alt="Gambar {{ $details['title'] }}"
                                        class="w-24 h-24 object-cover object-center rounded-lg">
                                    <div class="flex flex-col">
                                        <h2 class="text-lg font-semibold">{{ $details['title'] }}</h2>
                                        <p>Rp.
                                            {{ number_format($details['harga'] * $details['quantity'], 0, ',', '.') }}
                                        </p>

                                    </div>

                                </div>
                                <p class="text-sm opacity-75">Jumlah: {{ $details['quantity'] }}</p>
                            </div>
                        </li>
                    @endforeach
                @else
                    <p class="opacity-50">Siap makan?, klik makanan yang ingin dimakan.</p>
                @endif
            </ul>
            <hr class="my-4 border-gray-600">

            <div class="bg-slate-700 p-4 rounded-xl">
                <h1 class="font-header text-xl font-semibold">Payment Summary</h1>
                <div class="flex flex-row justify-between w-full mt-4">
                    <p class="opacity-50">Sub total</p>
                    <p>Rp. {{ number_format($subtotal, 0, ',', '.') }}</p>
                </div>
                
                <div class="flex flex-row justify-between w-full">
                    <p class="opacity-50">Pajak</p>
                    <p>Rp. {{ number_format($tax, 0, ',', '.') }}</p>
                </div>
                <hr class="my-4 border-gray-600 ">

                <div class="flex flex-row justify-between w-full">
                    <h2 class="font-bold">Total</h2>
                    <p>Rp. {{ number_format($subtotal + $tax, 0, ',', '.') }}</p>

                </div>

            </div>
            <form method="POST" action="{{ route('cart.checkout') }}">
                @csrf
                <button type="submit" class="bg-purple-700 hover:bg-purple-800 w-full p-2 rounded-lg relative mt-10">Checkout</button>
            </form>

        </div>
    </section>
</x-layout>
