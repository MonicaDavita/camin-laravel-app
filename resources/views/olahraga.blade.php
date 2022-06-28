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
        <p class=" fs-5 text-primary fw-normal">untuk berolahraga</p>
      </div>
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
                        <h3 class="fw-bold text-uppercase fs-3">Lapangan Basket</h3>
                        <p class="fw-normal fs-5">Ini lapangan basket terbaik se Surabaya</p>
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
                        <h3 class="fw-bold text-uppercase fs-3">Lapangan Futsal</h3>
                        <p class="fw-normal fs-5">Ukuran luas.</p>
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
                        <h3 class="fw-bold text-uppercase fs-3">Lapangan Basket</h3>
                        <p class="fw-normal fs-5">Sparing basket bisa 24/7.</p>
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
                        <h3 class="fw-bold text-uppercase fs-3">Lapangan Tenis</h3>
                        <p class="fw-normal fs-5">Bersama-sama sehat dan bugar</p>
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
                        <h3 class="fw-bold text-uppercase fs-3">Basecamp Catur</h3>
                        <p class="fw-normal fs-5">Bersama-sama menjadi serupa dengan grand master Magnus Carlsen.</p>
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
                        <h3 class="fw-bold text-uppercase fs-3">Kolam Renang</h3>
                        <p class="fw-normal fs-5">Coming soon ya amin</p>
                      </div>
                    </div>
                  </div>
                </div>
    </article>
  </section>
@endsection
