@extends('layouts.main')

@section('title', 'Produto')

@section('content')
    <p> Detalhes do produto com ID: {{ $id }}</p>
    <a href="/Produtos">Voltar para a lista de produtos</a> 
@endsection
