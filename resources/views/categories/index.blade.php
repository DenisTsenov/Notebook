@extends('main')

@section('title', 'All Categories')

@section('content')

<div class="row">
    <div class="col-md-10">
        <p class="h3 text-center ">All Categories</p>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td> {{ $category->name }} </td>
                    
                    <td>{!! Html::linkRoute('category.show', 'View', [$category->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                    <td>{!! Html::linkRoute('category.edit', 'Edit', [$category->id], ['class' => 'btn btn-info btn-block']) !!}</td>
                    {{ Form::open(['route' => ['category.destroy', $category->id], 'method' => 'DELETE']) }}
                    <td>{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}</td>
                    {{ Form::close() }}
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
    <div class="col-md-2">
        <a href="{{ route('category.create') }}" class="btn btn-block btn-info">Create new Category</a>
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
            url: 'category?page=' + page,
        success: function (data) {
            $('.container').empty().html(data);
            location.hash = page;
        }}).fail(function () {
            alert('Error in Loading Categories.');
        });
    }
});
</script>
@endsection
