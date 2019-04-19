@extends('main')

@section('title', ' Create Profile')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h3>Enter in your profile</h3>
        {!! Form::open(['route' => 'post.login', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
        <div class="form-group">
            {{ Form::label("email", 'Email', ['class' => 'control-label']) }}
            {{ Form::email('email', null, [
            'class' => 'form-control',
                'required',
                'data-parsley-required' => 'true',
                'minlength' => '2',
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
        <div class="form-check">
         {{ Form::checkbox('remember', 'value', false,['class' => 'form-check-input']) }} {{ Form::label('remember', null, ['class' => 'form-check-label']) }}
        </div>
        <br>
        
        {{ Form::submit('Enter in profile', ['class', 'btn btn-outline-info btn-block']) }}
        <p> <a href="{{ url('password/reset') }}">Forgot password?</a></p>
        {!! Form::close() !!}
    </div>
</div>

@endsection