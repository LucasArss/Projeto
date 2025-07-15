<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EventController extends Controller
{
    public function index(){
    $users = User::all();
    return view("welcome", ['users' => $users]);
    }

    public function create(){
        // Retorna a view de criação de eventos
        return view('events.create');
    }

    public function products(){
         $busca = request('search');
    // A variável $busca estará disponível na view Products -->
    // e poderá ser acessada como {{ $busca }}
    // A variável $busca conterá o valor do parâmetro de consulta 'search'
    // Exemplo: se a URL for /Produtos?search=produto
    return view('Products', ['busca' => $busca]);
    }

    public function product($id = null){
        // Retorna a view de um produto específico
        return view('Product', ['id' => $id]);
    }

}
