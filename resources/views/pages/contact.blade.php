@extends('main')

@section('title', 'Contact')

@section('content')
<h3 class="text-center"> How can you contact me?</h3>
<form>
    <div class="font-group">
        <label name="email"> Email:</label>
        <input id="email" name="email" type="email" class="form-control">
    </div>

    <div class="font-group">
        <label name="subject"> Subject:</label>
        <input id="subject" name="subject" type="text" class="form-control">
    </div>

    <div class="font-group">
        <label name="message"> Message:</label> Type you message
        <textarea id="message" name="message" type="text-area" class="form-control"></textarea>
    </div>
    <hr/>
    <input name="send" type="submit" value="Send" class="btn btn-info">

</form>
@endsection
