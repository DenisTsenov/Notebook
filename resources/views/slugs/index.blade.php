@extends('main')

@section('title', 'All Notes')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        Notes!
    </div>
    <div class="col-md-8 col-md-offset-2">
        {!! $allNotes->count() < 1 ? '<h2>No Notes!</h2>' : '' !!}
        @foreach($allNotes as $note)
        @if(empty($note->title))
        <h3 class="text-warning">No title</h3>
        @elseif($note->title)
        <h3> {{ $note->title }} </h3>
        @endif
        <p>{{strlen($note->content) > 100 ? substr($note->content, 0 , 30) . '...': $note->content }}</p>
        <p>Created at: {{ date("Y / M / d(D) - H:i", time($note->created_at)) }}</p>
        <td>{!! Html::linkRoute('note.show', 'Read', [$note->id], ['class' => 'btn btn-info']) !!}</td>

        @endforeach
        <br/><br/>
        {{ $allNotes->links() }}
    </div>
</div>

@endsection

@section('ajax')
<!-- those libs are required for the ajax to work -->
<script src="https://code.jquery.com/jquery-3.4.0.min.js">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script type="text/javascript">
$(document).ready(function () {
$('body').on('click', '.pagination a', function (e) {
        e.preventDefault();
        getPosts($(this).attr('href').split('page=')[1]);
});
function getPosts(page) {
    $.ajax({
        url: 'all-notes?page=' + page,
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
