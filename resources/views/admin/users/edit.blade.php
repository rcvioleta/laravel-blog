@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fas fa-user-edit"></i> Edit your profile</div>
        <div class="card-body">
        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $user->name }}" id="name">
                    
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="featured">Email</label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ $user->email }}" id="email">
                
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">New password</label>
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password">
                
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif         
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm new password</label>
                    <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation">
                
                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif         
                </div>

                <div class="form-group">
                    <label for="avatar">Upload new avatar</label>
                    <input type="file" name="avatar" class="form-control {{ $errors->has('avatar') ? 'is-invalid' : '' }}" id="avatar">
                
                    @if ($errors->has('avatar'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                    @endif         
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook profile</label>
                    <input type="text" name="facebook" class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" value="{{ $user->profile->facebook }}" id="facebook">
                
                    @if ($errors->has('facebook'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                    @endif         
                </div>

                <div class="form-group">
                    <label for="youtube">Youtube profile</label>
                    <input type="text" name="youtube" class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" value="{{ $user->profile->youtube }}" id="youtube">
                
                    @if ($errors->has('youtube'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('youtube') }}</strong>
                        </span>
                    @endif         
                </div>

                <div class="form-group">
                    <label for="about">About you</label>
                    <textarea name="about" id="about" cols="30" rows="10" class="form-control">
                        {{ $user->profile->about }}
                    </textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success">Update my profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection