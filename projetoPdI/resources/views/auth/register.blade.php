<script>
function mascaraCPF(campo) {
    let valor = campo.value.replace(/\D/g, ''); // Remove tudo que não for número

    // Aplica a máscara
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

    campo.value = valor;
}
function toggleProduto() {
    const checkbox = document.getElementById('tipo');
    const produtoDiv = document.getElementById('produtoDiv');

    if (checkbox.checked) {
        produtoDiv.classList.remove('hidden');
    } else {
        produtoDiv.classList.add('hidden');
    }
}
</script>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                 <x-label for="cpf" value="{{ __('CPF') }}" />
                 <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" maxlength="14" required autocomplete="cpf" oninput="mascaraCPF(this)" required/>
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="mt-4">
            <label for="tipo" class="flex items-center">
                <input type="checkbox" id="tipo" name="tipo" value="comerciante" class="mr-2" onchange="toggleProduto()" />
                <span>Você é um comerciante?</span>
            </label>
        </div>

        <div id="produtoDiv" class="mt-4 hidden">
            <x-label for="produto" value="{{ __('Produto Principal') }}" />
            <select id="produto" name="produto" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                <option value="">-- Selecione um produto --</option>
                <option value="Eletronicos">Eletrônicos</option>
                <option value="Alimentos">Alimentos</option>
                <option value="Brinquedos">Brinquedos</option>
                <option value="Roupas">Roupas</option>
                <option value="Utilidades">Utilidades</option>
            </select>
        </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
