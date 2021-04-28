<div class="container">
    <div class="card">
        <div class="card-body">
        <form action="{{ $url }}" method="POST"></form>
            @method($method)
            @csrf
        
            <div class="mb-3">
                <label class="form-label">{{('Contenido')}}</label>
                <input type="text-area" name="contenido" class="form-control" value="{{isset($Post->Contenido) ? $Post->Contenido : ''}}">
                
                <label class="form-label">{{('Fecha')}}</label>
                <input type="date" name="contenido" class="form-control" value="{{isset($Post->Fecha) ? $Post->Fecha : ''}}">

                <input type="submit" value="{{ $Modo=='crear' ? 'Agregar':'Modificar'}}" class=" my-2 btn-lg btn-dark">

               
            </div>
        
        </div>
    </div>
  </div>