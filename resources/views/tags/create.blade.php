@extends('main')

@section('title', ' Create new tag')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
<h4 class="text-muted text-center">Create New Tag</h4>
<div class="row">
    <div class="col-md-8 offset-2">

        {!! Form::open(['route' => 'tags.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
        <div class="form-group">
            <h3 class="text-center">New Tag</h3>
            {{ Form::label('title', 'Name') }}
            {{ Form::text('title', null, [
                'class' => 'form-control',
                'required',
                'maxlength' => '50',
                    ]) }}
            <small id="emailHelp" class="form-text text-danger">This field is mandatory.</small>
        </div>

        {{ Form::submit('Crete new Tag', ['class' => 'btn btn-outline-info btn-block']) }}

        {!! Form::close() !!}

    </div>    
</div>
@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection