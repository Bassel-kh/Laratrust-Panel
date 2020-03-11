@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-2 col-md-4 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="{{ route('auth.login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required="">
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">Log-in</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="text-center text-muted">
                Don't have an account yet? <a href="{{ route('auth.register') }}">registrate now</a>
            </div>
        </div>
    </div>
</div>
@endsection