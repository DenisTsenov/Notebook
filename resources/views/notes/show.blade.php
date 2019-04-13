@extends('main')

@section('title', 'View Note')

@section('content')
<div class="row">
    <div class="col-md-8">
        @if(empty($note->title))
        <p class="h3 text-center">No title</p>
        @elseif($note->title)
        <p class="h3 text-center">{{ $note->title }}</p>
        @endif
        <hr/>
        <p class="lead text-center">{{ $note->content }}</p>
    </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-hroizontal">
                <dt class="">Slug</dt>
                <dd><a href="{{ url('notes-slug', $note->slug) }}">{{ $note->slug }}</a></dd>
            </dl>
            <dl class="dl-hroizontal">
                <dt class="">Created at</dt>
                <dd>{{ date("Y / M / d(D) - H:i", time($note->created_at)) }}</dd>
            </dl>

            <dl class="dl-hroizontal">
                <dt>Last Updated at</dt>
                <dd>{{ date("Y / M / d(D) - H:i", time($note->created_at)) }}</dd>
                <hr/>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('note.edit', 'Edit', [$note->id], ['class' => 'btn btn-info btn-block']) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::open(['route' => ['note.destroy', $note->id], 'method' => 'DELETE']) }}
                            <td>{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}</td>
                        {{ Form::close() }}
                    </div>
                </div>
            </dl>
        </div>
    </div>

</div>
@endsection