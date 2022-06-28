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
    <article class="d-flex flex-column justify-content-center" style="min-height: calc(100vh - 10rem);">
      <div>
        <h1 class="fw-bold">Fasilitas-fasilitas</h1>
        <p class=" fs-5 text-primary fw-normal">di tiap departemen</p>
      <div>
        <div class="container text-center my-3">
          <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel px-0 position-relative slide" data-bs-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <div class="col-md-4 px-4">
                    <div class="card border-0">
                      <div class="card-header px-0 bg-transparent text-start">
                        <p class="fs-1 text-secondary">01</p>
                      </div>
                      <div class="card-img">
                        <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                      </div>
                      <div class="card-body px-0 bg-transparent text-start">
                        <h3 class="fw-bold text-uppercase fs-3">Teknik Informatika</h3>
                        <p class="fw-normal fs-5">Fakultas Teknologi Elektro dan Informatika Cerdas.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="col-md-4 px-4">
                    <div class="card border-0">
                      <div class="card-header px-0 bg-transparent text-start">
                        <p class="fs-1 text-secondary">02</p>
                      </div>
                      <div class="card-img">
                        <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                      </div>
                      <div class="card-body px-0 bg-transparent text-start">
                        <h3 class="fw-bold text-uppercase fs-3">Kimia</h3>
                        <p class="fw-normal fs-5">Fakultas Sains dan Analitika Data.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="col-md-4 px-4">
                    <div class="card border-0">
                      <div class="card-header px-0 bg-transparent text-start">
                        <p class="fs-1 text-secondary">03</p>
                      </div>
                      <div class="card-img">
                        <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                      </div>
                      <div class="card-body px-0 bg-transparent text-start">
                        <h3 class="fw-bold text-uppercase fs-3">Teknik Elektro</h3>
                        <p class="fw-normal fs-5">Fakultas Teknologi Elektro dan Informatika Cerdas.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="col-md-4 px-4">
                    <div class="card border-0">
                      <div class="card-header px-0 bg-transparent text-start">
                        <p class="fs-1 text-secondary">04</p>
                      </div>
                      <div class="card-img">
                        <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                      </div>
                      <div class="card-body px-0 bg-transparent text-start">
                        <h3 class="fw-bold text-uppercase fs-3">Teknik Kelautan</h3>
                        <p class="fw-normal fs-5">Fakultas Teknologi Kelautan.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="col-md-4 px-4">
                    <div class="card border-0">
                      <div class="card-header px-0 bg-transparent text-start">
                        <p class="fs-1 text-secondary">05</p>
                      </div>
                      <div class="card-img">
                        <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                      </div>
                      <div class="card-body px-0 bg-transparent text-start">
                        <h3 class="fw-bold text-uppercase fs-3">Arsitektur</h3>
                        <p class="fw-normal fs-5">Fakultas Teknik Sipil, Perencanaan, Dan Kebumian.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="col-md-4 px-4">
                    <div class="card border-0">
                      <div class="card-header px-0 bg-transparent text-start">
                        <p class="fs-1 text-secondary">06</p>
                      </div>
                      <div class="card-img">
                        <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                      </div>
                      <div class="card-body px-0 bg-transparent text-start">
                        <h3 class="fw-bold text-uppercase fs-3">Teknik Sipil</h3>
                        <p class="fw-normal fs-5">Fakultas Teknik Sipil, Perencanaan, Dan Kebumian.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="col-md-4 px-4">
                    <div class="card border-0">
                      <div class="card-header px-0 bg-transparent text-start">
                        <p class="fs-1 text-secondary">07</p>
                      </div>
                      <div class="card-img">
                        <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                      </div>
                      <div class="card-body px-0 bg-transparent text-start">
                        <h3 class="fw-bold text-uppercase fs-3">Sistem Informasi</h3>
                        <p class="fw-normal fs-5">Fakultas Teknologi Elektro dan Informatika Cerdas.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="col-md-4 px-4">
                    <div class="card border-0">
                      <div class="card-header px-0 bg-transparent text-start">
                        <p class="fs-1 text-secondary">08</p>
                      </div>
                      <div class="card-img">
                        <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                      </div>
                      <div class="card-body px-0 bg-transparent text-start">
                        <h3 class="fw-bold text-uppercase fs-3">Teknik Perkapalan</h3>
                        <p class="fw-normal fs-5">Fakultas Teknologi Kelautan</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="col-md-4 px-4">
                    <div class="card border-0">
                      <div class="card-header px-0 bg-transparent text-start">
                        <p class="fs-1 text-secondary">09</p>
                      </div>
                      <div class="card-img">
                        <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                      </div>
                      <div class="card-body px-0 bg-transparent text-start">
                        <h3 class="fw-bold text-uppercase fs-3">Statistika</h3>
                        <p class="fw-normal fs-5">1,Fakultas Sains Dan Analitika Data</p>
                      </div>
                    </div>
                  </div>
                </div>
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
          </div>
        </div>
      </div>
    </article>
  </section>
@endsection
