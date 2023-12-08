@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">All Provider Services</h1>
        <div class="row">
            @foreach($services as $service)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card" @if(!$service->is_enabled) style="background-color: #4a5568" @endif>
                        <div class="card-settings">
                            <div>
                                <form id="form-check{{$service->id}}" action="{{ route('application.check') }}" method="POST" name="">
                                    @csrf
                                    <input name="service_id" type="hidden" value="{{ $service->id }}">
                                    <input class="form-check-input{{$service->id}}" id="form-check-box" type="checkbox" @if($service->has_application) checked @endif @if(!$service->is_enabled) disabled @endif onclick="selectForm({{$service->id}})">
                                </form>
                            </div>
                            <div>
                                <a href="{{ route('services.edit', ['id' => $service->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            </div>
                            <div class="card-delete-btn">
                                <form action="{{ route('services.delete', ['id' => $service->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-header">
                            <div class="icn">
                                <img src="{{ $service->icon }}" class="card-img-top" alt="Service Icon" style="height: 200px; object-fit: contain;">
                            </div>
                            <div>
                                <h5 class="card-title">{{ $service->name }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $service->description }}</p>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>

        function selectForm(id){
            console.log(id)
            let form = document.getElementById('form-check'+id);
            form.submit({service_id:id})
        }
    </script>
@endsection

