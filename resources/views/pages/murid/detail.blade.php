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
                    @if (session()->has('fail'))
                        Gagal!
                    @endif
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="/img/user4-128x128.jpg"
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
                                <li class="list-group-item">
                                    <b>Di Buat</b> <a class="float-right">{{ date('d-m-Y', strtotime($murid->created_at)) }}
                                        | {{ date('H:m:s', strtotime($murid->created_at)) }} WIB</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Di Perbarui</b> <a
                                        class="float-right">{{ date('d-m-Y', strtotime($murid->updated_at)) }} |
                                        {{ date('H:m:s', strtotime($murid->updated_at)) }} WIB</a>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-warning btn-block" data-toggle="modal"
                                data-target="#modalQr"><b>Lihat Kartu</b></a>
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
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Absensi</a></li>
                                <li class="nav-item"><a class="nav-link" href="#profile" data-toggle="tab">Profil</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Manage</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="startDate">Tanggal Awal</label>
                                                    <input type="date" name="startDate" id="startDate"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="endDate">Tanggal Akhir</label>
                                                    <input type="date" name="endDate" id="endDate" class="form-control"
                                                        required>
                                                </div>
                                                <button id="searchButton" class="btn btn-primary mb-4">Cari</button>
                                            </div>
                                            <div class="col-md-8">
                                                <div id="searchResult"></div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">30 absensi terakhir untuk murid : <b>
                                                        {{ $murid->nama }}</b></h3>
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
                                                                @if ($a->status == '0')
                                                                    <!-- Tidak Masuk -->
                                                                    <td class="table-danger">{{ $a->hari }}</td>
                                                                    <td class="table-danger">{{ $a->tanggal }}</td>
                                                                    <td class="table-danger">{{ $a->bulan }}</td>
                                                                    <td class="table-danger">{{ $a->jam_absen }} WIB</td>
                                                                    <td class="text-center table-danger"><img
                                                                            src="/img/fail.png" width="20px"
                                                                            height="20px"></td>
                                                                @elseif($a->status == '1')
                                                                    <!-- Masuk -->
                                                                    <td class="table-success">{{ $a->hari }}</td>
                                                                    <td class="table-success">{{ $a->tanggal }}</td>
                                                                    <td class="table-success">{{ $a->bulan }}</td>
                                                                    <td class="table-success">{{ $a->jam_absen }} WIB</td>
                                                                    <td class="text-center table-success"><img
                                                                            src="/img/success.png" width="20px"
                                                                            height="20px"></td>
                                                                @elseif($a->status == '2')
                                                                    <!-- Terlambat -->
                                                                    <td class="table-warning">{{ $a->hari }}</td>
                                                                    <td class="table-warning">{{ $a->tanggal }}</td>
                                                                    <td class="table-warning">{{ $a->bulan }}</td>
                                                                    <td class="table-warning">{{ $a->jam_absen }} WIB</td>
                                                                    <td class="text-center table-warning">Terlambat</td>
                                                                @elseif($a->status == '3')
                                                                    <!-- Izin -->
                                                                    <td class="table-secondary">{{ $a->hari }}</td>
                                                                    <td class="table-secondary">{{ $a->tanggal }}</td>
                                                                    <td class="table-secondary">{{ $a->bulan }}</td>
                                                                    <td class="table-secondary">{{ $a->jam_absen }} WIB
                                                                    </td>
                                                                    <td class="text-center table-secondary">Izin</td>
                                                                @elseif($a->status == '4')
                                                                    <!-- Izin -->
                                                                    <td class="table-light">{{ $a->hari }}</td>
                                                                    <td class="table-light">{{ $a->tanggal }}</td>
                                                                    <td class="table-light">{{ $a->bulan }}</td>
                                                                    <td class="table-light">{{ $a->jam_absen }} WIB</td>
                                                                    <td class="text-center table-light">Hari Libur</td>
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

                                <div class="tab-pane" id="profile">
                                    <form class="form-horizontal">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputNis" class="col-sm-2 col-form-label">NIS</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nis"
                                                    placeholder="NIS" value="{{ $murid->nis }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama"
                                                    placeholder="Nama Lengkap" value="{{ $murid->nama }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputKelas" class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="kelas" name="kelas">
                                                    @foreach ($kelas as $k)
                                                        @if ($k->kelas === $murid->kelas->kelas)
                                                            <option selected>{{ $k->kelas }}</option>
                                                        @else
                                                            <option>{{ $k->kelas }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputTahun" class="col-sm-2 col-form-label">Tahun</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="tahun" name="tahun">
                                                    @foreach ($tahun as $t)
                                                        @if ($t->tahun === $murid->tahun->tahun)
                                                            <option selected>{{ $t->tahun }}</option>
                                                        @else
                                                            <option>{{ $t->tahun }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" required> Data di atas sudah benar.</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-warning">Ubah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <div class="form-group row">
                                        <label for="inputNis" class="col-sm-2 col-form-label">Hapus Murid ?</label>
                                        <div class="col-sm-10">
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#modalLoginForm">Hapus</button>
                                        </div>
                                    </div>
                                </div>
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
    <div class="modal fade" id="modalQr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
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
                    <a href="{{ url('/download-kartu-satuan/' . $murid->id) }}" class="btn btn-success">Download
                        Kartu</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Menampilkan Hasil dari Range Tanggal -->

    <!-- Pop Up Form Hapus Murid -->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold text-danger">Hapus Murid</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/detail-murid/hapus/{{ $murid->id }}" method="post">
                    @csrf
                    <div class="modal-body mx-3">
                        <div class="md-form mb-0">
                            <p class="text-danger">Hapus : <b>{{ $murid->nama }}</b></p>
                            <p class="text-danger"><i>Perhatian! Menghapus data siswa tidak dapat di undur! Apabila kamu
                                    sudah mengisi Absensi dengan data siswa ini sebelumnya, maka data absensi untuk siwa ini
                                    akan hilang permanen! Apabila kamu sudah mengerti tentang resiko ini, maka silahkan isi
                                    Captcha di bawah dan klik Submit.</i></p>
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
