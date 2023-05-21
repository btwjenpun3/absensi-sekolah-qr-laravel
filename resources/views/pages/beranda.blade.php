@extends('layouts/main')
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalMurid }}</h3>
                            <p>Total Murid</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/daftar-murid" class="small-box-footer">Selengkapnya <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $absenMasuk }}</h3>

                            <p>Absensi Masuk <i>({{ $hari }}, {{ $tanggal }} {{ $bulan }}
                                    {{ $tahun }})</i></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $absenTerlambat }}</h3>

                            <p>Absensi Terlambat <i>({{ $hari }}, {{ $tanggal }} {{ $bulan }}
                                    {{ $tahun }})</i></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $absenAlpa }}</h3>

                            <p>Tidak Masuk / Ijin <i>({{ $hari }}, {{ $tanggal }} {{ $bulan }}
                                    {{ $tahun }})</i></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <div class="row">
                <section class="col-md-6 connectedSortable">
                    <div class="card bg-white">
                        <div class="card-header bg-success"> Absensi Masuk </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped text-nowrap table-hover" id="berandaMasuk">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($muridMasuk as $m)
                                        <tr>
                                            <td class="table-success">{{ $no++ }}</td>
                                            <td class="table-success">{{ $m->murid->nis }}</td>
                                            <td class="table-success"><a
                                                    href="/detail-murid/{{ $m->murid->id }}">{{ $m->murid->nama }}</a>
                                            </td>
                                            <td class="table-success"><a
                                                    href="/kelas/daftar/{{ $m->murid->kelas_id }}">{{ $m->murid->kelas->kelas }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card bg-white mb-5">
                        <div class="card-header bg-info"> Grafik </div>
                        <div class="card">
                            <div class="container">
                                <canvas id="myChart" class="pt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-md-6 mb-5">
                    <div class="card bg-white">
                        <div class="card-header bg-warning"> Absensi Terlambat </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="berandaTerlambat">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Waktu Absen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($muridTerlambat as $m)
                                        <tr>
                                            <td class="table-warning">{{ $no++ }}</td>
                                            <td class="table-warning">{{ $m->murid->nis }}</td>
                                            <td class="table-warning"><a
                                                    href="/detail-murid/{{ $m->murid->id }}">{{ $m->murid->nama }}</a>
                                            </td>
                                            <td class="table-warning"><a
                                                    href="/kelas/daftar/{{ $m->murid->kelas_id }}">{{ $m->murid->kelas->kelas }}</a>
                                            </td>
                                            <td class="table-warning">{{ date_format($m->created_at, 'H:i:s') }} WIB</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card bg-white">
                        <div class="card-header bg-danger"> Tidak Masuk </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table text-nowrap table-hover" id="berandaIjin">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($muridAlpa as $m)
                                        @if ($m->status === 0)
                                            <tr>
                                                <td class="table-danger">{{ $no++ }}</td>
                                                <td class="table-danger">{{ $m->murid->nis }}</td>
                                                <td class="table-danger"><a
                                                        href="/detail-murid/{{ $m->murid->id }}">{{ $m->murid->nama }}</a>
                                                </td>
                                                <td class="table-danger"><a
                                                        href="/kelas/daftar/{{ $m->murid->kelas_id }}">{{ $m->murid->kelas->kelas }}</a>
                                                </td>
                                                <td class="table-danger">Tidak Masuk</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="table-secondary">{{ $no++ }}</td>
                                                <td class="table-secondary">{{ $m->murid->nis }}</td>
                                                <td class="table-secondary"><a
                                                        href="/detail-murid/{{ $m->murid->id }}">{{ $m->murid->nama }}</a>
                                                </td>
                                                <td class="table-secondary"><a
                                                        href="/kelas/daftar/{{ $m->murid->kelas_id }}">{{ $m->murid->kelas->kelas }}</a>
                                                </td>
                                                <td class="table-secondary">Ijin</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <!-- /.row (main row) -->
        </div>
    </section>
    <!-- /.content -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        const absenMasuk = {{ $absenMasuk }};
        const absenTerlambat = {{ $absenTerlambat }};
        const absenAlpa = {{ $absenAlpa }};

        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ["Masuk", "Telat", "Tidak Masuk / Ijin"],
                datasets: [{
                    label: "Jumlah",
                    data: [absenMasuk, absenTerlambat, absenAlpa],
                    backgroundColor: ['rgb(75, 192, 192)', 'rgb(255, 205, 86)', 'rgb(255, 99, 132)'],
                }],
            },
            options: {
                responsive: false,
                tooltips: {
                    yAlign: 'bottom',
                    xAlign: 'center',
                    xPadding: 25,
                    yPadding: 15,
                    xPadding: 45,
                    _bodyAlign: 'center',
                    _footerAlign: 'center',
                }
            },
        });
    </script>
@endsection
