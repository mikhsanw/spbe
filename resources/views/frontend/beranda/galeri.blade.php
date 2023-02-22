@extends('layouts.frontend.main')
@section('title', 'Galeri '.$jenis)
@section('img', asset($aplikasi->file_logo->url_stream))
@section('content')
<section class="page-title title-bg22">
    <div class="d-table">
        <div class="d-table-cell">
            <h2>Galeri {{$jenis}}</h2>
            <ul>
                <li>
                    <a href="{{url('/')}}">Beranda</a>
                </li>
                <li>Galeri</li>
                <li>{{$jenis}}</li>
            </ul>
        </div>
    </div>
    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</section>

<div class="contact-form-section pt-5 pb-70 lightbox-gallery">
    <div class="container">
        <div class="intro">
            <!-- <h2 class="text-center">Galeri {{$jenis}}</h2> -->
        </div>
        <div class="row photos">
			@if($jenis==='foto')
			@foreach($data as $foto)
            <div class="col-sm-6 col-md-4 col-lg-3 item">
				<a href="{{$foto->file->url_stream}}" data-caption="{{$foto->nama}}" data-toggle="lightbox" data-gallery="example-gallery">
					<img class="img-fluid" src="{{$foto->file->url_stream}}"></a>
			</div>
			@endforeach
			@elseif($jenis==='video')
			@foreach($data as $video)
			<div class="col-sm-6 col-md-4 col-lg-3 item">
				<a href="//www.youtube.com/embed/{{$video->link}}" data-toggle="lightbox" data-gallery="youtubevideos">
					<img src="https://i1.ytimg.com/vi/{{$video->link}}/mqdefault.jpg" class="img-fluid">
				</a>
			</div>
			@endforeach
			@endif
         </div>
    </div>
</div>
<div style="text-align: center;">{{$data->links()}} </div>
@endsection
@push('js')
<script src="{{url('/frontend/assets/js/bs5-lightbox/index.bundle.min.js')}}"></script>
@endpush
