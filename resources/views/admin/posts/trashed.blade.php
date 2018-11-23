@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <th>Image</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                @foreach ($posts->all() as $post)
                    <tr>
                    <td><img src="{{ $post->featured }}" alt="Post Image" width="50px" height="50px"></td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="{{ route('post.restore', [ 'id' => $post->id ]) }}" class="btn btn-sm btn-success">
                                Restore
                            </a>
                        </td>
                        <td><a href="{{ route('post.delete', [ 'id' => $post->id ]) }}" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>   
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
