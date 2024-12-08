@foreach ($properties as $property)
    <div class="col">
        <div class="card h-100" style=" margin: 30px;">
            <img src="{{ $property->image ?? 'https://picsum.photos/200/100' }}" class="card-img-top"
                alt="{{ $property->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $property->name }}</h5>
                <p class="card-text">{{ $property->description ?? 'No description available.' }}</p>
                <p><strong>Price: </strong>${{ number_format($property->price, 2) }}</p>
                <p><strong>Location: </strong>{{ $property->location }}</p>
                {{-- <p><strong>Area: </strong>{{ $property->area }} sq.ft.</p>
            <p><strong>Bedrooms: </strong>{{ $property->bedrooms }}</p>
            <p><strong>Bathrooms: </strong>{{ $property->bathrooms }}</p>
            <p><strong>Parking Spaces: </strong>{{ $property->parking_spaces }}</p>
            <p><strong>Furnished: </strong>{{ $property->furnished ? 'Yes' : 'No' }}</p> --}}

                <p><strong>Booked: </strong>{{ $property->booked ? 'Yes' : 'No' }}</p>
                <a href="{{ route('property.show', ['id' => $property->id]) }}" class="btn btn-primary">View
                    Property</a>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated {{ $property->updated_at->diffForHumans() }}</small>

            </div>
        </div>
    </div>
@endforeach

{{-- //for pagination --}}
<div class="pagination">{{ $properties->links('pagination::bootstrap-4') }}</div>
