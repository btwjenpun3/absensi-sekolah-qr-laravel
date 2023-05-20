@extends('layouts/main')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/beranda">Beranda / Pengaturan</a></li> 
@endsection 

@section('content')
<section class="content">
    <div class="container-fluid">        
        <div class="row">
            <div class="col-md-6">
                 <div class="card">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Umum</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">User</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                            <div class="card-body"> 
                                <p>Ubah pengaturan untuk aplikasi ini sesuai dengan kebutuhan sekolah anda.</p>
                                <hr>    
                                <div class="container">                              
                                    <div class="row">
                                        <div class="col-md-12 pb-4">                                 
                                            <div class="form-group">
                                                <label for="namaSekolah">License Key</label>
                                                <input class="form-control" type="text" name="namaSekolah" placeholder="Masukkan 20 Digit License Key Anda">
                                            </div>                                            
                                        </div>
                                        <div class="col-md-6">                                 
                                            <div class="form-group">
                                                <label for="namaSekolah">Nama Sekolah</label>
                                                <input class="form-control" type="text" name="namaSekolah" placeholder="Mis. SMAN 1 Ungaran">
                                            </div>                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaSekolah">Jam Masuk</label>
                                                <input class="form-control" type="time" name="jamMasuk">
                                            </div>
                                        </div>
                                        <div class="col-md-6">                                            
                                            <div class="input-group-prepend">
                                                <label>Logo Sekolah </label>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="pt-5">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
                    </div>
                </div>                            
            </div>                        
        </div>      
    </div>
</section>
@endsection