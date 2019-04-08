@extends('main')

@section('title', 'All Notes')

@section('content')

<div class="row">

    <div class="col-md-10">
        <p class="h3 text-center">All Notes</p>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">View the node</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notes as $note)
                <tr>
                    <th scope="row">{{$note->id}}</th>
                    @if(empty($note->title))
                    <td class="text-warning">No title</td>
                    @elseif($note->title)
                    <td> {{ $note->title }} </td>
                    @endif
                    <td>{{strlen($note->content) > 10 ? substr($note->content, 0 , 10) . '...': $note->content }}</td>
                    <td>{!! Html::linkRoute('note.show', 'View', [$note->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                    <td>{!! Html::linkRoute('note.edit', 'Edit', [$note->id], ['class' => 'btn btn-info btn-block']) !!}</td>
                    {{ Form::open(['route' => ['note.destroy', $note->id], 'method' => 'DELETE']) }}
                    <td>{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}</td>
                    {{ Form::close() }}
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="col-md-2">
        <a href="{{ route('note.create') }}" class="btn btn-block btn-info">Create new Note</a>
    </div>
    {{ $notes->links() }}
</div>

@endsection