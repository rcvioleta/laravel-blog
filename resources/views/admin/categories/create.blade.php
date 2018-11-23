@extends('layouts.app')

@section('content')
    {{-- @include('admin.includes.message') --}}

    <div class="card">
        <div class="card-header">Create a new category</div>
        
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span class="invalid-feedback"> 
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success">Save Category</button>   
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection