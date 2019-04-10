@include('partials._head')

    <div class="container main"> 
        @include('partials._nav')
        <main class="py-4">
        @include('partials._message')
        @yield('content')
        
        </main>
        <p class="text-center">All right reserved @</p>
    </div> 

    <!--@show-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
@include('partials._javascript')
    
@yield('scripts')

@yield('ajax')

@include('partials._footer')