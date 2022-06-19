@extends('dashboard')
@section('content')
<!-- Page Heading -->
<div style="background-color: #CAD1DA; width: 100%; height: 60px;"></div>
@if(session()->has('sukses'))
<div class="alert alert-success" style="margin: 30px 1.5rem 0 1.5rem; text-align: center;">
  {{ session()->get('sukses') }}
</div>
@elseif(session()->has('gagal'))
<div class="alert alert-danger" style="margin: 30px 1.5rem 0 1.5rem; text-align: center;">
  {{ session()->get('gagal') }}
</div>
@endif
<!-- Content Row -->
<div class="row" style="padding-top: 30px; padding-left: 1.5rem; padding-right: 1.5rem;">

  <!-- Content Column -->
  <div class="col-lg-12 mb-12">

    <!-- Project Card Example -->
    <div class="card shadow mb-4" style="border-radius: 15px;">
      <div class="card-header py-3" style="border-radius: 15px 15px 0 0;">
        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Profil</h6>
      </div>
      <div class="card-body" style="padding: 100px 300px;">
        <img src="/data_file/{{ $foto }}" class="mx-auto d-block rounded-circle" alt="Cinque Terre" width="150" height="150">
        <br>
        <form action="/profil/admin" id="form" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="file">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
          <input type="text" name="nama" value="{{$nama}}" hidden="">
          <input type="email" name="email" value="{{$email}}" hidden="">
          <input type="text" name="id" value="{{$id}}" hidden="">
        </form>
        <div class="form-group">
          <lable>Nama Lengkap</lable>
          <input type="text" name="nama" class="form-control" aria-describedby="emailHelp" id="exampleInputPassword1" placeholder="Masukkan Nama Lengkap" value="{{$nama}}" required>
        </div>
        <div class="form-group">
          <lable>Email</lable>
          <input type="email" name="email" class="form-control" aria-describedby="emailHelp" id="exampleInputPassword2" placeholder="Masukkan Email" value="{{$email}}" readonly>
        </div>
        <input type="text" name="id" value="{{$id}}" hidden="">
        <button type="button" class="btn btn-primary" onclick="myFunction()" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-fw fa-edit"></i>Simpan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; margin: auto;">Konfirmasi</h5>
                </div>
                <div class="modal-body" style="text-align: center;">
                  Apakah anda yakin untuk menyimpan perubahan?
                </div>
                <div class="modal-footer" style="margin: auto;">
        <form action="/profil/admin" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                      <input type="file" name="file" hidden="">
                    <input type="text" name="nama" id="demo1" hidden="">
                    <input type="email" name="email" id="demo2" hidden="">
                  <input type="text" name="id" value="{{$id}}" hidden="">
                    <button type="submit" class="btn btn-success" style="width: 100px;">SIMPAN</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 100px;">BATAL</button>
              </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection