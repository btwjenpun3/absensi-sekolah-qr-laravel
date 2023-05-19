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
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                  Aksi
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item text-success" href="/download-kartu-massal/{{ $kelas->id }}">Download Kartu Absensi Massal</a>                    
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="#">Hapus Kelas</a>
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
                <h3 class="card-title">Data murid tidak hadir / ijin untuk kelas : <b>{{ $kelas->kelas }}</b> |  ({{ $hari }}, {{ $tanggal }})</h3>
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
                      </tr> 
                      @else
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
@endsection
