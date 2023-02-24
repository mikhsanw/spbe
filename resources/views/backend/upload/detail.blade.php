@extends('layouts.backend.index')
@push('title',ucwords(strtolower($halaman->nama)))
@push('header',ucwords(strtolower($halaman->nama)))
@push('tombol')
<a class="waves-effect waves-light btn bg-gradient-danger text-white py-2 px-3 tambah-halaman" href="{{ url()->previous() }}">
	Kembali
</a>
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
					<th class="text-center">File</th>
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
@endpush
