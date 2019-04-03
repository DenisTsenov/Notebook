<div class="row">
    @if(Session::has('success'))
    <div class="alert alert-primary" role="alert">
        Success! {{ Session::get('success') }}
    </div>
    @endif
    
    @if(Session::has('success_edit'))
    <div class="alert alert-primary" role="alert">
        Success! {{ Session::get('success_edit') }}
    </div>
    @endif`
    
    @if(count($errors) > 0) 
    <div class="alert alert-danger" role="alert">
        <strong>Oops!</strong>
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>