@extends('layouts.app')

@section('content')
    <section>
        <article class="container">
            @foreach ($transactions as $tr)
            <div class="card mb-4">
                <div class="card-header bg-secondary">
                  <span class="mr-5 text-white">
                    {{ $tr->book_date }}
                  </span>
                  @if ($tr->status == 'pending')
                    <span class="badge bg-warning">Pending</span>
                  @elseif ($tr->status == 'rejected')
                    <span class="badge bg-danger">Pending</span>
                  @elseif ($tr->status == 'accepted' && $tr->is_verified == false)
                  <span class="badge bg-info">Menunggu pembayaran</span>
                  @elseif ($tr->status == 'accepted' && $tr->is_verified == true)
                    <span class="badge bg-success">Diterima</span>
                  @else
                    <span class="badge bg-dark">Tidak terdefinisi</span>
                  @endif
                </div>
                <div class="card-body">
                  <h5 class="card-title">Tempat: {{ $tr->facility->name }}</h5>
                  <p class="card-text">Durasi: {{ $tr->duration }} jam</p>
                  <p class="card-text">Jumlah Peserta: {{ $tr->participants }}</p>
                </div>
            </div>
            @endforeach
        </article>
    </section>
@endsection