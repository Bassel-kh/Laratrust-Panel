@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4 col-md-8 col-lg-10">
            <div class="card">
                <div class="card-header">Permission Dashboard</div>
                <div class="card-body">
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.permissions.create') }}">Create a new permission</a>
                    <table class="table table-hover my-2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Display Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                                <th scope="row">{{ $permission->id }}</th>
                                <td><a href="{{ route('admin.permissions.show', $permission) }}">{{ Str::limit($permission->name, 25) }}</a></td>
                                <td>{{ $permission->display_name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>{{ $permission->created_at->diffForHumans() }}</td>
                                <td>{{ $permission->updated_at->diffForHumans() }}</td>
                                <td><a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-primary btn-sm">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection