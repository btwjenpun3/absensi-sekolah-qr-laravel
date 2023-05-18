@extends('layouts/main')

<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a> / Murid / Input Murid</li> 
@endsection 

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-6">
          @if(session()->has('success'))                             
          <div class="alert alert-success" role="alert">
            Data Murid Berhasil di Tambahkan.
          </div>
          @endif 
          @error('nis')
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
          @enderror 
          @error('nama')
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
          @enderror                        
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Halaman untuk menambahkan data murid</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/input-murid-proses" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group col-md-12">
                  <label for="nis">NIS</label>
                  <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" placeholder="Masukkan NIS" value="{{ old('nis') }}">
                </div>
                <div class="form-group col-md-12">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                </div>
                <div class="form-group col-md-12">
                    <label>Kelas</label>
                    @if($kelas->count() > 0)
                    <select class="form-control @error('nis') is-warning @enderror @error('nama') is-warning @enderror" id="kelas" name="kelas">                      
                      @foreach ($kelas as $k)
                      <option>{{ $k->kelas }}</option>
                      @endforeach
                    </select>    
                    @else 
                      <input type="text" class="form-control" placeholder="Harap masukkan data Kelas terlebih dahulu!" disabled>
                      <span><a href="/kelas">Klik disini untuk menambah Kelas</a></span>
                    @endif
                    @error('nis')
                      <span class="text-warning">Harap pilih Kelas kembali!</span>
                    @enderror
                    @error('nama')
                      <span class="text-warning">Harap pilih Kelas kembali!</span>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label>Tahun</label>
                    @if($tahun->count() > 0)
                    <select class="form-control" id="tahun" name="tahun">
                      @foreach ($tahun as $t)
                      <option>{{ $t->tahun }}</option>
                      @endforeach                      
                    </select>
                    @else 
                      <input type="text" class="form-control" placeholder="Harap masukkan data Tahun terlebih dahulu!" disabled>
                      <span><a href="/tahun">Klik disini untuk menambah Tahun</a></span>
                    @endif
                    @error('nis')
                      <span class="text-warning">Harap pilih Tahun kembali!</span>
                    @enderror
                    @error('nama')
                      <span class="text-warning">Harap pilih Tahun kembali!</span>
                    @enderror
                </div>                
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="verifikasi" required>
                  <label class="form-check-label" for="verifikasi">Data di atas sudah benar</label>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                @if($tahun->count() > 0 && $kelas->count() > 0)
                <button type="submit" class="btn btn-primary">Submit</button>
                @else
                <button type="" class="btn btn-primary" disabled>Submit</button>
                @endif
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>       
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <!-- Configure a few settings and attach camera -->  

@endsection
