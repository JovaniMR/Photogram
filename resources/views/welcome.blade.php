
<!-- Styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center mt-5">

        <div class="col-lg-4 text-center" >
            <img class="img-fluid mb-4" src="{{ asset('images/fondo.jpg') }}" alt="">
        </div>

        @yield('panel')
    </div>

   @include('layouts.footer')

</div>