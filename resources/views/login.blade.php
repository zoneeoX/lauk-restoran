<x-layout>
    <section class="bg-zinc-900 text-white brightess-125 w-screen h-screen flex justify-center items-center text-lg">
        <div class="w-1/2 overflow-hidden z-50 flex-1">
            <img src="https://images8.alphacoders.com/694/694126.jpg"
                class="w-screen h-screen object-cover object-center p-2 rounded-2xl brightness-75" alt="">
        </div>
        <form class="w-1/2 flex flex-col items-center gap-4 p-4 flex-1">
            <div class="relative">
                <h1 class="text-6xl font-header tracking-wide font-semibold text-center">Login to an account</h1>
            </div>

            <fieldset class="flex flex-col gap-4 font-normal w-full px-20">
                
                <input type="email" name="email" placeholder="Raja@gmail.com"
                    class=" bg-slate-800 rounded-lg px-4 py-2 flex flex-1" />
                <input type="password" name="password" placeholder="Enter your password"
                    class=" bg-slate-800 rounded-lg px-4 py-2 flex flex-1" />

                <button class="bg-purple-700 hover:bg-purple-600 transition p-4 relative text-center">Login Account</button>
                <p class="font-paragraph font-light text-sm">Don't have an account?, <a href="/register"
                        class="cursor-pointer underline font-bold">Register</a></p>
            </fieldset>
        </form>
    </section>
</x-layout>
