<x-layout>
    <section class="bg-slate-900 w-screen max-h-screen min-h-screen text-white p-4 flex flex-col gap-6 overflow-auto">
        <h1 class="text-3xl font-bold">Riwayat Invoices</h1>
        @if ($orders->isEmpty())
            <p class="text-gray-500">Belum pesen apapun nih, yuk pesen!.</p>
        @else
        <div class="grid grid-cols-2 gap-6">

            @foreach ($orders as $order)
            <div class="border border-gray-700 p-4 bg-slate-800 rounded-lg mb-4">
                <h2 class="text-xl font-semibold mb-2">Invoice</h2>
                <p class="text-sm text-gray-400 mb-4">
                    Tanggal {{ $order->created_at->format('d M Y, H:i') }}
                </p>
                    <ul class="mb-4">
                        @foreach ($order->orderItems as $item)
                        <li class="flex justify-between mb-2">
                            <div>
                                <p class="font-semibold">{{ $item->menu->title }}</p>
                                <p class="text-sm text-gray-400">Jumlah: {{ $item->quantity }}</p>
                            </div>
                            <p>Rp. {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                        </li>
                        @endforeach
                    </ul>
                    <hr class="border-gray-700 mb-4">
                    <div class="flex flex-row justify-between">
                        <p class="text-right opacity-50 text-lg">
                            Total Biaya dan Pajak 
                        </p>
                        <p class="text-lg opacity-50">Rp. {{ number_format($order->total, 0, ',', '.') }}</p>
                        
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </section>
</x-layout>
