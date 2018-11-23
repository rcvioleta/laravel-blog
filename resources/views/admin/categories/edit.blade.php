@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Update category: {{ $category->name }}</div>
        
        <div class="card-body">
            <form action="{{ route('category.update', [ 'id' => $category->id ]) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $category->name }}">

                    @if ($errors->has('name'))
                        <span class="invalid-feedback"> 
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success">Update Category</button>   
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection