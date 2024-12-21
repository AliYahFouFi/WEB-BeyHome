@extends('admin.layout')


@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Bookings List</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Property Name</th>
                    <th>Booked By</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>
                            @if ($booking->property)
                                {{ $booking->property->name }}
                            @else
                                <span class="text-danger">Property not found</span>
                            @endif
                        </td>
                        <td>
                            @if ($booking->user)
                                {{ $booking->user->name }}
                            @else
                                <span class="text-danger">user not found</span>
                            @endif
                        </td>

                        <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('d-m-Y') }}</td> <!-- Start Date -->
                        <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('d-m-Y') }}</td> <!-- End Date -->
                        <td>

                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
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
    </div>
@endsection
