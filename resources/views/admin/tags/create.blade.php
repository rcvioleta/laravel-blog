@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fas fa-user-tag"></i> Create a new tag</div>
        
        <div class="card-body">
            <form action="{{ route('tag.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="tag">Tag Name</label>
                    <input type="text" id="tag" name="tag" class="form-control {{ $errors->has('tag') ? 'is-invalid' : '' }}" value="{{ old('tag') }}">

                    @if ($errors->has('tag'))
                        <span class="invalid-feedback"> 
                            <strong>{{ $errors->first('tag') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success">Create Tag</button>   
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection