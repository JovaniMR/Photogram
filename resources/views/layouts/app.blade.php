
{{-- Header(Menu) --}}
@include('layouts.header')

        {{-- It is the principal content --}}
        <main class="py-4">
            @yield('content')
        </main>
    </div>

      @yield('footer')     
</body>
</html>
