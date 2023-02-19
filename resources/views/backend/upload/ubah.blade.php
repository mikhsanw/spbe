{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.update', $data->id], 'class' => 'form account-form', 'method' => 'PUT', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">
        <p>
            {!! Form::label('name', 'Masukkan Nama', array('class' => 'control-label')) !!}
            {!! Form::text('name', $data->name, array('id' => 'name', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            {!! Form::label('file_pendukung', 'Pilih File', array('class' => 'control-label')) !!}
            <small class="fa fa-info-circle text-danger"> Ekstensi. Pdf / Zip/ Rar</small><br>
            {!! Form::file('file_pendukung', null, array('id' => 'file_pendukung', 'class' => 'form-control')) !!}
        </p>
    </div>
    <div class="col-md-12">
        @if($data->extension=='pdf')
        <object data="{{$data->url_stream.'?t='.time() ?? '#'}}" type="application/pdf" style="background: transparent url({{asset('backend/img/loading.gif')}}) no-repeat center; width: 100%;height: 700px">
            <p>
                File PDF tidak dapat ditampilkan, silahkan download file
                <a download="{{$data->nama}}" href="{{$data->url_stream ?? '#'}}"><span class="fa fa-download"> di sini</span></a>
            </p>
        </object>
        @else
        <p>
            File tidak dapat ditampilkan, silahkan download file
            <a download="{{$data->nama}}" href="{{$data->url_download.'?t='.time() ?? '#'}}"><span class="fa fa-download"> di sini</span></a>
        </p>
        @endif
    </div>
	{!! Form::hidden('table-list', 'datatable', array('id' => 'table-list')) !!}
</div>
<div class="row">
	<div class="col-md-12">
        <span class="pesan"></span>
        <div id="output"></div>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div id="statustxt">0%</div>
            </div>
        </div>
	</div>
</div>
{!! Form::close() !!}
<style>
    .select2-container {
        z-index: 9999 !important;
    }
</style>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/js/ajax_progress.js') }}"></script>
<!-- <script src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/'.\Auth::id().'/ajax.js') }}"></script> -->
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Ubah {{$halaman->nama}}');
</script>
