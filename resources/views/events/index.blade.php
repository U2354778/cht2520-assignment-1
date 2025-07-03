@extends('layouts.app')

@section('title', 'All Events')

@section('content')
    <div class="search-filter">
        <form method="GET" action="{{ route('events.index') }}">
            <div class="form-group">
                <label for="search" class="form-label">Search Events</label>
                <input type="text" id="search" name="search" class="form-control" 
                       value="{{ request('search') }}" placeholder="Search by title, description, location, or organizer">
            </div>
            <div class="form-group">
                <label for="status" class="form-label">Filter by Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="">All Statuses</option>
                    <option value="upcoming" {{ request('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                    <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('events.index') }}" class="btn btn-secondary">Clear</a>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col">
            <h1>Local Community Events</h1>
            <p>Discover and join exciting events in your local community of Huddersfield.</p>
        </div>
        <div class="col" style="text-align: right;">
            <a href="{{ route('events.create') }}" class="btn btn-success">Add New Event</a>
        </div>
    </div>

    @if($events->count() > 0)
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-6">
                    <div class="card event-card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $event->title }}</h3>
                            <p class="event-info"><strong>Organized by:</strong> {{ $event->organizer }}</p>
                        </div>
                        <div class="card-body">
                            <p class="event-info"><strong>Date & Time:</strong> {{ $event->formatted_date_time }}</p>
                            <p class="event-info"><strong>Location:</strong> {{ $event->location }}</p>
                            <p class="event-info"><strong>Status:</strong> 
                                <span class="status-badge status-{{ $event->status }}">
                                    {{ ucfirst($event->status) }}
                                </span>
                            </p>
                            <p class="event-info"><strong>Availability:</strong> 
                                @if($event->capacity == 0)
                                    Unlimited
                                @else
                                    {{ $event->availability }} spots left
                                    @if($event->is_full)
                                        <span style="color: #e74c3c; font-weight: bold;">(FULL)</span>
                                    @endif
                                @endif
                            </p>
                            <p class="event-description">{{ Str::limit($event->description, 150) }}</p>
                            <div class="event-actions">
                                <a href="{{ route('events.show', $event) }}" class="btn btn-primary">View Details</a>
                                <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit</a>
                                <form method="POST" action="{{ route('events.destroy', $event) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" 
                                            onclick="return confirm('Are you sure you want to delete this event?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $events->appends(request()->query())->links() }}
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <h3>No events found</h3>
                <p>No events match your search criteria. Try adjusting your search terms or filters.</p>
                <a href="{{ route('events.create') }}" class="btn btn-success">Add the First Event</a>
            </div>
        </div>
    @endif
@endsection 