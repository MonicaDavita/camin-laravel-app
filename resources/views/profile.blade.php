@extends('layouts.app')

@section('scripts')
<script>
    window.onload = () => {
        const btnEdit = document.getElementById('btn-edit');
        const btnSimpan = document.getElementById('btn-simpan');

        btnEdit.addEventListener('click', function() {
            btnEdit.classList.add('d-none');
            btnSimpan.classList.remove('d-none');
            
            const inputs = Array.from(document.getElementsByTagName('input'));
            inputs.shift();
            inputs.forEach(input => {
                input.removeAttribute('readonly')
            });
        })
    }
</script>
@endsection

@section('content')
<section>
    <article class="container">
        <h1 class="fw-bold">Profil Pengguna</h1>
        @if (session('update-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('update-success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="/profil" method="POST">
            @csrf
            <div class="mb-3 input-group-lg">
                <label for="name" class="form-label">Nama</label>
                <input type="nama" readonly="true" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value={{ auth()->user()->name }}>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 input-group-lg">
                <label for="email" class="form-label">Email</label>
                <input type="nama" readonly="true" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value={{ auth()->user()->email }}>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 input-group-lg">
                <label for="phone_number" class="form-label">Nomor telepon</label>
                <input type="nama" readonly="true" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value={{ auth()->user()->phone_number }}>
                @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 input-group-lg">
                <label for="institusi" class="form-label">Institusi</label>
                <input type="nama" readonly="true" class="form-control @error('institusi') is-invalid @enderror" id="institusi" name="institusi" value={{ auth()->user()->institusi }}>
                @error('institusi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-4">
                <button type="button" id="btn-edit" class="btn btn-lg btn-outline-info">Edit Profil</button>
                <button id="btn-simpan" type="submit" class="btn btn-lg d-none btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </article>
</section>
@endsection