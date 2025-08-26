<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Verifica se o usuário é comerciante
        $input['is_comerciante'] = isset($input['tipo']) && $input['tipo'] === 'comerciante';
        // Remove caracteres não numéricos do CPF  
        $input['cpf'] = preg_replace('/[^0-9]/', '', $input['cpf']);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'string', 'max:14', 'unique:users'], 
            'produto' => $input['is_comerciante'] ? ['required', 'string'] : [], // só valida se for comerciante, se não, ignora
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'cpf' => $input['cpf'],
            'produto' => $input['produto'] ?? 'sem produto', // se não for comerciante, define como 'sem produto'
            'tipo' => isset($input['tipo']) && $input['tipo'] === 'comerciante' ? 'comerciante' : 'cliente',
            'password' => Hash::make($input['password']),
        ]);
    }
}
