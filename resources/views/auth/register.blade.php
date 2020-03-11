@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-2 col-md-4 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form action="{{ route('auth.register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}" required="">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Password<span class="form-required">*</span></label>
                                    <input type="password" name="password" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Repeat password<span class="form-required">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    <hr>
                    <div class="text-center text-muted">
                        Already have an account? <a href="{{ route('auth.login') }}">go back to login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection