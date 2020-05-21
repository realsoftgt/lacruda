@extends('lacruda::layouts.app')

@section('parent-content')
@include('lacruda::layouts.nav')

<main class="container py-4 flex-shrink-0">
    @yield('child-content')
</main>

@include('lacruda::layouts.footer')
@endsection