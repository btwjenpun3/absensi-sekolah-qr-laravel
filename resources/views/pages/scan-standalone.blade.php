<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="/css/clock.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nova+Square&family=Wix+Madefor+Display:wght@500&display=swap"
        rel="stylesheet">

    <title>MyAbsen | Standalone-Scan</title>
</head>

<body class="mh-100 justify-content-around">
    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 bg-white py-4"
                    style="background-image: url('/img/bg-scan-banner.jpg'); background-size: cover; background-repeat: no-repeat;">
                    <img src="/img/logo-sekolah.png" style="max-width:10%">
                </div>
                <div class="col-md-12 bg-white my-3 border">
                    <marquee>Selamat datang di SMAN 1 Ungaran. Ini adalah aplikasi untuk Absensi para siswa.</marquee>
                </div>
            </div>
            <div id="messageContainer"></div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card" style="background-color: rgb(245, 254, 255);">
                        <div class="card-body col-md-12">
                            <div class="card-header bg-success text-light">
                                <h3 class="text-center">Aplikasi Absensi QR</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 text-center py-3">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <video id="previewKamera" class="w-100 rounded-5 border"></video>
                                    </div>
                                </div>
                                <div class="col-lg-4 py-3">
                                    <div class="card ">
                                        <div class="card-header text-light" style="background-color: rgb(5, 109, 109)">
                                            Tata
                                            cara : </div>
                                        <div class="card-body">
                                            <p>1. Siapkan kartu Absen kamu.</p>
                                            <p>2. Arahkan QR ke kamera di samping.</p>
                                            <p>3. Tunggu hingga bunyi "Bip".</p>
                                            <p>4. Bila notifikasi muncul warna hijau, artinya absensi berhasil, jika
                                                merah artinya gagal.</p>
                                            <p>5. Selesai.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <div class="col-md-12 text-center text-muted pt-3">
                                        <select id="pilihKamera"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="container-clock">
                                        <div class="clock">
                                            <div id="Date">Thursday, 6 August 2020</div>
                                            <ul>
                                                <li id="hours">10</li>
                                                <li id="point">:</li>
                                                <li id="min">13</li>
                                                <li id="point">:</li>
                                                <li id="sec">03</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mt-3">
                                <div class="card-header bg-success text-light">Profile</div>
                                <div class="card-body">
                                    <iframe class="w-100" style="height:200px;"
                                        src="https://www.youtube.com/embed/jL9okxWzvbA?playlist=jL9okxWzvbA&autoplay=1&loop=1"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; loop;"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="row text-center">
                <div class="text-center p-3 mt-4" style="background-color: rgba(77, 85, 81, 0.089);">
                    © 2023 Copyright:
                    Putra-IT
                </div>
            </footer>
        </div>

    </section>
    <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Buka Kamera untuk Scan QR -->
    <script type="text/javascript" src="/js/qrcamera.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/js/clock.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
