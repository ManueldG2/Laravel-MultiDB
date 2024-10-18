<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <x-head />

    <body class="font-sans antialiased">
        <div class="bg-gray-50 text-black/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                    <x-navbar />

                    <main class="mt-6">

                        <div class=" lg:gap-8">

                            <div id="docs-card"  class="flex flex-col items-start gap-6  overflow-y-auto rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10">

                            <div class="relative flex items-center gap-6 lg:items-end">

                                <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">

                                    <div class="pt-3 sm:pt-5 lg:pt-0">

                                        <h2 class="text-xl font-semibold text-black">MultiDB</h2>
                                            <ul>

                                                <li>
                                                    <a class="underline-offset-1 text-blue-300 " href="{{route('article.chart')}}">Grafici per articoli </a>
                                                </li>
                                                <li> <a class="underline-offset-1 text-blue-300 " href="{{route('norris')}}">Frasi su Chuck Norris </a></li>
                                                <li> <a class="underline-offset-1 text-blue-300 " href="{{route('article.index')}}">Articoli solo la visualizzazione le rotte per la gestione saranno con l'autenticazione</a> </li>

                                            </ul>

                                    </div>

                                </div>

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
