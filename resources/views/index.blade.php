<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Todo List</title>
</head>

<body class="min-h-screen">
    <nav class="px-2 bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700 ">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="{{ route('index') }}" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Todo List</span>
            </a>
            <div class="w-full md:block md:w-auto">
                <ul
                    class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                    @if (Route::has('login'))
                        @auth
                            <li>
                                <a href="{{ url('/todolist') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">todolist</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}"
                                    class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-white dark:bg-blue-600 md:dark:bg-transparent"
                                    aria-current="page">Login</a>

                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}"
                                        class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-white dark:bg-blue-600 md:dark:bg-transparent"
                                        aria-current="page">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
