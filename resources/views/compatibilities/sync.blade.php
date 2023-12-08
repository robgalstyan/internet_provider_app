@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Sync Service Cards</h1>
        <form action="{{ route('service-compatibilities.sync') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="service_id" class="form-label">Select Service Card</label>
                <select class="form-select" id="service_id" name="service_id">
                    @foreach ($allServices as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="compatibilities" class="form-label">Sync Cards</label>
                <select multiple class="form-select" id="compatibilities" name="compatibilities[]">
                    @foreach ($allServices as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sync Cards</button>
        </form>
    </div>
@endsection
