@extends('main')

@section('title', ' Create new note')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
<h4 class="text-muted text-center">Create New Category</h4>
<div class="row">
    <div class="col-md-8 offset-2">

        {!! Form::open(['route' => 'category.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
        <div class="form-group">
            {{ Form::label('name', 'Category Name') }}
            {{ Form::text('name', null, [
                'class' => 'form-control',
                'maxlength' => '50',
                'required',
                'data-parsley-required' => 'true',
                    ]) }}
        </div>

        {{ Form::submit('Create Category', ['class' => 'btn btn-outline-info btn-block']) }}

        {!! Form::close() !!}

    </div>    
</div>
@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection