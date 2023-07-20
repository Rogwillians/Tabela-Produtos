@extends('layouts.layout')
@section('content')


    <h1>Listagem de produtos</h1>
    <br/><br/>
    <a class="btn btn-default" href="{{route('products.create')}}">Criar novo</a>
    <form action="{{ route('products.massDelete') }}" method="POST">
            @csrf
    <table class =" table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Numero de Série</th>
                <th>Valor</th>
                <th>Data de Aquisição</th>
                <th>Ação</th>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                <input type="checkbox" name="product_id[{{ $product->id }}]" value="{{ $product->id }}">
                </td>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->serial_number}}</td>
                <td>{{$product->value}}</td>
                <td>{{$product->obs}}</td>
                <td>
                <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Deseja excluir este item?')">Excluir</button>
                    <a href="{{route('products.show', ['product' => $product->id])}}">Detalhes</a>
                </td>
    
            </tr>
            @endforeach
        </tbody>
       
    </table>
    <input type="submit" value="Excluir Produtos">
    </form>
@endsection
