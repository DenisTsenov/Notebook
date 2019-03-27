@extends('main')

@section('title', ' Create new note')

@section('content')
<h4 class="text-muted text-center">Create New Note</h4>
<div class="row">
    <div class="col-md-8 offset-2">

        {!! Form::open(['route' => 'note.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}
            <small id="emailHelp" class="form-text text-muted">This field is not mandatory.</small>
        </div>

        <div class="form-group">
            {{ Form::label('content', 'Note Content *') }}
            {{ Form::textarea('title', null, ['class' => 'form-control', 'rows' => 3]) }}
        </div>

        {{ Form::submit('Submit', ['class' => 'btn btn-outline-info btn-block']) }}

        {!! Form::close() !!}

    </div>    
</div>
@endsection