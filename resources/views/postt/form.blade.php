<div class="container">
    <div class="card">
        <div class="card-body">
        <form action="{{ $url }}" method="POST">
            @method($method)
            @csrf
        
            <div class="form-group my-3">
                <div class="mb-3">
                <label class="form-label">{{ __('Contents')}}</label>
                <input type="text-area" name="contenido" required class="form-control" placeholder="{{ __('contenido')}}"  value="{{ isset($post->Contents) ? $post->Contents: '' }} ">  <!-- old('contenido', $post->contenido)--> 
            </div>
            <button type="submit" class="btn btn-primary" >{{ __('Send')}}</button>
                
        </form>

            </div>
        
        </div>
    </div>
  </div>