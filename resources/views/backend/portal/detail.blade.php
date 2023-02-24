@extends('layouts.backend.index')
@push('title',ucwords(strtolower($halaman->nama)))
@push('header')
	<a href="{{url('halaman')}}">Halaman</a> > 
	@if($data->parentRecursive)
		{!!$data->createHeaderTree($data->parentRecursive)!!}
		{{$data->nama}}
	@else
		{{$data->nama}}
	@endif
@endpush
@push('tombol')
<button class="waves-effect waves-light btn bg-gradient-primary text-white py-2 px-3 tambah-halaman">
	Tambah
</button>
@endpush
@section('content')
<div class="panel-container show">
	<div class="panel-content">
		<table id="datatable" class="table table-striped table-bordered display" style="width:100%">
			<thead class="bg-primary">
				<tr>
					<th width="5%">No</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Kelola</th>
					<th width="50px" class="text-center" tabindex="0" rowspan="1" colspan="1">Aksi</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
@endsection
@push('js')
@include('layouts.backend.js.datatable-js')
<script type="text/javascript" src="{{ URL::asset(config('master.aplikasi.author').'/js/'.$halaman->link.'/'.$halaman->kode.'/jquery-crud.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/'.$id.'/datatables_detail.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/'.$id.'/jquery-detail.js') }}"></script>
<script src="{{ asset('backend/assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
<script src="{{ asset('backend/fromplugin/summernote/summernote.js') }}" async=""></script>
@endpush
@push('css')
<link rel="stylesheet" media="screen, print" href="{{ asset('backend/fromplugin/summernote/summernote.css') }}">
@endpush