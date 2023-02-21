{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.store'], 'class' => 'form account-form', 'method' => 'post', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('nama', 'Masukkan Nama', array('class' => 'control-label')) !!}
            {!! Form::text('nama', null, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('status', 'Pilih Status', array('class' => 'control-label')) !!}
            {!! Form::select('status', config('master.status_portal'), null, array('id' => 'status', 'class' => 'form-control status', 'placeholder'=>'Pilih')) !!}
        </p>
        <p>
            {!! Form::label('file_logo', 'Upload Logo', array('class' => 'control-label')) !!}
            <small class="text-danger"> * Ekstensi. Jpg / Png,  (Dimensi 163 x 100 pixel) </small><br />
            <input type="file" name="file_logo" id="file_logo" class="form-control">
        </p>
        <p class="input-link"><small class="text-danger"> *</small><label class="control-label">Masukkan Link</label><input type="text" name="link" id="link" class="form-control"></p>
        <p class="input-file"><label class="control-label">Pilih File / Gambar</label><small class="text-danger"> * Ekstensi. Pdf / Zip / Rar / Jpg / Png </small><input type="file" name="file_pendukung" id="file_pendukung" class="form-control"></p>
        <p class="input-konten"><small class="text-danger"> *</small><label class="control-label">Tambahkan informasi disini</label><textarea name="isi" id="isi" class="form-control js-summernote"></textarea></p>
    </div>
	{!! Form::hidden('table-list', 'datatable', array('id' => 'table-list')) !!}
    {!! Form::hidden('parent_id', $id, array('id' => 'parent_id')) !!}
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
<script src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/'.\Auth::id().'/ajax.js') }}"></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Tambah {{$halaman->nama}}');
    $('.js-summernote').summernote({
        // toolbar: [['para', ['ul', 'ol']]],
        height: 300,
        dialogsInBody: true
    });
    
    $('.input-link').hide();
    $('.input-file').hide();
    $('.input-konten').hide();
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