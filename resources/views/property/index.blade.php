@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="lead">
            Content Management
            <a href="{{ route('content.create') }}" class="btn btn-primary btn-sm float-right">Add</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="25%">Name</th>
                <th scope="col" width="15%">Category</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
                <th scope="col" width="1%" colspan="2">Action</th>    
            </tr>
            </thead>
            <tbody>
                @foreach($properties as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->categoryName }}</td>
                        <td>{{ $item->location }}</td>
                        <td>
                        @switch($item->status)
                            @case("published")
                                <a href="{{ route('content.show', $item->id) }}" class="badge bg-success" style=" text-decoration:none;  color:#fff">published</a>
                                @break
                            @default
                                <a href="{{ route('content.publish', $item->id) }}" class="badge bg-secondary" style=" text-decoration:none; color:#fff">draft</a>
                        @endswitch
                        </td>
                        <td><a href="{{ route('content.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td><a href="{{ route('content.destroy', $item->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
