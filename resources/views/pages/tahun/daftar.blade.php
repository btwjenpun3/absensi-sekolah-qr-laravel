@extends('layouts/main')

<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a> / Data Master / Tahun</li> 
@endsection 

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">      
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">
          @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            Data Kelas Berhasil di Tambahkan.
          </div>
          @endif
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data di bawah adalah data dari keseluruhan tahun</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 100px;"> 
                  <div class="input-group-append">
                    <a href="#" data-toggle="modal" data-target="#modalLoginForm"><button class="btn-sm btn-success">
                      <span>Tambah Data</span>
                    </button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table id="daftarTahun" class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Tahun</th>
                    <th></th>                    
                  </tr>
                </thead>
                <tbody>
                  @php $no=1; @endphp
                  @foreach($tahun as $t)
                  <tr>
                    <td>{{ $no++; }}</td>
                    <td>{{ $t->tahun; }}</td>  
                    <td class="text-center">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Manage
                      </button> 
                      <div class="dropdown-menu">                        
                        <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#modalTahunForm-{{ $t->id }}">Hapus Kelas</a>
                      </div>                                         
                    </td>                                                       
                  </tr>
                  @endforeach                                                      
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>     
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <!-- Pop Up Form Input -->
  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Masukkan Tahun</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/tahun-proses" method="post">  
        @csrf    
        <div class="modal-body mx-3">
          <div class="md-form mb-0">          
            <input type="text" id="defaultForm-email" class="form-control validate" name="tahun" placeholder="Masukkan Tahun (misal 2023)" required>          
          </div>        
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  @foreach($tahun as $t) 
  <div class="modal fade" id="modalTahunForm-{{ $t->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold text-danger">HAPUS TAHUN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>               
        <form action="/tahun/hapus/{{ $t->id }}" method="post">  
        @csrf    
        <div class="modal-body mx-3">
          <div class="md-form mb-0">
            <p class="text-danger">Anda ingin menghapus : <b>{{ $t->tahun }}</b></p>
            <p class="text-danger"><i>Perhatian! Menghapus data tahun dapat menyebabkan <b>KERUSAKAN DATA SECARA PERMANEN</b>!. Harap diskusikan terlebih dahulu kepada pihak pengembang atau pihak pengelola pada sekolah anda!. Jika anda sudah yakin akan tindakan anda, maka harap isi Captcha di bawah  dan klik "Saya Yakin!"
            <br>
            <br>
            <b>Pihak pengembang tidak bertanggung jawab atas kerusakan data yang di sebabkan menghapus data kelas ini!</b></i></p>
            <hr>
            {!! captcha_img() !!}
            <span><input type="text" name="captcha" placeholder="Masukkan captcha" required></span>      
          </div>        
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="submit" class="btn btn-danger">Saya Yakin!</button>
        </div>
        </form>        
      </div>
    </div>
  </div>
  @endforeach
@endsection
