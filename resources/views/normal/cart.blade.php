<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
    @include('normal.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @livewireStyles
</head>

<body>
    
    <!-- END nav -->

    {{-- @include('normal.fixed1') --}}

    {{-- <section class="ftco-section"> --}}
    {{-- @include('normal.combobox') --}}

    {{-- @include('normal.menu') --}}
    {{-- </section> --}}
    @livewire('cart-livewire')
    {{-- @include('normal.fixed2') --}}

    {{-- @include('normal.findfood') --}}

    {{-- @include('normal.fixed3') --}}

    @include('normal.scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    @livewireScripts
</body>

</html>
