@extends('layouts.app')

@section('content')
    <div class="min-h-screen">
        <div class="justify-content-center">
            <div class="d-lg-flex min-vh-100 w-100">
                <div class="col-lg-6">
                    {{-- <img class="img-fluid h-100" src="https://picsum.photos/600/360" alt=""> --}}
                    <div id="carouselControls" class="carousel slide h-100 w-100" data-bs-ride="carousel">
                        <div class="carousel-inner h-100 w-100">
                        @foreach ($facility->images as $image)
                            @if ($loop->first)
                                <div class="carousel-item active h-100 w-100">
                                    <img class="d-block img-fluid img-responsive h-100" src="{{ $facility->images[0]->image_url }}" alt="First slide">
                                </div>
                            @else
                                <div class="carousel-item h-100 w-100">
                                    <img class="d-block img-fluid img-responsive h-100" src="{{ $facility->images[$loop->index]->image_url }}" alt="Second slide">
                                </div>
                            @endif
                        @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span cla ss="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 bg-black p-5">
                    <div class="mb-5">
                        <h1 class="fw-bold fs-1 text-white">{{ $facility->name }}</h1>
                        <p class="fw-normal fs-5 text-white">{{ $facility->description }}</p>
                    </div>
                    <div>
                        <div class="d-flex justify-content-around">
                            <a href="/fasilitas/{{ $facility->id }}/booking" class="col-4 text-uppercase fw-bold btn btn-primary rounded">Booking</a>
                            <a href="/fasilitas/{{ $facility->id }}/calendar" class="col-4 text-uppercase fw-bold btn btn-warning rounded">Cek Kalender</a>
                        </div>
                        <div class="d-flex justify-content-center my-5">
                            <a href="/{{ $facility->map_url }}" class="col-4 text-uppercase fw-bold btn btn-danger rounded" target="_blank">Cek Lokasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
