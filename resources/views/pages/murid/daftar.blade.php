@extends('layouts/main')

<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a> / Murid / Daftar Murid</li> 
@endsection 

@section('content')
<!-- Main content -->
<!-- Main content -->
<section class="content pb-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">         
          @if(session()->has('deleted'))                             
          <div class="alert alert-danger" role="alert">
            Data Murid Berhasil di Hapus!.
          </div>
          @endif
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data di bawah adalah data dari keseluruhan murid</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">              
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Lengkap</th>
                  <th>Kelas</th>
                  <th>Tahun</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @php 
                $no=1;
                @endphp
                @foreach ($murid as $m) 
                <tr>
                  <td>{{ $no++; }}</td>
                  <td>{{ $m->nis }}
                  </td>
                  <td>{{ $m->nama }}</td>
                  @if(empty($m->kelas->kelas))
                  <td><i class="text-danger">Kelas tidak di temukan.</i></td>
                  @else
                  <td><a href="/kelas/daftar/{{ $m->kelas_id }}">{{ $m->kelas->kelas }}</a></td>
                  @endif
                  <td>{{ $m->tahun->tahun }}</td>
                  <td class="text-center"><a href="/detail-murid/{{ $m->id }}"><button type="submit" class="btn btn-primary">
                        <span>Detail</span>
                      </button></a>
                  </td>
                </tr>
                @endforeach                
                </tbody> 
                <tfoot>                  
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Tahun</th>
                    <th></th>
                </tr>                
                </tfoot>
              </table>              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>  
  <!-- /.content -->
<!-- /.content -->
@endsection
