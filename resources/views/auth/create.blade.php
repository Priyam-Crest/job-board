<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600 dark:text-slate-300">
        Sign in to your account
    </h1>

    <x-card class="py-8 px-16 rounded-2xl">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="mb-8">
                <x-label for="email" :required="true">E-mail</x-label>
                <x-text-input name="email" />
            </div>

            <div class="mb-8">
                <x-label for="password" :required="true">
                    Password
                </x-label>
                <x-text-input name="password" type="password" />
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="remember" class="rounded-sm border border-slate-400 dark:border-slate-50 dark:text-indigo-500 dark:ring-2 dark:ring-indigo-300">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div>
                    <a href="#" class="text-indigo-600 hover:underline dark:text-indigo-400">
                        Forget password?
                    </a>
                </div>
            </div>  

            <x-button class="w-full bg-green-50 dark:text-slate-300 dark:bg-green-600 dark:hover:bg-green-700">Login</x-button>
        </form>
    </x-card>
</x-layout>
