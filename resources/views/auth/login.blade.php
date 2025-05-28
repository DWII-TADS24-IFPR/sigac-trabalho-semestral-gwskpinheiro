<x-guest-layout>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

        <!-- Erros de validação -->
        <x-input-error :messages="$errors->all()" class="mb-4" />

        <!-- Formulário de login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="'Email'" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                              :value="old('email')" required autofocus />
            </div>

            <!-- Senha -->
            <div class="mt-4">
                <x-input-label for="password" :value="'Senha'" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                              required autocomplete="current-password" />
            </div>

            <!-- Lembrar -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                           name="remember">
                    <span class="ml-2 text-sm text-gray-600">Lembre-se de mim</span>
                </label>
            </div>

            <!-- Botões e links -->
            <div class="flex flex-col gap-3 mt-6">
                <!-- Botão de login -->
                <x-primary-button class="w-full justify-center">
                    INICIAR SESSÃO
                </x-primary-button>

                <!-- Link para registro como aluno -->
                <a class="text-center text-sm text-blue-600 hover:underline"
                   href="{{ route('register') }}">
                    Cadastrar-se como Aluno
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
