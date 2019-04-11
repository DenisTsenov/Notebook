@extends('main')

@section('title', ' Create new note')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
<h4 class="text-muted text-center">Create New Note</h4>
<div class="row">
    <div class="col-md-8 offset-2">

        {!! Form::open(['route' => 'note.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, [
                'class' => 'form-control',
                'maxlength' => '225',
                    ]) }}
            <small id="emailHelp" class="form-text text-muted">This field is not mandatory.</small>
        </div>

        <div class="form-group">
            {{ Form::label('content', 'Note Content *') }}
            {{ Form::textarea('content', null, [
                'class' => 'form-control',
                'rows' => 3,
                'required',
                'data-parsley-required' => 'true',
                'minlength' => '5',
                'maxlength' => '3000',
                    ]) }}
        </div>
        <div class="form-check">
            {{ Form::checkbox('important', 'value', false,['class' => 'form-check-input']) }}
            {{ Form::label('important', 'Marks as Important', ['class' => 'form-check-label']) }}
            <br><br>
        </div>

        {{ Form::submit('Submit', ['class' => 'btn btn-outline-info btn-block']) }}

        {!! Form::close() !!}

    </div>    
</div>
@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection