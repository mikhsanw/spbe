{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.update', $data->id], 'class' => 'form account-form', 'method' => 'PUT', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('nama', 'Masukkan Nama', array('class' => 'control-label')) !!}
            {!! Form::text('nama', $data->nama, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('status', 'Pilih Status', array('class' => 'control-label')) !!}
            {!! Form::select('status', config('master.status_portal'), $data->status, array('id' => 'status', 'class' => 'form-control status', 'placeholder'=>'Pilih')) !!}
        </p>
        <p>
            {!! Form::label('file_logo', 'Upload Logo', array('class' => 'control-label')) !!}
            <small class="text-danger"> * Ekstensi. Jpg / Png,  (Dimensi 163 x 100 pixel) </small><br />
            <input type="file" name="file_logo" id="file_logo" class="form-control">
        </p>
        <p class="input-link"><small class="text-danger"> *</small><label class="control-label">Masukkan Link</label><input type="text" name="link" id="link" value="{{$data->link}}" class="form-control"></p>
        <p class="input-file"><label class="control-label">Pilih File / Gambar</label><small class="text-danger"> * Ekstensi. Pdf / Zip / Rar / Jpg / Png </small><input type="file" name="file_pendukung" id="file_pendukung" class="form-control"></p>
        <p class="input-konten"><small class="text-danger"> *</small><label class="control-label">Tambahkan informasi disini</label><textarea name="isi" id="isi" value="{{$data->isi}}" class="form-control js-summernote"></textarea></p>
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
    <div class="col-4">
    @if( $data->file_logo)
            <img src="{{$data->file_logo->url_stream.'?t='.time() ?? '#'}}" style="background: transparent url({{asset('backend/img/loading.gif')}}) no-repeat center; width: 100%"/>
    @endif
    </div>
    <div class="col-8">
    @if( $data->file_pendukung)
        @if($data->file_pendukung->extension=='pdf')
        <object data="{{$data->file_pendukung->url_stream.'?t='.time() ?? '#'}}" type="application/pdf" style="background: transparent url({{asset('backend/img/loading.gif')}}) no-repeat center; width: 100%;height: 700px">
            <p>
                File PDF tidak dapat ditampilkan, silahkan download file
                <a download="{{$data->nama}}" href="{{$data->file_pendukung->url_stream ?? '#'}}"><span class="fa fa-download"> di sini</span></a>
            </p>
        </object>
        @elseif($data->file_pendukung->extension=='jpg' || $data->file_pendukung->extension=='png')
        <p>
            <img src="{{$data->file_pendukung->url_stream.'?t='.time() ?? '#'}}"/>
        </p>
        @else
        <p>
            File tidak dapat ditampilkan, silahkan download file
            <a download="{{$data->nama}}" href="{{$data->file_pendukung->url_download.'?t='.time() ?? '#'}}"><span class="fa fa-download"> di sini</span></a>
        </p>
        @endif
    @endif
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
<script src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/'.\Auth::id().'/ajax.js') }}"></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Ubah {{$halaman->nama}}');
    $('.js-summernote').summernote({
        // toolbar: [['para', ['ul', 'ol']]],
        height: 300,
        dialogsInBody: true
    });
    
    if( $('.status').val() == '2'){
        $('.input-link').show();
        $('.input-file').hide();
        $('.input-konten').hide();
    }
    else if( $('.status').val() == '5'){
        $('.input-link').hide();
        $('.input-file').show();
        $('.input-konten').hide();
    }
    else if( $('.status').val() == '0'){
        $('.input-link').hide();
        $('.input-file').hide();
        $('.input-konten').show();
    }else{
        $('.input-link').hide();
        $('.input-file').hide();
        $('.input-konten').hide();
    }

    $('.status').change(function() {
        if( $(this).val() == '2'){
            $('.input-link').show();
            $('.input-file').hide();
            $('.input-konten').hide();
        }
        else if( $(this).val() == '5'){
            $('.input-link').hide();
            $('.input-file').show();
            $('.input-konten').hide();
        }
        else if( $(this).val() == '0'){
            $('.input-link').hide();
            $('.input-file').hide();
            $('.input-konten').show();
        }
    });
</script>
