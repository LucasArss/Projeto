<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Request $request, $comercianteId)
    {
        $user = Auth::user();
        // Usuario logado que está dando o like/dislike
        $comerciante = User::findOrFail($comercianteId);
        // Comerciante que está recebendo o like/dislike

        // Impede que o usuário curta seu próprio perfil
        if ($user->id === $comerciante->id) {
            return back()->with('error', 'Você não pode curtir seu próprio perfil.');
        }

        // Cria ou atualiza o like/dislike
        Like::updateOrCreate(
            ['user_id' => $user->id, 'comerciante_id' => $comerciante->id],
            ['liked' => $request->liked]
        );

        // Redireciona de volta para a página anterior
        return back();
    }
}
