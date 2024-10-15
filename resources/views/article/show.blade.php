<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head />
    <body class="font-sans antialiased">

        <div class="bg-gray-50 text-black/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative min-h-screen flex justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full px-6 lg:max-w-7xl">
                    <header class=" items-center gap-2 py-10 lg:grid-cols-3">

                        <x-navbar />

                    </header>

                    <main class="flex justify-center">

                        <div class="w-2/5 pb-36 h-4/6">

                            <div id="docs-card" class="flex justify-center rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10" >

                                <div class="relative flex justify-center">

                                    <div id="docs-card-content" class="flex justify-center">

                                        <div class="pt-3 sm:pt-5 lg:pt-0">

                                            <h2 class="text-xl font-semibold text-black text-center ">Articolo</h2>

                                            <p class="mt-4 text-sm/relaxed">

                                                <ul>
                                                    {{-- visualizzo nome posizione e magari show edit delete --}}

                                                       <li>
                                                            <ul class="border border-emerald-400 m-3 p-5 rounded">

                                                                <li> <span class="font-bold">articolo</span>: {{$article->name}}</li>
                                                                <li> <span class="font-bold">posizione</span>: {{$article->position}}</li>

                                                                <li> <span class="font-bold" >prezzo</span>: {{$article->price}}</li>
                                                                <li> <span class="font-bold">quantità</span>: {{$article->amount}}</li>
                                                                <li> <span class="font-bold">inserito</span>: {{$article->insert}}</li>

                                                                @if($article->taking)
                                                                    <li> <span class="font-bold">rititato</span>: {{$article->taking}}</li>
                                                                @endif

                                                            </ul>
                                                        </li>


                                                </ul>

                                            </p>

                                        </div>

                                </div>

                            </div>

                        </div>



                    </main>

                    <footer class="py-16 text-center text-sm text-black">

                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                        <a href="{{route('article.create')}}"> new article </a>

                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>

