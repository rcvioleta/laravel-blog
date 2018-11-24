@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fas fa-file-signature"></i> Create new post</div>
        <div class="card-body">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}" id="title">
                    
                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control {{ $errors->has('featured') ? 'is-invalid' : '' }}" id="featured">
                
                    @if ($errors->has('featured'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('featured') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>   
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tag">Select tags</label>  
                    @foreach ($tags->all() as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->tag }}</label>
                        </div>    
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}">{{ old('content') }}</textarea>
                
                    @if ($errors->has('content'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif         
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success">Save post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection