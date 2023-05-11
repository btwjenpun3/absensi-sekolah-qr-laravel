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
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data di bawah adalah data dari keseluruhan murid</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Lengkap</th>
                  <th>Kelas</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>333225555552222
                  </td>
                  <td>Muhamad Helmi</td>
                  <td>XI-3</td>
                  <td></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>333225555551111
                  </td>
                  <td> Muhamad Faisal</td>
                  <td>X-1</td>
                  <td></td>
                </tr>
                </tbody> 
                <tfoot>                  
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
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
