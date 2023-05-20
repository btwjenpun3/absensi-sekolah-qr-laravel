@extends('layouts/main')

<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a> Kelas / <a href="/kelas/daftar">Daftar Kelas </a>/ Detail</li> 
@endsection 

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">      
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">                     
          <div class="card">            
            <div class="card-header">
              <h3 class="card-title pb-3 col-md-10">Data di bawah adalah seluruh murid dari kelas : <b>{{ $kelas->kelas }}</b></h3>
              <div class="btn-group pb-2 col-sm-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  Manage
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item text-success" href="/download-kartu-massal/{{ $kelas->id }}">Download Kartu Absensi Massal</a>                    
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#modalLoginForm">Hapus Kelas</a>
                </div>
              </div>
              <div class="card-tools">                
                <div class="input-group input-group-sm" style="width: 100px;"> 
                  {{-- <div class="input-group-append">
                    <a href="" data-toggle="modal" data-target="#modalLoginForm"><button class="btn-sm btn-success">
                      <span>Tambah Data</span>
                    </button></a>
                  </div> --}}
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table id="example2" class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>NIS</th> 
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Tahun</th>
                    <th></th>                   
                  </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp 
                    @foreach($murid as $m)
                    <tr>                                           
                      <td>{{ $no++ }}</td>
                      <td>{{ $m->nis }}</td>
                      <td>{{ $m->nama }}</td>
                      <td>{{ $m->kelas->kelas }}</td>
                      <td>{{ $m->tahun->tahun }}</td>
                      <td><a href="/detail-murid/{{ $m->id }}"><button class="btn-md btn-primary">Detail</button></a></td>                      
                    </tr>  
                    @endforeach                                                                      
                </tbody>                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-lg-6">                     
            <div class="card">            
              <div class="card-header">
                <h3 class="card-title">Data murid terlambat, tidak hadir, atau ijin kelas : <b>{{ $kelas->kelas }}</b> |  ({{ $hari }}, {{ $tanggal }})</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;"> 
                    {{-- <div class="input-group-append">
                      <a href="" data-toggle="modal" data-target="#modalLoginForm"><button class="btn-sm btn-success">
                        <span>Tambah Data</span>
                      </button></a>
                    </div> --}}
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="absensiKelas" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>NIS</th> 
                      <th>Nama Lengkap</th>
                      <th>Keterangan</th>                                        
                    </tr>
                  </thead>
                  <tbody>  
                      @php $noAbsensi=1; @endphp
                      @foreach ($absensi as $a) 
                      @if($a->status == 0 && $a->created_at->format('Y-m-d') == $verifikasiWaktu)                   
                      <tr>                                                                                       
                        <td class="table-danger">{{ $noAbsensi++ }}</td>
                        <td class="table-danger">{{ $a->murid->nis }}</td>
                        <td class="table-danger">{{ $a->murid->nama }}</td>  
                        <td class="table-danger">Tidak Masuk</td>                                       
                      </tr>
                      @elseif($a->status == 2 && $a->created_at->format('Y-m-d') == $verifikasiWaktu)
                      <tr>                                                                                       
                        <td class="table-warning">{{ $noAbsensi++ }}</td>
                        <td class="table-warning">{{ $a->murid->nis }}</td>
                        <td class="table-warning">{{ $a->murid->nama }}</td>  
                        <td class="table-warning">Terlambat</td>                                       
                      </tr> 
                      @elseif($a->status == 3 && $a->created_at->format('Y-m-d') == $verifikasiWaktu)
                      <tr>                                                                                       
                        <td class="table-secondary">{{ $noAbsensi++ }}</td>
                        <td class="table-secondary">{{ $a->murid->nis }}</td>
                        <td class="table-secondary">{{ $a->murid->nama }}</td>  
                        <td class="table-secondary">Ijin</td>                                       
                      </tr>
                      @endif
                      @endforeach                                                                       
                  </tbody>                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-lg-6"> 
        </div>
      </div>     
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <!-- Pop Up Form Hapus Murid -->
  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold text-danger">HAPUS KELAS</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/kelas/hapus/{{ $kelas->id }}" method="post">  
        @csrf    
        <div class="modal-body mx-3">
          <div class="md-form mb-0">
            <p class="text-danger">Anda ingin menghapus : <b>{{ $kelas->kelas }}</b></p>
            <p class="text-danger"><i>Perhatian! Menghapus data kelas dapat menyebabkan <b>KERUSAKAN DATA SECARA PERMANEN</b>!. Harap diskusikan terlebih dahulu kepada pihak pengembang atau pihak pengelola pada sekolah anda!. Jika anda sudah yakin akan tindakan anda, maka harap isi Captcha di bawah  dan klik "Saya Yakin!"
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
@endsection
