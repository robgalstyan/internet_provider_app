@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">All Provider Services</h1>
        <div class="row">
            @foreach($services as $service)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="icn">
                                <img src="{{ $service->icon }}" class="card-img-top" alt="Service Icon" style="height: 200px; object-fit: contain;">
                            </div>
                            <div>
                                <h5 class="card-title">{{ $service->name }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Description</h5>
                            <p class="card-text">{{ $service->description }}</p>
                        </div>
                        <div class="card-footer">
                            <div>
                                <h6> All compatibilites </h6>
                                    <?php $relations = $service->compatibilities->merge($service->reverseCompatibilities) ?>
                                        @foreach($relations as $relation)
                                            <p>{{ $relation->service->name }}</p>
                                        @endforeach
                                    <?php $relations = [] ?>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
