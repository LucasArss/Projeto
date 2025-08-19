<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    public function index(){

    $search = request('search');
    // Verifica se há uma busca
    if($search) {
        // Busca usuários que possuem o termo pesquisado no nome ou produto
        $users = User::where([
            ['name', 'like', '%'.$search.'%']])->get();
        
    } else {
        // Se não houver busca, retorna todos os usuários
        $users = User::all();
    }         
    return view("welcome", ['users' => $users, 'search'=> $search]);
}


    public function create(){
        // Retorna a view de criação de eventos
        return view('events.create');
    }
    
    public function info($id){
        // Retorna a view de informações do usuário autenticado
        $user = Auth::user($id);
        if (!$user) {
            return redirect('/')->with('error', 'Você precisa estar logado para acessar suas informações.');
        }
        return view('events.info', ['user' => $user]);
    }

    public function store(Request $request){
        $user = Auth::user();
        if (!$user) {
            return redirect('/')->with('error', 'Você precisa estar logado para cadastrar informações.');
        }

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->{('image')};
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            
            // move a imagem para o diretório público
            // public_path() retorna o caminho completo para a pasta public
            // e o método move() move o arquivo para o diretório especificado
            $requestImage->move(public_path('img/users'), $imageName);
           
            // Atualiza o campo 'image' do usuário autenticado
            $user->image = $imageName;
        }
        // Validação dos dados recebidos
        $request->validate([
            'bairro' => 'required|string|max:255',
            'rua' => 'required|string|max:255',
            'forma_pagamento' => 'required|string|max:255',
            'contato' => 'required|string|max:255',
            'p_oferecido' => 'required|string|max:255',
            'h_funcionamento' => 'required|string|max:255',]
        ,[
        'bairro.required' => 'O campo bairro está vazio por favor preencha-o corretamente.',
        'rua.required' => 'O campo  rua está vazio por favor preencha-o corretamente.',
        'contato.required' => 'O campo contato está vazio por favor preencha-o corretamente.',
        'p_oferecido.required' => 'O campo pagamento está vazio por favor preencha-o corretamente.',        
        'h_funcionamento.required' => 'O campo horario de funcionamento esta vazio por favor preencha-o corretamente.',
    ]);

        $user->bairro = $request->bairro;
        $user->rua = $request->rua;
        $user->forma_pagamento = $request->forma_pagamento;
        $user->contato = $request->contato;
        $user->produtos_oferecidos = $request->p_oferecido;
        $user->horario_funcionamento = $request->h_funcionamento;

        $user->save();
        return redirect("/")->with('sucess', 'Informações cadastradas com sucesso!');




}

    public function show($id){
        $user = User::findOrFail($id);
        return view('events.show', ['user' => $user]);
    }


    public function destroy($id){
        $user = User::findOrFail($id);
        if (Auth::user()->id !== $user->id) {
            return redirect('/')->with('error', 'Você não tem permissão para excluir este usuário.');
        }
        $user->delete();
        return redirect('/')->with('success', 'Conta excluída com sucesso!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        if (Auth::user()->id !== $user->id) {
            return redirect('/')->with('error', 'Você não tem permissão para editar este usuário.');
        }
        return view('events.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'cpf' => 'required|string|max:14|unique:users,cpf,' . $id,
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'bairro' => 'required|string|max:255',
        'rua' => 'required|string|max:255',
        'forma_pagamento' => 'required|string|max:255',
        'contato' => 'required|string|max:255',
        'p_oferecido' => 'required|string|max:255',
        'h_funcionamento' => 'required|string|max:255',
    ]);

    $user = User::findOrFail($id);

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $requestImage = $request->file('image');
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

        $requestImage->move(public_path('img/users'), $imageName);

        $user->image = $imageName;
    }

    $user->cpf = $request->cpf;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->bairro = $request->bairro;
    $user->rua = $request->rua;
    $user->forma_pagamento = $request->forma_pagamento;
    $user->contato = $request->contato;
    $user->produtos_oferecidos = $request->p_oferecido;
    $user->horario_funcionamento = $request->h_funcionamento;

    $user->save();

    return redirect('/')->with('success', 'Informações atualizadas com sucesso!');
}



    }

