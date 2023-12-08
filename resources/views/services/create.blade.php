@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Create New Service</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('services.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon URL</label>
                        <input type="text" class="form-control" id="icon" name="icon">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
