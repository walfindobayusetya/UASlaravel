@extends('layouts.app2')

@section('content')
    <h3>Login</h3>
    <form action="{{ URL::to('login') }}" method="POST">
    @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Username</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button class="btn btn-primary">Login</button>
    </form>
@endsection