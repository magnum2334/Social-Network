<div class="container">
    <div class="card col-7 offset-3 my-3">
        <div class="card-body  ">
        <form action="{{ $url }}" method="POST">
            @method($method)
            @csrf

            <div class="form-group"> 
                <label class="form-label">{{ __('title')}}</label>
                <input type="text-area" name="titulo" id="titulo" required @error('titulo') is-invalid @enderror  class="form-control rounded-lg" placeholder="{{ __('Titulo')}}"  value="{{old('titulo', $post->titulo)}}">
            </div>

            <div class=" form-group my-3">
                <label class="form-label">{{ __('Contents')}}</label>
                <textarea cols="80" rows="5" name="contents" id="contents" placeholder="{{ __('Escribe aqui tu publicacion...')}}" class="rounded-lg form-control @error('Contenido') is-invalid @enderror " required >{{old('Contents', $post->contents)}}</textarea>
                     @error('Contenido')
                         <div class="alert alert-danger">{{ $message }} </div>
                     @enderror

                    @error('titulo')
                         <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
        
            </div>
            
           
            <button type="submit" class="ml-3 btn btn-primary" >{{ __('Send')}}</button>
                
        </form>

            
        
         </div>
     </div>
</div>