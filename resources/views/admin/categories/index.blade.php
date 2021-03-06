@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fas fa-layer-group"></i> Categories</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Category name</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </thead>
                <tbody>
                    @if ($categories->count() > 0)
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
                    @else
                        <tr>
                            <td colspan="3" class="text-center"><h3>No categories yet</h3></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection