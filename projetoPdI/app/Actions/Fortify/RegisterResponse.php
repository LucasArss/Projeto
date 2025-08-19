<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        return Redirect::to('/');
    }
}
