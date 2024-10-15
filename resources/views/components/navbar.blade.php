                        @if (Route::has('login'))
                            <nav class="-mx-3 flex rounded pl-3 justify-between bg-red-600 ">
                                <x-application-logo class="block h-12 w-auto" />
                                @auth
                                        <a
                                            href="{{ url('/dashboard') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                        >
                                            Dashboard
                                        </a>
                                    @else
                                        <div class="pt-3">
                                            <a
                                            href="{{ route('login') }}"
                                            class="rounded-md px-3  text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                        >
                                            Log in
                                        </a>

                                        @if (Route::has('register'))
                                            <a
                                                href="{{ route('register') }}"
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                            >
                                                Register
                                            </a>
                                        @endif
                                        </div>

                                @endauth
                            </nav>
                        @endif