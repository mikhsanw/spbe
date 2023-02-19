@extends('layouts.frontend.main')
@section('title', $data->nama)
@section('img', asset($aplikasi->file_logo->url_stream))
@section('content')
		<!-- <section id="page-title">
			<div class="container clearfix">
				<h1>{{$data->nama}}</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Halaman</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{$data->nama}}</li>
				</ol>
			</div>
		</section> -->
		
		<section id="content">
			<div class="content-wrap">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-12 col-md-10">
							<div class="card shadow">
								<div class="card-body m-md-5 m-xs-2">
									<h2 style="text-align:center ;">{{$data->nama}}</h2>
									<div class="line m-md-5 m-xs-2"></div>
									@if($data->status==0)
										<p>{!!$data->isi!!}</p>
									@elseif($data->status==3)
									<div class="list-group">
										@foreach($doc as $dokumen)	
										@if($dokumen->getExtensionAttribute()==="pdf")
										<a href="#" class="list-group-item list-group-item-action dokumen" data-bs-toggle="modal" data-bs-target="#dokumen-modal-lg" data-bs-title="{{$dokumen->name}}" data-bs-whatever="{{$dokumen->url_stream}}">
											{{$dokumen->name}}
											<i class="i-plain icon-download float-end dokumen" data-bs-toggle="modal" data-bs-target="#dokumen-modal-lg" data-bs-title="{{$dokumen->name}}" data-bs-whatever="{{$dokumen->url_stream}}"></i>
										</a>
										@else
										<a href="{{$dokumen->url_download}}" download="{{$dokumen->name.'.'.$dokumen->getExtensionAttribute()}}" class="list-group-item list-group-item-action">
											{{$dokumen->name}}
											<i class="i-plain icon-download float-end"></i>
										</a>
										@endif
										@endforeach
									</div>
									@elseif($data->status==5)
										@if($data->file)
											@if($data->file->extension=='pdf')
											<object data="{{$data->file->url_stream.'?t='.time() ?? '#'}}" type="application/pdf" style="background: transparent url('backend/img/loading.gif') no-repeat center; width: 100%;height: 700px">
												<p>
													File PDF tidak dapat ditampilkan, silahkan download file
													<a download="{{$data->nama}}" href="{{$data->file->url_stream ?? '#'}}" target="_blank"><span class="fa fa-download"> di sini</span></a>
												</p>
											</object>
											@elseif($data->file->extension=='jpg' || $data->file->extension=='png')
											<p>
												<img src="{{$data->file->url_stream.'?t='.time() ?? '#'}}"/>
											</p>
											@else
											<p>
												File tidak dapat ditampilkan, silahkan download file
												<a download="{{$data->nama}}" href="{{$data->file->url_download.'?t='.time() ?? '#'}}" target="_blank"><span class="fa fa-download"> di sini</span></a>
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
									
									<div class="line"></div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- #content end -->
		

		<div class="modal fade" id="dokumen-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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