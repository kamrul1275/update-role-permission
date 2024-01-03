@extends('layouts.app')


@section('content')
    <h1 class="text-center">Welcome Dashboard..</h1>
    <h3 class="text-center">My Name is: {{ Auth::user()->name }}</h3>



    <ul>
        <li> <a href="{{ route('home.user') }}" class="btn btn-primary">Home Page</a></li>
        <li> <a href="{{ route('role.request') }}" class="btn btn-warning">Role Request</a></li>
        <li> <a href="{{ route('role.pages') }}" class="btn btn-info">Role</a></li>
        <li> <a href="{{ route('index.product') }}" class="btn btn-success">Product</a></li>
    </ul>

    </div>














@endsection
