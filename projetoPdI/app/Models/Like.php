<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'comerciante_id', 'liked'];
    // Campos que podem ser preenchidos em massa
    

    // Usuário que deu o like/dislike
    public function user() {
        return $this->belongsTo(User::class, 'user_id'); //relacionamento um like pertence a um usuário
    }

    // Comerciante que recebeu o like/dislike
    public function comerciante() {
        return $this->belongsTo(User::class, 'comerciante_id'); //relacionamento um like pertence a um comerciante
    }
}
