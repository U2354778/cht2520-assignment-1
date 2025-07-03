@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1>{{ $event->title }}</h1>
                    <p><strong>Organized by:</strong> {{ $event->organizer }}</p>
                </div>
                <div class="col" style="text-align: right;">
                    <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
                    <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit Event</a>
                    <form method="POST" action="{{ route('events.destroy', $event) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Are you sure you want to delete this event?')">
                            Delete Event
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h3>Event Details</h3>
                    <p><strong>Date & Time:</strong> {{ $event->formatted_date_time }}</p>
                    <p><strong>Location:</strong> {{ $event->location }}</p>
                    <p><strong>Status:</strong> 
                        <span style="
                            padding: 0.5rem 1rem; 
                            border-radius: 4px; 
                            font-weight: bold;
                            background-color: {{ $event->status == 'upcoming' ? '#d4edda' : ($event->status == 'ongoing' ? '#fff3cd' : ($event->status == 'completed' ? '#d1ecf1' : '#f8d7da')) }};
                            color: {{ $event->status == 'upcoming' ? '#155724' : ($event->status == 'ongoing' ? '#856404' : ($event->status == 'completed' ? '#0c5460' : '#721c24')) }};
                        ">
                            {{ ucfirst($event->status) }}
                        </span>
                    </p>
                    
                    <h3>Description</h3>
                    <p>{{ $event->description }}</p>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Event Information</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Capacity:</strong> 
                                @if($event->capacity == 0)
                                    Unlimited
                                @else
                                    {{ $event->capacity }} people
                                @endif
                            </p>
                            <p><strong>Current Attendees:</strong> {{ $event->current_attendees }} people</p>
                            <p><strong>Available Spots:</strong> 
                                @if($event->capacity == 0)
                                    Unlimited
                                @else
                                    {{ $event->availability }} spots
                                    @if($event->is_full)
                                        <span style="color: #dc3545; font-weight: bold;">(FULL)</span>
                                    @endif
                                @endif
                            </p>
                            <p><strong>Created:</strong> {{ $event->created_at->format('F j, Y \a\t g:i A') }}</p>
                            <p><strong>Last Updated:</strong> {{ $event->updated_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 