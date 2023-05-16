@extends('layouts/main')

<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a> / Murid / <a href="/daftar-murid">Daftar Murid</a> / Detail</li> 
@endsection 

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="/img/user4-128x128.jpg"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ $murid->nama }}</h3>
              
              <p class="text-center">{{ $murid->kelas->kelas }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>NIS</b> <a class="float-right">{{ $murid->nis }}</a>
                </li>
                <li class="list-group-item">
                  <b>Tahun</b> <a class="float-right">{{ $murid->tahun->tahun }}</a>
                </li>
                <li class="list-group-item">
                  <b>Kehadiran</b> <a class="float-right">98%</a>
                </li>                
              </ul>
              <a href="#" class="btn btn-warning btn-block"  data-toggle="modal" data-target="#modalQr"><b>Lihat Kartu</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Profile</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">              

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

              <p class="text-muted">Jalan Setenan Tengah Nomor 8, Ungaran</p>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Absensi</a></li>                
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Profil</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form id="searchForm">
                                    <div class="form-group">
                                        <label for="startDate">Tanggal Awal</label>
                                        <input type="date" name="startDate" id="startDate" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="endDate">Tanggal Akhir</label>
                                        <input type="date" name="endDate" id="endDate" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </form>
                            </div>
                            <div class="col-md-8">
                              <div id="searchResult"></div>
                            </div>                            
                        </div>
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">30 absensi terakhir untuk murid : <b> {{ $murid->nama }}</b></h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Bulan</th>
                                <th>Jam Absen</th>
                                <th class="text-center">Status</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach ($absensi as $a)                                   
                              <tr>
                                @if($a->status == '0')
                                  <td class="table-danger">{{ $a->hari }}</td>
                                  <td class="table-danger">{{ $a->tanggal }}</td> 
                                  <td class="table-danger">{{ $a->bulan }}</td>                                 
                                  <td class="table-danger">{{ $a->jam_absen }} WIB</td>
                                  <td class="text-center table-danger"><img src="/img/fail.png" width="20px" height="20px"></td>
                                @elseif($a->status == '1')
                                  <td class="table-success">{{ $a->hari }}</td>
                                  <td class="table-success">{{ $a->tanggal }}</td>
                                  <td class="table-success">{{ $a->bulan }}</td>                                  
                                  <td class="table-success">{{ $a->jam_absen }} WIB</td>
                                  <td class="text-center table-success"><img src="/img/success.png" width="20px" height="20px"></td>
                                @elseif($a->status == '2')
                                  <td class="table-warning">{{ $a->hari }}</td>
                                  <td class="table-warning">{{ $a->tanggal }}</td>  
                                  <td class="table-warning">{{ $a->bulan }}</td>                                
                                  <td class="table-warning">{{ $a->jam_absen }} WIB</td>
                                  <td class="text-center table-warning">Terlambat</td>
                                @elseif($a->status == '3')
                                  <td class="table-secondary">{{ $a->hari }}</td>
                                  <td class="table-secondary">{{ $a->tanggal }}</td>
                                  <td class="table-secondary">{{ $a->bulan }}</td>                                   
                                  <td class="table-secondary">{{ $a->jam_absen }} WIB</td>
                                  <td class="text-center table-secondary">Izin</td>
                                @endif                                
                              </tr>
                              @endforeach                                                 
                              </tbody> 
                              <tfoot>                  
                              <tr>
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Bulan</th>
                                <th>Jam Absen</th>
                                <th class="text-center">Status</th>
                              </tr>                
                              </tfoot>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                    </div>                    
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        10 Feb. 2014
                      </span>
                    </div>                    
                  </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">NIS</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nis" placeholder="NIS" value="{{ $murid->nis }}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" value="{{ $murid->nama }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Kelas</label>
                      <div class="col-sm-10">
                        <select class="form-control @error('nis') is-warning @enderror @error('nama') is-warning @enderror" id="kelas" name="kelas">                      
                          @foreach ($kelas as $k)
                          @if($k->kelas === $murid->kelas->kelas)
                          <option selected>{{ $k->kelas }}</option>
                          @else
                          <option>{{ $k->kelas }}</option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  <!-- Pop Up Form Input -->
  <div class="modal fade" id="modalQr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content col-md-9"> 
        <style>
          .kartu {
            width: 300px;
            height: 100%;
            border: 2px #black;
            border-style: double;
            box-shadow: 1px 1px 3px #ccc;
            padding: 20px;
            margin: 20px auto;
            text-align: center;
            font-family: inherit;
            font-size: 13px;
          } 
          .name {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: -5px;
          }
          .kelas {
            font-weight: bold;
            font-size: 13px;
            margin-bottom: -5px;
          }
          .photo {
			      width: 80px;
            height: 100px;            
            margin: 0 auto;            
          }

          .nis {
            margin-bottom: 10px;
          }

          .qr-code {
            width: 100%;
            height: 100%;
            margin: 30px auto;
            margin-bottom: 25px;
          }
        </style>
                
          <div class="kartu">
            <div class="photo">
              <img src="/img/logo-sekolah.png" class="img-fluid">
            </div>          
            <div class="name">
              {{ $murid->nama }}
            </div>
            <div class="kelas">
              {{ $murid->kelas->kelas }}
            </div>
            <div class="nis">
              NIS: {{ $murid->nis }}
            </div>
            <div class="qr-code">
              {{ $qr }}
            </div>
          </div>
          <div class="button-container d-flex justify-content-center mb-3">
            <a href="{{ url('/download-kartu-satuan/'.$murid->id) }}" class="btn btn-success">Download Kartu</a>
          </div>              
      </div>
    </div>
  </div>

@endsection