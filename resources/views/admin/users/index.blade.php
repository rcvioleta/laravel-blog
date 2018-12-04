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
                                        <a href="{{ route('user.not-admin', ['id' => $user->id]) }}" class="btn btn-sm btn-warning">
                                            remove permissions
                                        </a>
                                    @else 
                                        <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-success">
                                            make admin
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::id() !== $user->id)
                                        <a href="{{ route('user.delete', [ 'id' => $user->id ]) }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>   
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center"><h3>No users</h3></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
