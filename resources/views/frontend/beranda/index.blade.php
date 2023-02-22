@extends('layouts.frontend.main')
@section('title', 'Beranda')
@section('img', ($aplikasi->file_logo?(asset($aplikasi->file_logo->url_stream)):''))
@section('content')
<div class="banner-section">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="banner-content text-center">
                    <h1 class="text-danger">{{$aplikasi->singkatan}}</h1>
                    <p>{{$aplikasi->nama}}</p>

                </div>
            </div>
        </div>
    </div>
</div>

<section class="job-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-details-text">
                            <div class="job-card mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-1">
                                        <div class="">
                                            <img src="{{asset('frontend/assets/img/spbe.png')}}" width="80px" alt="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-11">
                                        <div class="job-info">
                                            <h3>Apa itu SPBE ?</h3>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details-text">
                                <p style="font-size: small; text-align: justify;">SPBE merupakan singkatan dari Sistem Pemerintahan Berbasis Elektronik, Sistem Pemerintahan Berbasis Elektronik (SPBE) adalah penyelenggaraan pemerintahan yang memanfaatkan teknologi informasi dan komunikasi untuk memberikan layanan kepada Pengguna SPBE. Hal ini seperti yang tertuang pada Peraturan Presiden No. 95 Tahun 2018 tentang Sistem Pemerintahan Berbasis Elektronik. SPBE ditujukan untuk untuk mewujudkan tata kelola pemerintahan yang bersih, efektif, transparan, dan akuntabel serta pelayanan publik yang berkualitas dan terpercaya. Tata kelola dan manajemen sistem pemerintahan berbasis elektronik secara nasional juga diperlukan untuk meningkatkan keterpaduan dan efisiensi sistem pemerintahan berbasis elektronik.

                                    Revolusi teknologi informasi dan komunikasi (TIK) memberikan peluang bagi pemerintah untuk melakukan inovasi pembangunan aparatur negara melalui penerapan Sistem Pemerintahan Berbasis Elektronik (SPBE) atau E-Government, yaitu penyelenggaraan pemerintahan yang memanfaatkan TIK untuk memberikan layanan kepada instansi pemerintah, aparatur sipil negara, pelaku bisnis, masyarakat dan pihak-pihak lainnya. SPBE memberi peluang untuk mendorong dan mewujudkan penyelenggaraan pemerintahan yang terbuka, partisipatif, inovatif, dan akuntabel, meningkatkan kolaborasi antar instansi pemerintah dalam melaksanakan urusan dan tugas pemerintahan untuk mencapai tujuan bersama, meningkatkan kualitas dan jangkauan pelayanan publik kepada masyarakat luas, dan menekan tingkat penyalahgunaan kewenangan dalam bentuk kolusi, korupsi, dan nepotisme melalui penerapan sistem pengawasan dan pengaduan masyarakat berbasis elektronik.
                                    
                                    Pemerintah menyadari pentingnya peran SPBE untuk mendukung semua sektor pembangunan. Upaya untuk mendorong penerapan SPBE telah dilakukan oleh pemerintah dengan menerbitkan peraturan perundang-undangan sektoral yang mengamanatkan perlunya penyelenggaraan sistem informasi atau SPBE. Sejauh ini kementerian, lembaga, dan pemerintah daerah telah melaksanakan SPBE secara sendiri-sendiri sesuai dengan kapasitasnya, dan mencapai tingkat kemajuan SPBE yang sangat bervariasi secara nasional. Untuk membangun sinergi penerapan SPBE yang berkekuatan hukum antara kementerian, lembaga, dan pemerintah daerah, diperlukan Rencana Induk SPBE Nasional yang digunakan sebagai pedoman bagi Instansi Pusat dan Pemerintah Daerah untuk mencapai SPBE yang terpadu. Rencana Induk SPBE Nasional disusun dengan memperhatikan arah kebijakan, strategi, dan inisiatif pada bidang tata kelola SPBE, layanan SPBE, TIK, dan SDM untuk mencapai tujuan strategis SPBE tahun 2018 - 2025 dan tujuan pembangunan aparatur negara sebagaimana ditetapkan dalam RPJP Nasional 2005 - 2025 dan Grand Design Reformasi Birokrasi 2010 - 2025.</p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="categories-section pt-5 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Tentang SPBE Kabupaten Bengkalis</h2>
        </div>
        <div class="row">
            @foreach($tentang->children as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{$item->status==2?$item->link:url('/company/page/'.$item->id.'/'.Help::generateSeoURL($item->nama))}}">
                    <div class="category-card">
                        @if($item->file)
                        <img src="{{$item->file_logo->url_stream}}" width="60px" alt="$item->nama">
                        @else
                        <i class='flaticon-website'></i>
                        @endif
                        <h3>{{$item->nama}}</h3>
                        <!-- <p>301 open position</p> -->
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
