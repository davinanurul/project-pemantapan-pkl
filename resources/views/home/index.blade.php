@extends('templates/header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title"><i class="fas fa-info-circle"></i> Tentang Aplikasi</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus text-white"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times text-white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Halo selamat datang di aplikasi Peduli Diri. Catatan perjalanan yang diisikan sekurangnya meliputi:</p>
                        <ul>
                            <li>Tanggal perjalanan</li>
                            <li>Waktu</li>
                            <li>Lokasi yang dikunjungi</li>
                            <li>Suhu tubuh saat memasuki lokasi</li>
                        </ul>
                        <p>Saat pertama kali digunakan, pengguna harus mengisi NIK dan nama yang akan disimpan dalam file config.txt. Selanjutnya, pengguna bisa masuk untuk mengisi catatan perjalanan. Selain mengisi, pengguna juga dapat:</p>
                        <ul>
                            <li>Melakukan pencarian berdasarkan tanggal, waktu, atau lokasi.</li>
                            <li>Mengurutkan data berdasarkan tanggal perjalanan dan suhu tubuh, baik secara ascending maupun descending.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Card (right) -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h3 class="card-title"><i class="fas fa-bolt"></i> Quick Actions</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus text-white"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times text-white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="../perjalanan" class="btn btn-primary btn-block mb-2">
                                    <i class="fas fa-calendar-plus"></i> Tambah Catatan Perjalanan
                                </a>
                                <a href="../penduduk" class="btn btn-success btn-block">
                                    <i class="fas fa-users"></i> Kelola Data Penduduk
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Kelola data Anda dengan efektif.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .card-title {
        display: flex;
        align-items: center;
    }
    .card-title i {
        margin-right: 10px;
    }
    .card-body img {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
@endsection
