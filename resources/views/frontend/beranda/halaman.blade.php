@extends('layouts.frontend.main')
@section('title', $data->nama)
@section('img', asset($aplikasi->file_logo->url_stream))
@section('content')
<section class="page-title title-bg22">
    <div class="d-table">
        <div class="d-table-cell">
            <h2>{{$data->nama}}</h2>
            <ul>
                <li>
                    <a href="{{url('/')}}">Beranda</a>
                </li>
                @if($data->parentRecursive)
                {!!$data->createMenuTree($data->parentRecursive)!!}
                <li>{{$data->nama}}</li>
                @else
                <li>{{$data->nama}}</li>

                @endif
            </ul>
        </div>
    </div>
    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</section>

@if($data->status==4)
<section class="categories-section faq-section pt-5 pb-70">
    <div class="container">
        <div class="row">
            @foreach($data->children as $item)
            @if($item->status=='1')
            <div class="col-lg-12">
                <div class="accordions">
                    <div class="accordion-item">
                        <div class="accordion-title" data-tab="item1">
                            <h2>{{$item->nama}}<i class="bx bx-chevrons-right down-arrow"></i></h2>
                        </div>
                        <div class="accordion-content" id="item1" style="display: none;">
                            <div class="row">
                                @foreach($item->children as $val)
                                <div class="col-lg-3 col-sm-6">
                                    <a href="{{$val->status==2?$val->link:url('/company/page/'.$val->id.'/'.Help::generateSeoURL($val->nama))}}">
                                        <div class="category-item">
                                            <i class="flaticon-wrench-and-screwdriver-in-cross"></i>
                                            <h3>{{$val->nama}}</h3>
                                            <p>{{$item->nama}}</p>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
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
            @endif
            @endforeach
        </div>
    </div>
</section>

@else

<section class="contact-form-section pt-5 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10">
                @if($data->status==0)
                <p>{!!$data->isi!!}</p>
                @elseif($data->status==3)
                <div class="list-group">
                    @foreach($doc as $dokumen)
                    @if($dokumen->getExtensionAttribute()==="pdf")
                    <a href="#" class="list-group-item list-group-item-action dokumen" data-bs-toggle="modal"
                        data-bs-target="#dokumen-modal-lg" data-bs-title="{{$dokumen->name}}"
                        data-bs-whatever="{{$dokumen->url_stream}}">
                        {{$dokumen->name}}
                        <i class="i-plain icon-download float-end dokumen" data-bs-toggle="modal"
                            data-bs-target="#dokumen-modal-lg" data-bs-title="{{$dokumen->name}}"
                            data-bs-whatever="{{$dokumen->url_stream}}"></i>
                    </a>
                    @else
                    <a href="{{$dokumen->url_download}}"
                        download="{{$dokumen->name.'.'.$dokumen->getExtensionAttribute()}}"
                        class="list-group-item list-group-item-action">
                        {{$dokumen->name}}
                        <i class="i-plain icon-download float-end"></i>
                    </a>
                    @endif
                    @endforeach
                </div>
                @elseif($data->status==5)
                @if($data->file)
                @if($data->file->extension=='pdf')
                <object data="{{$data->file->url_stream.'?t='.time() ?? '#'}}" type="application/pdf"
                    style="background: transparent url('backend/img/loading.gif') no-repeat center; width: 100%;height: 700px">
                    <p>
                        File PDF tidak dapat ditampilkan, silahkan download file
                        <a download="{{$data->nama}}" href="{{$data->file->url_stream ?? '#'}}" target="_blank">
                            <span class="fa fa-download"> di sini</span>
                        </a>
                    </p>
                </object>
                @elseif($data->file->extension=='jpg' || $data->file->extension=='png')
                <p>
                    <img src="{{$data->file->url_stream.'?t='.time() ?? '#'}}" />
                </p>
                @else
                <p>
                    File tidak dapat ditampilkan, silahkan download file
                    <a download="{{$data->nama}}" href="{{$data->file->url_download.'?t='.time() ?? '#'}}" target="_blank">
                        <span class="fa fa-download"> di sini</span>
                    </a>
                </p>
                @endif
                @endif
                @elseif($data->status==4)
                <div class="row">
                    @foreach($data->children as $item)
                    @if($item->children->count()>0)
                    portal kategori
                    @else
                    <div class="col-md-3">
                        {{$item->nama}}
                    </div>
                    @endif
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section><!-- #content end -->
@endif

<div class="modal fade" id="dokumen-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Modal</h4>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <iframe width="100%" height="600px"></iframe>
            </div>
        </div>
    </div>
</div>

<script>
    var modalShow = document.getElementById('dokumen-modal-lg')
    modalShow.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-bs-whatever')
        var title = button.getAttribute('data-bs-title')
        var modalTitle = modalShow.querySelector('.modal-title')
        modalTitle.textContent = 'Dokumen ' + title
        var makeIframe = modalShow.querySelector(".modal-body iframe");
        makeIframe.setAttribute("src", recipient);
    })

</script>
@endsection
@push('css')
<style>
    .line {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .category-card img {
        font-size: 50px;
        color: #fd1616;
        margin-bottom: 25px;
        display: inline-block;
        line-height: 1;
    }
</style>
@endpush