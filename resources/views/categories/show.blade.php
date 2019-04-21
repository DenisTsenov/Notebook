@extends('main')

@section('title', 'View Category')

@section('content')
<div class="row">
    <div class="col-md-8">
        <p class="lead text-center">Category: {{ $category->name }}</p>
    </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-hroizontal">
                <dt class="">Created at</dt>
                <dd>{{ date("Y / M / d(D) - H:i", time($category->created_at)) }}</dd>
            </dl>

            <dl class="dl-hroizontal">
                <dt>Last Updated at</dt>
                <dd>{{ date("Y / M / d(D) - H:i", time($category->created_at)) }}</dd>
                <hr/>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('category.edit', 'Edit', [$category->id], ['class' => 'btn btn-info btn-block']) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::open(['route' => ['category.destroy', $category->id], 'method' => 'DELETE']) }}
                            <td>{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}</td>
                        {{ Form::close() }}
                    </div>
                </div>
            </dl>
        </div>
    </div>

</div>
@endsection