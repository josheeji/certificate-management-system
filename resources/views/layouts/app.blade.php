@extends('layouts.master')
@section('navigations')
    @include('layouts.backend.inc.admin-sidebar')
    @include('layouts.backend.inc.admin-header')
@endsection

<main id="main" class="main">
    @yield('content')

</main>
