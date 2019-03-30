@extends('main')

@section('title', 'View Note')

@section('content')
    
    @if(empty($note->title))
        <p class="h3 text-center">No title</p>>
    @elseif($note->title)
        <p class="h3 text-center">{{ $note->title }}</p>
    @endif
    <hr/>
    <p class="lead text-center">{{ $note->content }}</p>

@endsection