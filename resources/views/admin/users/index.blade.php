@extends('layouts.app')

@section('content')
    <div class="card">
        <dv class="card-header"><i class="fas fa-users"></i> Users</dv>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Permissions</th>
                    <th>Edit</th>
                    <th>Trash</th>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach ($users->all() as $user)
                            <tr>
                                <td><img src="{{ asset($user->profile->avatar) }}" alt="User Avatar" width="50px" height="50px"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->admin === 1)
                                        <a href="#" class="btn btn-info">user</a>
                                    @else 
                                        <a href="#" class="btn btn-success">administrator</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.edit', [ 'id' => $user->id ]) }}" class="btn btn-lg">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td><a href="{{ route('user.trashed', [ 'id' => $user->id ]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
