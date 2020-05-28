
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

    <div class="row justify-content-center mt-5 text-center">
        <div class="col-12">
            <p style="font-size: 14px; color: #777">&copy; {{ __('2020 PHOTOGRAM DESARROLLADO POR JOVANI MARTINEZ.') }}</p>
        </div>
    </div>

</div>