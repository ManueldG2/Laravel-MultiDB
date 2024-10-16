<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <x-head />
    <body >
        <div class="bg-gray-50 text-black/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class=" items-center gap-2 py-10 lg:grid-cols-3">

                        <x-navbar />

                    </header>

                    <main >

                        <div class="flex justify-center gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10">


                                <div class=" pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-center text-black">Articoli</h2>



                                        <ul>
                                            {{-- visualizzo nome posizione e magari show edit delete --}}
                                            @foreach ($art as $elem)
                                               <li>
                                                    <ul class="border border-emerald-400 m-3 p-1 rounded">
                                                        <li> <span class="font-bold">articolo</span>: {{$elem->name}}</li>
                                                        <li> <span class="font-bold">posizione</span>: {{$elem->position}}</li>
                                                        <li>

                                                            <a class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" href="{{route('article.show', $elem->id)}}">apri</a>

                                                            @auth
                                                                <a class="px-4 py-1.5 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" href="{{route('article.edit', $elem->id)}}">modifica</a>
                                                            @endauth

                                                            @auth

                                                                <form class="inline-block" method="POST" action="{{route("article.destroy", $elem->id)}}">

                                                                    @method("DELETE")
                                                                    @csrf

                                                                    <input class="px-4 py-1.5 text-right font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" type="submit" value="cancella">

                                                                </form>

                                                            @endauth

                                                         </li>

                                                    </ul>
                                                </li>
                                            @endforeach

                                            <a class="px-4 py-1.5 font-semibold text-right text-sm bg-cyan-500 text-white rounded-full shadow-sm" href="{{route('article.create')}}"> nuovo articolo </a>
                                        </ul>



                                </div>
                        </div>

                    </main>

                    <footer class="py-16 text-center text-sm text-black">

                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})

                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>

