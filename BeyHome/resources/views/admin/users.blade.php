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
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>
                                <span
                                    class="badge {{ $user->role == 'user' ? 'bg-primary' : ($user->role == 'host' ? 'bg-warning' : '') }}">
                                    {{ $user->role == 'user' ? 'user' : ($user->role == 'host' ? 'host' : '') }}
                                </span>

                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
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
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
