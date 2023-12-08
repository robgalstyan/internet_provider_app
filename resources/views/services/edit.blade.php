@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Service</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('services.update', ['id' => $service->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Title</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required>{{ $service->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon URL</label>
                        <input type="text" class="form-control" id="icon" name="icon" value="{{ $service->icon }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
