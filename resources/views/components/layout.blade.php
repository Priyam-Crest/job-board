<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Job Board</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body
    class="from-10% via-30% to-90% mx-auto mt-10 max-w-5xl bg-gradient-to-r from-indigo-100 via-sky-100 to-emerald-100 text-slate-700 dark:bg-gradient-to-r dark:from-indigo-700 dark:via-sky-700 dark:to-emerald-700 dark:text-slate-100">
    <nav class="mb-8 flex justify-between text-lg font-medium">
        <ul class="flex space-x-2">
            <li>
                <a href="{{ route('jobs.index') }}">Home</a>
            </li>
            <li>
                <button id="themeToggle" class="fixed bottom-2 right-2 px-3 py-2 rounded-full bg-gray-800 text-white text-xs">
                    Toggle Theme
                </button>
                
            </li>
        </ul>

        <ul class="flex space-x-8">
            @auth
                <li>
                    <a href="{{ route('my-job-applications.index') }}">
                        {{ auth()->user()->name ?? 'Anynomus' }}: Applications
                    </a>
                </li>
                <li>
                    <a href="{{ route('my-jobs.index') }}">My Jobs</a>
                </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.create') }}">Sign in</a>
                </li>
            @endauth
        </ul>
    </nav>

    @if (session('success'))
        <div id="alert-3" role="alert"
            class="my-8 rounded-md border-l-4 border-green-800 bg-green-300 p-4 text-green-900 opacity-75 dark:bg-gray-800 dark:text-green-400"
            {{-- class="flex items-center justify-between p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" --}}>
            <p class="font-bold">Success..!!</p>
            <p class="text-green-800 font-medium dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700">
                {{ session('success') }}</p>
            {{-- <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg  p-1.5 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button> --}}
        </div>
    @endif

    @if (session('error'))
        <div role="alert"
            class="my-8 rounded-md border-l-4 border-red-800 bg-red-300 p-4 text-red-900 opacity-75 dark:bg-gray-800 dark:text-red-400">
            <p class="font-bold">Error..!!</p>
            <p class="text-red-800 font-medium dark:text-red-400">{{ session('error') }}</p>
        </div>
    @endif
    {{ $slot }}
    <script>
        document.getElementById('themeToggle').addEventListener('click', function() {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    
        // Check user preference on page load
        document.addEventListener('DOMContentLoaded', function() {
            const preferredTheme = localStorage.getItem('theme');
            const html = document.documentElement;
            if (preferredTheme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }
        });
    </script>
    

</body>

</html>
