    {{ csrf_field() }}
    {{old('name')}}
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" id="name" name="name" value="{{old('name', $product->name)}}"> 
        </div>

        <div class="form-group">
            <label for="serial_number">Numero de Série</label>
            <input class="form-control" id="serial_number" name="serial_number" value="{{old('serial_number',$product->serial_number)}}"> 
        </div>

        <div class="form-group">
            <label for="quantity">Quantidade</label>
            <input class="form-control" id="quantity" name="quantity" value="{{old('quantity', $product->quantity)}}"> 
        </div>

        <div class="form-group">
            <label for="value">Valor</label>
            <input class="form-control" id="value" name="value" value="{{old('value',$product->value)}}"> 
        </div>
        
        <div class="form-group">
            <label for="purchase_date">Data de Aquisição</label>
            <input class="form-control" id="purchase_date" name="purchase_date" type="date" value="{{old('purchase_date',$product->purchase_date)}}"> 
        </div>

        <div class="form-group">
            <label for="obs">Observações</label>
            <input class="form-control" id="obs" name="obs" value="{{old('obs', $product->obs)}}"> 
        </div>
          