@extends('layouts.auth-master')

@section('content')
<div class="container mt-5">
    <form method="post" action="{{ route('register.perform') }}"  enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">
        <label for="floatingEmail">Email address</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
        <label for="floatingName">Username</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
        <label for="floatingPassword">Password</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <label for="floatingConfirmPassword">Confirm Password</label>
                <input type="password" class="form-control" name="confim_password" value="{{ old('confim_password') }}" placeholder="Confirm Password" required="required">
                @if ($errors->has('confim_password'))
                    <span class="text-danger text-left">{{ $errors->first('confim_password') }}</span>
                @endif
            </div>
        <div class="form-group form-floating mb-3">
            <label for="floatingName">Dial code</label>
                <input type="text" class="form-control" name="dial_code" value="{{ old('dial_code') }}" placeholder="Dial code" required="required" autofocus>
                @if ($errors->has('dial_code'))
                    <span class="text-danger text-left">{{ $errors->first('dial_code') }}</span>
                @endif
        </div>

        <div class="form-group form-floating mb-3">
        <label for="floatingName">Mobile no</label>
            <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile no" required="required" autofocus>
            @if ($errors->has('mobile'))
                <span class="text-danger text-left">{{ $errors->first('mobile') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="img">Profile Upload</label>
            <input type="file" name="profile_pic" class="form-control-file" id="profile_pic" required="required" accept="image/png, image/gif, image/jpeg">
            @if ($errors->has('profile_pic'))
                <span class="text-danger text-left">{{ $errors->first('profile_pic') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Role</label>
            <select class="form-control" id="role" name="role" value="{{ old('role') }}">
            <option>Select below type</option>
            <option value="0">Client</option>
            <option value="1">Designer</option>
            </select>
            @if ($errors->has('role'))
                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        
        @include('auth.partials.copy')
    </form>
</div>
@endsection