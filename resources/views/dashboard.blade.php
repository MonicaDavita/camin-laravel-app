@extends('layouts.app')

@section('styles')
  <style>
    @media (max-width: 767px) {
      .carousel-inner .carousel-item>div {
        display: none;
      }

      .carousel-inner .carousel-item>div:first-child {
        display: block;
      }
    }

    .carousel-inner .carousel-item.active,
    .carousel-inner .carousel-item-next,
    .carousel-inner .carousel-item-prev {
      display: flex;
    }

    /* medium and up screens */
    @media (min-width: 768px) {

      .carousel-inner .carousel-item-end.active,
      .carousel-inner .carousel-item-next {
        transform: translateX(33.33%);
      }

      .carousel-inner .carousel-item-start.active,
      .carousel-inner .carousel-item-prev {
        transform: translateX(-33.33%);
      }
    }

    .carousel-inner .carousel-item-end,
    .carousel-inner .carousel-item-start {
      transform: translateX(0);
    }

  </style>
@endsection

@section('scripts')
  <script>
    let items = document.querySelectorAll('.carousel .carousel-item')

    items.forEach((el) => {
      const minPerSlide = 4
      let next = el.nextElementSibling
      for (var i = 1; i < minPerSlide; i++) {
        if (!next) {
          // wrap carousel by using first child
          next = items[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
      }
    })
  </script>
@endsection

@section('content')
  <section class="container">
    <article class="d-flex flex-column {{ count($facilities) == 0 ? "justify-content-start" : "justify-content-center" }}" style="min-height: calc(100vh - 10rem);">
      <div>
        <h1 class="fw-bold">Fasilitas-Fasilitas</h1>
        <p class=" fs-6 text-primary fw-normal">yang terbaik untuk anda</p>
        @if (count($facilities) != 0)
          <span class="badge bg-info fs-6">{{ $category ? "Kategori " . $category : "Semua fasilitas" }}</span>
        @endif
      </div>
      <div>
        @if (session('booking-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('booking-success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container my-3">
          <div class="row mx-auto my-auto justify-content-start">
            @if (count($facilities) == 0)
              <div class="text-center">
                <h1 class="fw-semibold fs-4">Maaf, kategori fasilitas yang anda cari tidak tersedia</h1>
                <a href="/" class="btn btn-primary">Cari faslitas yang lain</a>
              </div>
            @else
              <div id="recipeCarousel" class="carousel px-0 position-relative slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  @foreach ($facilities as $facil)    
                    @if ($loop->first)
                        <div class="carousel-item active">
                          <div class="col-md-4 px-4">
                            <div class="card border-0">
                              <div class="card-header px-0 bg-transparent text-start">
                                <p class="fs-1 text-secondary">{{ $loop->iteration }}</p>
                              </div>
                              <div class="card-img">
                                <img src="{{ $facil->images[0]->image_url }}" class="img-fluid">
                              </div>
                              <div class="card-body px-0 bg-transparent">
                                <h3 class="fw-bold text-black text-uppercase fs-3">{{ $facil->name }}</h3>
                                <p class="fw-normal fs-5 text-black">{{ $facil->description }}</p>
                                <a href="/fasilitas/{{ $facil->id }}" class="btn btn-primary">Lihat detail</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    @else
                        <div class="carousel-item">
                          <div class="col-md-4 px-4">
                            <div class="card border-0">
                              <div class="card-header px-0 bg-transparent text-start">
                                <p class="fs-1 text-secondary">{{ $loop->iteration }}</p>
                              </div>
                              <div class="card-img">
                                <img src="{{ $facil->images[0]->image_url }}" class="img-fluid">
                              </div>
                              <div class="card-body px-0 bg-transparent">
                                <h3 class="fw-bold text-black text-uppercase fs-3">{{ $facil->name }}</h3>
                                <p class="fw-normal fs-5 text-black">{{ $facil->description }}</p>
                                <a href="/fasilitas/{{ $facil->id }}" class="btn btn-primary">Lihat detail</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    @endif
                  @endforeach
                </div>
                <div class="m-0 d-flex justify-content-between position-absolute top-50 w-100 left-0 right-0"
                  style="transfrom: translate(50%);">
                  <button class="bg-transparent border-0" href="#recipeCarousel" role="button" type="button"
                    data-bs-slide="prev" style="transform: translateX(-75%);">
                    <img src="{{ asset('vendor/blade-fontawesome/solid/angle-left.svg') }}" width="75" height="75" />
                  </button>
                  <button class="bg-transparent border-0" href="#recipeCarousel" role="button" type="button"
                    data-bs-slide="next" style="transform: translateX(75%);">
                    <img src="{{ asset('vendor/blade-fontawesome/solid/angle-right.svg') }}" width="75" height="75" />
                  </button>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </article>
  </section>
@endsection
