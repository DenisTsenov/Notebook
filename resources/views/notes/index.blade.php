@extends('main')

@section('title', 'All Notes')

@section('content')

<div class="row">
    <div class="col-md-10">
        <p class="h3 text-center ">All Notes</p>
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
                <tr class="{{ $note->important ? 'table-danger' : '' }}">
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
        {{ $notes->links() }}
    </div>
    <div class="col-md-2">
        <a href="{{ route('note.create') }}" class="btn btn-block btn-info">Create new Note</a>
    </div>
</div>

@endsection

@section('ajax')
<!-- those libs are required for the ajax to work -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('body').on('click', '.pagination a', function (e) {
        e.preventDefault();
        var page_no = $(this).attr('href').split('page=')[1];
        getPosts(page_no);
    });
    function getPosts(page) {
        $.ajax({
            url: 'note?page=' + page,
        success: function (data) {
            $('.container').empty().html(data);
            location.hash = page;
        }}).fail(function () {
            alert('Error in Loading Notes.');
        });
    }
});
</script>
@endsection
