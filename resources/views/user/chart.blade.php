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

                        <div id="docs-card"  class="flex justify-center overflow-y-auto rounded-lg bg-white py-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] ">

                        <div class="relative flex lg:items-end">

                            <div id="docs-card-content" class="flex lg:flex-col">

                                <div class=" w-100 pt-6 px-6 sm:pt-5 lg:pt-0">

                                    <h2 class="text-xl font-semibold text-black ">Grafico</h2>

                                    <x-chartjs-component :chart="$chart" />

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
