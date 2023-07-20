@extends('layouts.layout')

@section('content')
    <h3>Ver cliente</h3>
    <a class="btn btn-primary" href="{{ route('products.edit',['product' => $product->id]) }}">Editar</a>
    <a class="btn btn-danger" href="{{ route('products.destroy',['product' => $product->id]) }}"
        onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
    <form id="form-delete"style="display: none" action="{{ route('products.destroy',['product' => $product->id]) }}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>
    <br/><br/>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{$product->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$product->name}}</td>
        </tr>
        <tr>
            <th scope="row">Numero de Série</th>
            <td>{{$product->serial_number}}</td>
        </tr>
        <tr>
            <th scope="row">Quantidade</th>
            <td>{{$product->quantity}}</td>
        </tr>
        <tr>
            <th scope="row">Valor</th>
            <td>{{$product->value}}</td>
        </tr>
    
        <tr>
            <th scope="row">Data de Aquisição</th>
            <td>{{$product->purchase_date}}</td>
        </tr>
        <tr>
            <th scope="row">Observações</th>
            <td>{{$product->obs}}</td>
        </tr>
        </tbody>
    </table>
@endsection