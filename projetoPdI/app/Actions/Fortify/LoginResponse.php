<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        // Redireciona para a home após login
        return Redirect::intended('/');
    }
}
