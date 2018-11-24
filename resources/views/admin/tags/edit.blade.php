@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Update tag: {{ $tag->tag }}</div>
        
        <div class="card-body">
            <form action="{{ route('tag.update', [ 'id' => $tag->id ]) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="tag">Tag Name</label>
                    <input type="text" id="tag" name="tag" class="form-control {{ $errors->has('tag') ? 'is-invalid' : '' }}" value="{{ $tag->tag }}">

                    @if ($errors->has('tag'))
                        <span class="invalid-feedback"> 
                            <strong>{{ $errors->first('tag') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success">Update tag</button>   
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection