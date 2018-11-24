@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fas fa-tags"></i> Tags</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Tag name</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </thead>
                <tbody>
                    @if ($tags->count() > 0)
                        @foreach ($tags->all() as $tag)
                            <tr>
                                <td>{{ $tag->tag }}</td>
                                <td>
                                    <a href="{{ route('tag.edit', [ 'id' => $tag->id ]) }}" class="btn btn-lg">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td><a href="{{ route('tag.delete', [ 'id' => $tag->id ]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>   
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center"><h3>No tags yet</h3></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection