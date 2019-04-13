@extends('main')

@section('title', "$noteBySlug->title")

@section('content')
    
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3 class="text-center">{{ $noteBySlug->title }}</h3>
        <p class="text-center">{{ $noteBySlug->content }}</p>
    </div>
</div>

@endsection