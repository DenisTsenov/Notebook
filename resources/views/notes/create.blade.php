@extends('main')

@section('title', ' Create new note')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}
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
            {{ Form::label('slug', 'Slug*') }}
            {{ Form::text('slug', null, [
                'class' => 'form-control',
                'required',
                'data-parsley-required' => 'true',
                'minlength' => '2',
                'maxlength' => '255',
                    ]) }}
            <small id="emailHelp" class="form-text text-muted">
                This value is required in order to search easily. 
            </small>
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

            {{ Form::label('states', 'Tags') }}
            <select class="form-control js-example-basic-multiple" name="states[]" multiple="multiple">
                @foreach($tags as $tag)
                <option value="{{$tag->id }}"> {{ $tag->name }} </option>
                @endforeach
            </select>
        <br><br>
        <div class="form-group">
            {{ Form::label('category_id', 'Category') }}
            {!! Form::select('category_id', $categories, null,
            ['class' => 'form-control', "placeholder" => "Pick a category"]) !!}﻿

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
{!! Html::script('js/select2.min.js') !!}
@endsection

@push('custom-scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2({
            placeholder: 'Select a tag'
        });
    });
</script>
@endpush