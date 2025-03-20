<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-[#FDFDFC] dark:bg-[#0a0a0a]">
        <div class="min-h-screen">
            @if (Route::has('login'))
                <nav class="fixed top-0 right-0 px-6 py-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-4 py-2 bg-[#13274F] dark:bg-[#13274F] border border-transparent rounded-sm font-medium text-sm text-white hover:bg-[#13274F]/90 dark:hover:bg-[#13274F]/90 focus:outline-none transition ease-in-out duration-150">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#13274F] dark:hover:text-[#13274F]">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-[#13274F] dark:bg-[#13274F] border border-transparent rounded-sm font-medium text-sm text-white hover:bg-[#13274F]/90 dark:hover:bg-[#13274F]/90 focus:outline-none transition ease-in-out duration-150">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-[#1b1b18] dark:text-white sm:text-5xl md:text-6xl">
                        Travel Portal
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-[#706f6c] dark:text-[#A1A09A] sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                        Streamline your travel agency operations with our comprehensive management system
                    </p>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                        <!-- Feature 1 -->
                        <div class="bg-white dark:bg-[#161615] border border-[#19140035] dark:border-[#3E3E3A] rounded-sm p-6">
                            <div class="text-[#13274F] dark:text-[#13274F] text-2xl mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-[#1b1b18] dark:text-white mb-2">Agent Sales Management</h3>
                            <p class="text-[#706f6c] dark:text-[#A1A09A]">Track and manage all your travel agent sales in one place</p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="bg-white dark:bg-[#161615] border border-[#19140035] dark:border-[#3E3E3A] rounded-sm p-6">
                            <div class="text-[#13274F] dark:text-[#13274F] text-2xl mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-[#1b1b18] dark:text-white mb-2">Comprehensive Analytics</h3>
                            <p class="text-[#706f6c] dark:text-[#A1A09A]">Get insights into your agency's performance with detailed reports</p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="bg-white dark:bg-[#161615] border border-[#19140035] dark:border-[#3E3E3A] rounded-sm p-6">
                            <div class="text-[#13274F] dark:text-[#13274F] text-2xl mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-[#1b1b18] dark:text-white mb-2">Secure & Reliable</h3>
                            <p class="text-[#706f6c] dark:text-[#A1A09A]">Built with security in mind to protect your business data</p>
                        </div>
                    </div>
                </div>

                <div class="mt-16 text-center">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-sm text-white bg-[#13274F] dark:bg-[#13274F] hover:bg-[#13274F]/90 dark:hover:bg-[#13274F]/90">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-sm text-white bg-[#13274F] dark:bg-[#13274F] hover:bg-[#13274F]/90 dark:hover:bg-[#13274F]/90">
                            Get Started
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </body>
</html>
