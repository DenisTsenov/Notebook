@extends('main')

@section('title', ' Create Profile')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>Create your profile</h3>

        {!! Form::open(['route' => 'post.register', 'method' => 'POST', 'data-parsley-validate' => '']) !!}

        <div class="form-group">
            {{ Form::label("name", 'Name', ['class' => 'control-label']) }}
            {{ Form::text('name', null, [
            'class' => 'form-control',
                'required',
                'data-parsley-required' => 'true',
                'minlength' => '2',
                'maxlength' => '255',
        ]) }}
        </div>

        <div class="form-group">
            {{ Form::label("email", 'Email', ['class' => 'control-label']) }}
            {{ Form::email('email', null, [
            'class' => 'form-control',
                'required',
                'data-parsley-required' => 'true',
                'minlength' => '5',
                'maxlength' => '255',
        ]) }}
        </div>

        <div class="form-group">
            {{ Form::label("password", 'Password', ['class' => 'control-label']) }}
            {{ Form::password('password', [
            'class' => 'form-control',
                'required',
                'data-parsley-required' => 'true',
                'minlength' => '6',
                'maxlength' => '255',
            ]) }}
        </div>

        <div class="form-group">
            {{ Form::label("password_confirmation", 'Confirm password', ['class' => 'control-label']) }}
            {{ Form::password('password_confirmation', [
            'class' => 'form-control',
                'required',
                'data-parsley-required' => 'true',
                'minlength' => '6',
                'maxlength' => '255',
        ]) }}
        </div>
        <br>
        
            {{Form::submit('Register', ['class', 'btn btn-primary btn-block'])}}
        
        {!! Form::close() !!}
    </div>
</div>
@endsection