@extends('main')

@section('title', 'All Tags')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <p class="h3 text-center ">All Tags</p>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr class="">
                    <th scope="row">{{$tag->id}}</th>

                    <td> {{ $tag->name }} </td>

                    {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
                    <td>{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}</td>
                    {{ Form::close() }}
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tags->links() }}
    </div>
    <div class="col-md-3">
        <div class="well">
            <h3>New Tag</h3>
            {!! Form::open(['route' => 'tags.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, [
                'class' => 'form-control',
                'required',
                'maxlength' => '50',
                    ]) }}
                <small id="emailHelp" class="form-text text-danger">This field is mandatory.</small>
            </div>

            {{ Form::submit('Submit', ['class' => 'btn btn-outline-info btn-block']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection
