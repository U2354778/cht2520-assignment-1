@extends('layouts.app')

@section('title', 'Add New Event')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Add New Community Event</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('events.store') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="form-label">Event Title *</label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title') }}" required>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="organizer" class="form-label">Organizer *</label>
                            <input type="text" id="organizer" name="organizer" class="form-control @error('organizer') is-invalid @enderror" 
                                   value="{{ old('organizer') }}" required>
                            @error('organizer')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Event Description *</label>
                    <textarea id="description" name="description" class="form-control form-textarea @error('description') is-invalid @enderror" 
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="event_date" class="form-label">Event Date *</label>
                            <input type="date" id="event_date" name="event_date" class="form-control @error('event_date') is-invalid @enderror" 
                                   value="{{ old('event_date') }}" required>
                            @error('event_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="event_time" class="form-label">Event Time *</label>
                            <input type="time" id="event_time" name="event_time" class="form-control @error('event_time') is-invalid @enderror" 
                                   value="{{ old('event_time') }}" required>
                            @error('event_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="location" class="form-label">Location *</label>
                    <input type="text" id="location" name="location" class="form-control @error('location') is-invalid @enderror" 
                           value="{{ old('location') }}" required>
                    @error('location')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="number" id="capacity" name="capacity" class="form-control @error('capacity') is-invalid @enderror" 
                                   value="{{ old('capacity', 0) }}" min="0">
                            <small class="form-text text-muted">Leave as 0 for unlimited capacity</small>
                            @error('capacity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="current_attendees" class="form-label">Current Attendees</label>
                            <input type="number" id="current_attendees" name="current_attendees" class="form-control @error('current_attendees') is-invalid @enderror" 
                                   value="{{ old('current_attendees', 0) }}" min="0">
                            @error('current_attendees')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status" class="form-label">Status *</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div style="margin-top: 2rem;">
                    <button type="submit" class="btn btn-success">Create Event</button>
                    <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection 