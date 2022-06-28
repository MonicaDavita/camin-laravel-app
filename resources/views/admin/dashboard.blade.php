@extends('layouts.app')

@section('content')
<section>
    <article class="container">
        <h1 class="mb-5 fw-bold">Daftar Peminjaman</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Tanggal booking</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Status</th>
                <th scope="col">Tindakan</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $tr)  
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ date('d/m/y', strtotime($transactions[0]->book_date)) }}</td>
                  <td>{{ $tr->facility->name }}</td>
                  <td>{{ $tr->description }}</td>
                  <td>
                    @if ($tr->status == "pending")
                      <span class="badge bg-warning">Pending</span>
                    @elseif($tr->status == "rejected")
                    <span class="badge bg-danger">Ditolak</span>
                    @elseif($tr->status == "accepted" && !$tr->is_verified)
                    <span class="badge bg-info">Menunggu pembayaran</span>
                    @elseif($tr->status == "accepted" && $tr->is_verified)
                    <span class="badge bg-success">Sudah diverifikasi</span>
                    @else
                    <span class="badge bg-secondary">Tidak terdefinisi</span>
                    @endif
                  </td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailTransaction" onClick="showDetailTransaction({{ $tr->id }});">Lihat detail</button>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </article>
</section>

<!-- Modal -->
<div class="modal fade" id="detailTransaction" tabindex="-1" aria-labelledby="detailTransactionLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailTransactionLabel">Detail Pemesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex flex-column align-center">
          <span id="status-badge"></span>
          <p class="loading text-primary text-center mt-2 fw-semibold">loading...</p>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Data</th>
            </tr>
          </thead>
          <tbody id="table-body">
            <tr>
              <th class="table-detail" scope="row">Nama Pemesan</th>
              <td></td>
            </tr>
            <tr>
              <th class="table-detail" scope="row">Tanggal pemesanan</th>
              <td></td>
            </tr>
            <tr>
              <th class="table-detail" scope="row">Nama tempat</th>
              <td></td>
            </tr>
            <tr>
              <th class="table-detail" scope="row">Deskripsi</th>
              <td></td>
            </tr>
            <tr>
              <th class="table-detail" scope="row">Biaya</th>
              <td></td>
            </tr>
            <tr>
              <th class="table-detail" scope="row">Durasi</th>
              <td></td>
            </tr>
            <tr>
              <th class="table-detail" scope="row">Partisipan</th>
              <td></td>
            </tr>
            <tr>
              <th class="table-detail" scope="row">Dokumen terkait</th>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  function showDetailTransaction(id) { 
    const loading = document.getElementsByClassName('loading')[0];
    loading.classList.remove('d-none');

    const statusBadge = document.getElementById("status-badge");
    statusBadge.innerHTML = "";
    statusBadge.removeAttribute("class");

    const trTags = document.getElementsByClassName('table-detail');
    for(let i = 0; i < 8; i++)
          trTags[i].nextElementSibling.innerHTML = ''; // reset detail form

    fetch(`https://myitsbooking/admin/get-pemesanan/${id}`)
      .then(res => res.json())
      .then(res => {
        trTags[0].nextElementSibling.innerHTML = res.user.name;
        trTags[1].nextElementSibling.innerHTML = res.book_date;
        trTags[2].nextElementSibling.innerHTML = res.facility.name;
        trTags[3].nextElementSibling.innerHTML = res.description;
        trTags[4].nextElementSibling.innerHTML = res.facility.price * res.duration; // perlu dihitung dulu
        trTags[5].nextElementSibling.innerHTML = res.duration;
        trTags[6].nextElementSibling.innerHTML = res.participants;
        trTags[7].nextElementSibling.innerHTML = 'document'; // res.document;

        loading.classList.add('d-none');

        const modalFooter = document.getElementsByClassName('modal-footer')[0];

        if(res.status == 'pending') {
          let btn = document.createElement("btn");
          let btnContent = document.createTextNode("Tolak pesanan");
          btn.appendChild(btnContent);
          btn.setAttribute('type', 'button');
          btn.setAttribute('class', 'btn btn-outline-danger');
          btn.setAttribute('onclick', `rejectTransaction(${res.id});`);
          
          modalFooter.appendChild(btn);
        }
        
        if(res.status == 'pending') {
          let btn = document.createElement("btn");
          let btnContent = document.createTextNode("Terima pesanan");
          btn.appendChild(btnContent);
          btn.setAttribute('type', 'button');
          btn.setAttribute('class', 'btn btn-primary');
          btn.setAttribute('onclick', `acceptTransaction(${res.id});`);
          
          modalFooter.appendChild(btn);
        }

        if(res.status == 'accepted' && !res.is_verified) {
          let btnConfirm = document.createElement("btn");
          let btnConfirmContent = document.createTextNode("Konfirmasi pembayaran");
          btnConfirm.appendChild(btnConfirmContent);
          btnConfirm.setAttribute('type', 'button');
          btnConfirm.setAttribute('class', 'btn btn-success');
          btnConfirm.setAttribute('onclick', `confirmTransaction(${res.id});`);

          let btnCancel = document.createElement("btn");
          let btnCancelContent = document.createTextNode("Batalkan pesanan");
          btnCancel.appendChild(btnCancelContent);
          btnCancel.setAttribute('type', 'button');
          btnCancel.setAttribute('class', 'btn btn-outline-danger');
          btnCancel.setAttribute('onclick', `cancelTransaction(${res.id});`);
          
          modalFooter.appendChild(btnCancel);
          modalFooter.appendChild(btnConfirm);
        }

        if(res.status == "pending") {
          statusBadge.innerHTML = "Pending";
          statusBadge.removeAttribute("class");
          statusBadge.classList.add("badge", "bg-warning", "m-auto");
        } else if(res.status == "rejected") {
          statusBadge.innerHTML = "Ditolak";
          statusBadge.removeAttribute("class");
          statusBadge.classList.add("badge", "bg-danger", "m-auto");
        } else if(res.status == 'accepted' && !res.is_verified) {
          statusBadge.innerHTML = "Menunggu pembayaran";
          statusBadge.removeAttribute("class");
          statusBadge.classList.add("badge", "bg-info", "m-auto");
        } else if(res.status == 'accepted' && res.is_verified) {
          statusBadge.innerHTML = "Sudah diverfikasi";
          statusBadge.removeAttribute("class");
          statusBadge.classList.add("badge", "bg-success", "m-auto");
        } else {
          statusBadge.innerHTML = "Tidak terdefinisi";
          statusBadge.removeAttribute("class");
          statusBadge.classList.add("badge", "bg-secondary", "m-auto");
        }
      })
      .catch(err => console.log(err));
  }

  function rejectTransaction(id) {
    const loading = document.getElementsByClassName('loading')[0];
    loading.classList.remove('d-none');
    fetch(`/admin/reject-pemesanan/${id}`)
    .then(res => {
      location.reload();
      alert('Pesanan ditolak');
    })
    .catch(err => alert(err));
  } 

  function cancelTransaction(id) {
    const loading = document.getElementsByClassName('loading')[0];
    loading.classList.remove('d-none');
    fetch(`/admin/cancel-pemesanan/${id}`)
      .then(res => {
        location.reload();
        alert('Pesanan dibatalkan');
      })
      .catch(err => alert(err));
  }
  
  async function acceptTransaction(id) {
    const loading = document.getElementsByClassName('loading')[0];
    await loading.classList.remove('d-none');
    fetch(`/admin/accept-pemesanan/${id}`)
      .then(res => {
        location.reload();
        alert('Pesanan diterima');
      })
      .catch(err => alert(err));
  } 
  
  function confirmTransaction(id) {
    const loading = document.getElementsByClassName('loading')[0];
    loading.classList.remove('d-none');
    fetch(`/admin/verify-pemesanan/${id}`)
      .then(res => {
        location.reload();
        alert('Pesanan diverifikasi');
      })
      .catch(err => alert(err));
  } 
</script>
@endsection