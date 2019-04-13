@extends('main')

@section('title', 'Home page')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to our great Note book site </h1>
            <hr class="my-4">
            <p>Here you can create, read, update and delete your important notes, but before that, please create your account.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
</div>

<div class="row align-items-start text-center"> {{-- Start of row div --}}
    <div class="col-md-6 ">
        <div class="col-sm-6 ">
            {!! $importantNotes->count() == 0 ? '<h1 class="display-6">There are no notes for now</h1>' : '' !!}
            @foreach($importantNotes as $importantNote)
            <div class="card {{ $noImportant ?? ''}}" style="width: 18rem;">
                <div class="card-body alert">
                    <h5 class="card-title">{{ $importantNote->title ?? 'No title' }}</h5>
                    <a href="{{ route('note.slug', $importantNote->slug) }}" class="btn btn-primary">Read</a>
                </div>
            </div>
            <br>
            @endforeach
            
        </div>
    </div>

    <div class="col-md-5 col-md-offset-1">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
        when an unknown printer took a galley of type and scrambled it to make 
        a type specimen book. It has survived not only five centuries, but also 
        the leap into electronic typesetting, remaining essentially unchanged. It was popularised 
    </div>

</div> {{-- End of row div --}}

@endsection