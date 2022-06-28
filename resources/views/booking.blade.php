@extends('layouts.app')

@section('content')
    <section class="">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <article class="row">
                <div class="col-lg-6 p-5">
                    <h1 class="fw-bold text-uppercase" style="color: #5d00d2">BOOKING<br>{{ $facility->name }}</h1>
                    <p class="my-4 fs-1 fw-bold" sty    le="color: #5d00d2"><u>Syarat</u></p>
                    <div class="d-flex fs-5 align-items-start">
                        <i class="bi bi-file-earmark pe-3"></i>
                        <p class="fs-4">Mengunduh dan melengkapi surat-surat yang ada pada <a href="">intip.in/SuratDanBerkas</a></p>
                    </div>
                    <div class="d-flex fs-5 align-items-start">
                        <i class="bi bi-newspaper pe-3"></i>
                        <p class="fs-4">Menyiapkan proposal/ surat yang menggambarkan kegiatan yang akan dilaksanakan pada {{ $facility->name }}</p>
                    </div>
                    <div class="d-flex fs-5 align-items-start">
                        <i class="bi bi-people-fill pe-3"></i>
                        <p class="fs-4">Partisipan kegiatan tidak boleh melebihi <span class="fw-bold">{{ $facility->quota }} orang</span></p>
                    </div>
                    <div class="d-flex fs-5 align-items-start">
                        <i class="bi bi-download pe-3"></i>
                        <p class="fs-4">Mengisi dan menyimpan bukti telah melakukan pemesanan pada form di samping</p>
                    </div>
                    <div class="d-flex justify-content-center my-2">
                        <button class="btn btn-info btn-lg fw-bold">AJUKAN PERTANYAAN</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="/fasilitas/{{ $facility->id }}/booking" method="POST" class="d-grid gap-3 p-5" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="input-group input-group-lg">
                            <input class="form-control" type="text" name="name" placeholder="Nama Lengkap">
                        </div>           --}}
                        {{-- <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Nama Institusi">
                        </div>          --}}
                        <div class="input-group input-group-lg">
                            <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description" placeholder="Deskripsi singkat kegiatan">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>    
                        <div class="input-group input-group-lg">
                            <span class="input-group-text">Tanggal kegiatan</i></span>
                            <input class="form-control @error('book_date') is-invalid @enderror" type="date" placeholder="Tanggal Kegiatan" name="book_date" min="<?= date("Y-m-d", time() + 86400); ?>"  value="{{ old('book_date') }}">
                            @error('book_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>    
                        <div class="input-group input-group-lg">
                            <span class="input-group-text"><i class="bi bi-alarm"></i></span>
                            <input class="form-control @error('duration') is-invalid @enderror" type="number" placeholder="Durasi Kegiatan (jam)" name="duration"  value="{{ old('duration') }}">
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>    
                        <div class="input-group input-group-lg">
                            <span class="input-group-text"><i class="bi bi-people"></i></span>
                            <input class="form-control @error('participants') is-invalid @enderror" type="number" placeholder="Total Partisipan" name="participants" value="{{ old('participants') }}">
                            @error('participants')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="d-flex justify-content-around"> --}}
                        <div class="input-group input-group-lg w-100">
                            <label class="input-group-text bg-info fw-bold" for="upload_proposal">Upload Proposal</label>
                            <input type="file" class="form-control" id="upload_proposal" name="proposal">
                        </div>
                        <div class="input-group input-group-lg w-100">
                            <label class="input-group-text bg-info fw-bold" for="upload_berkas">Upload Berkas</label>
                            <input type="file" class="form-control" id="upload_berkas" name="berkas">
                        </div>
                                {{-- <button class="col-4 fw-bold btn btn-outline-info btn-lg rounded"></button>
                                <button class="col-4 fw-bold btn btn-outline-info btn-lg rounded"></button> --}}
                                {{-- </div> --}}
                        <div class="mt-5">
                            <div class="d-flex justify-content-center">
                                {{-- <button type=submit class="col-10 btn btn-primary btn-lg rounded fw-bold" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">BOOKING</button> --}}
                                <button type="submit" class="col-10 btn btn-primary btn-lg rounded fw-bold">BOOKING</button>
                            </div>
                        </div>
                    </form>
                </div>
            <!-- Modal -->
            {{-- TODO IF STATEMENT --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Berhasil!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Booking berhasil dilakukan</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btn-lg">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
        </article>
    </section>
@endsection
