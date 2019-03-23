@include('partials._head')

    <body>

@include('partials._nav')
    <h1 class="text-center">My notebook!</h1>
    <hr/>

    <div class="container"> 
        @yield('content')
        <hr/>

        <p class="text-center">All right reserved @</p>
    </div> 

    <!--@show-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
@include('partials._javascript')
    
@yield('scripts')

@include('partials._footer')