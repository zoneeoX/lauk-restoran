<x-layout>
    <section class="bg-zinc-900 text-white brightess-125 w-screen h-screen flex justify-center items-center text-lg">
        <div class="w-1/2 overflow-hidden z-50 flex-1">
            <img src="https://images8.alphacoders.com/694/694126.jpg"
                class="w-screen h-screen object-cover object-center p-2 rounded-2xl brightness-75" alt="">
        </div>
        <form action="/register" method="POST" class="w-1/2 flex flex-col items-center gap-4 p-4 flex-1">
            @csrf
            <div class="relative">
                <h1 class="text-6xl font-header tracking-wide font-semibold text-center">Create an account</h1>
            </div>

            <fieldset class="flex flex-col gap-4 flex-1 font-normal">
                <div class="flex flex-row justify-center items-center gap-2">
                    <input type="text" name="first_name" placeholder="First name"
                        class="basis-1/2 bg-slate-800 outline-none rounded-lg px-4 py-2" />
                    <input type="text" name="last_name" placeholder="Last name"
                        class="basis-1/2 bg-slate-800 rounded-lg px-4 py-2" />
                </div>
                <input type="email" name="email" placeholder="Raja@gmail.com"
                    class=" bg-slate-800 rounded-lg px-4 py-2" />
                <input type="password" name="password" placeholder="Enter your password"
                    class=" bg-slate-800 rounded-lg px-4 py-2 basis-1/2" />

                <button class="bg-purple-700 hover:bg-purple-600 transition p-4 relative text-center">Create Account</button>
                <p class="font-paragraph font-light text-sm">Already have an account?, <a href="/login"
                        class="cursor-pointer underline font-bold">Log in</a></p>
            </fieldset>
        </form>
    </section>
</x-layout>
