@extends('layouts.app')

@section('content')
    {{-- @include('admin.includes.message') --}}

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <th>Category name</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </thead>
                <tbody>
                @foreach ($categories->all() as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('category.edit', [ 'id' => $category->id ]) }}" class="btn btn-lg">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td><a href="{{ route('category.delete', [ 'id' => $category->id ]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>   
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection