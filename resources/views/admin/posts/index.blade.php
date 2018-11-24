@extends('layouts.app')

@section('content')
    <div class="card">
        <dv class="card-header"><i class="fas fa-pencil-alt"></i> Posts</dv>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Trash</th>
                </thead>
                <tbody>
                    @if ($posts->count() > 0)
                        @foreach ($posts->all() as $post)
                            <tr>
                            <td><img src="{{ $post->featured }}" alt="Post Image" width="50px" height="50px"></td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="{{ route('post.edit', [ 'id' => $post->id ]) }}" class="btn btn-lg">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td><a href="{{ route('post.destroy', [ 'id' => $post->id ]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>   
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center"><h3>No published post</h3></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
