<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-50 text-black/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="items-center gap-2 py-10 lg:grid-cols-3">
                        <x-navbar />
                    </header>

                    <main class="mt-6 flex justify-center">

                        <div class="w-3/6 flex justify-center">


                            <div class="flex rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10" >


                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black">nuovo articolo</h2>

                                    <p class="mt-4 text-sm/relaxed">


                                        <div class="bg-red-600 rounded my-1">
                                            @error('name')
                                                {{ $message }}
                                            @enderror

                                            @error('price')
                                                {{ $message }}
                                            @enderror

                                            @error('position')
                                                {{ $message }}
                                            @enderror

                                            @error('amount')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                        <form method = "POST" action="{{route('article.store')}}">
                                            @csrf
                                            @method('POST')
                                            <ul>
                                                <li>
                                                    <label for="name">name</label>
                                                    <input class="@error('name')
                                                        ring-2 ring-red-500 ring-inset
                                                    @enderror block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" class="@error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" >
                                                </li>
                                                <li>
                                                    <label for="price">price</label>
                                                    <input class=" @error('price')
                                                        ring-2 ring-red-500 ring-inset
                                                    @enderror block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="number" step="0.01" class="@error('price') is-invalid @enderror" name="price" id="price" value="{{old('price')}}">
                                                </li>

                                                <li>
                                                    <label for="insert">inserimento</label>
                                                    <input class="
                                                    @error('insert')
                                                        ring-2 ring-red-500 ring-inset
                                                    @enderror block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="datetime-local" class="@error('insert') is-invalid @enderror" name="insert" id="insert" value="{{old('insert')}}" >
                                                </li>

                                                <li>
                                                    <label for="taking">prelievo</label>
                                                    <input class="
                                                    @error('taking')
                                                        ring-2 ring-red-500 ring-inset
                                                    @enderror block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="datetime-local" class="@error('taking') is-invalid @enderror" name="taking" id="taking" value="{{old('taking')}}" >
                                                </li>


                                                <li>
                                                    <label for="position">position</label>
                                                    <input class="@error('position')
                                                        ring-2 ring-red-500 ring-inset
                                                    @enderror block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" class="@error('position') is-invalid @enderror"  name="position" id="position" value="{{old('position')}}">
                                                </li>
                                                <li>
                                                    <label for="amount">quantità</label>
                                                    <input class="@error('amount')
                                                        ring-2 ring-red-500 ring-inset
                                                    @enderror block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="number" class="@error('amount') is-invalid @enderror" name="amount" id="amount" value="{{old('amount')}}">
                                                </li>
                                                <li>
                                                    <input class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" type="submit" value="invio">
                                                </li>
                                            </ul>

                                        </form>
                                    </p>


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


