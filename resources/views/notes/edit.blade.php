@extends('main')

@section('title', ' Edit note')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
<h4 class="text-muted text-center">Edit Note</h4>
<div class="row">
    <div class="col-md-8 offset-2">

        {{ Form::model($note, ['route' => ['note.update', $note->id], 'method' => 'PUT', 'data-parsley-validate' => '']) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', $note->title, [
                'class' => 'form-control',
                'maxlength' => '225',
            ]) }}
            <small id="emailHelp" class="form-text text-muted">This field is not mandatory.</small>
        </div>

        <div class="form-group">
            {{ Form::label('content', 'Note Content *') }}
            {{ Form::textarea('content', $note->content, [
                'class' => 'form-control',
                'rows' => 3,
                'required',
                'data-parsley-required' => 'true',
                'minlength' => '5',
                'maxlength' => '3000',
                    ]) }}
        </div>
        <div class="form-check">
            {{ Form::checkbox('important', 'value', $note->important,['class' => 'form-check-input']) }}
            {{ Form::label('important', 'Marks as Important', ['class' => 'form-check-label']) }}
            <br><br>
        </div>

        {{ Form::submit('Edit', ['class' => 'btn btn-outline-success btn-block']) }}
        {!! $note->important ? '<span class="badge badge-warning">This Note Is Marked as Important</span>' : '' !!}
        {!! Form::close() !!}
        
    </div>    
</div>
@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection