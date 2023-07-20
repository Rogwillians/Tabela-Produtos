@extends('layouts.layout')

@section('content')
    <h3>Novo Produto</h3>
 @include('admin.form._form_errors')
</ul>
    <form method="post" action="{{route('products.update', ['product' => $product->id])}}">
        
        {{method_field('PUT')}}
        @include('admin.products._form')

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    
@endsection