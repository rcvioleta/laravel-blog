@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fas fa-sliders-h"></i> Edit blog settings</div>
        <div class="card-body">
        <form action="{{ route('settings.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="site_name">Website name</label>
                    <input type="text" name="site_name" class="form-control {{ $errors->has('site_name') ? 'is-invalid' : '' }}" value="{{ $settings->site_name }}" id="site_name">
                    
                    @if ($errors->has('site_name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('site_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="contact_number">Phone number</label>
                    <input type="text" name="contact_number" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}" value="{{ $settings->contact_number }}" id="contact_number">
                
                    @if ($errors->has('contact_number'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('contact_number') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Email address</label>
                    <input type="email" name="contact_email" class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" value="{{ $settings->contact_email }}" id="contact_email">
                
                    @if ($errors->has('contact_email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('contact_email') }}</strong>
                        </span>
                    @endif         
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" value="{{ $settings->address }}" id="address">
                
                    @if ($errors->has('address'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif         
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success">Update settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection