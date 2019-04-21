@extends('main')

@section('title', ' Edit category')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
<h4 class="text-muted text-center">Edit Category</h4>
<div class="row">
    <div class="col-md-8 offset-2">

        {{ Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'PUT', 'data-parsley-validate' => '']) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $category->title, [
                'class' => 'form-control',
                 'maxlength' => '50',
                'required',
                'data-parsley-required' => 'true',
            ]) }}
        </div>

        {{ Form::submit('Edit', ['class' => 'btn btn-outline-success btn-block']) }}
        {!! Form::close() !!}

    </div>    
</div>
@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection