@extends('admin.layout')


@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Manage Properties</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                        <tr>
                            <td>{{ $property->id }}</td>
                            <td>{{ $property->name }}</td>
                            <td>{{ $property->location }}</td>
                            <td>${{ number_format($property->price, 2) }}</td>
                            <td>
                                <span class="badge {{ $property->booked ? 'bg-danger' : 'bg-success' }}">
                                    {{ $property->booked ? 'Booked' : 'Available' }}
                                </span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                                <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination mt-4">
                {{ $properties->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
