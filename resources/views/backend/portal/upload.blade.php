<div id="upload">
    {!! Form::open(array('class' => 'form account-form', 'method' => 'post', 'files' => 'true')) !!}
    <div class="row">
        <div class="col-md-12">
        <p>
            {!! Form::label('file', 'Pilih File / Gambar', array('class' => 'control-label')) !!}
            <small class="fa fa-info-circle text-danger"> Ekstensi. Pdf / Zip / Rar / Jpg / Png</small><br>
            {!! Form::file('file', null, array('id' => 'file', 'class' => 'form-control')) !!}
        </p>
        </div>
        {!! Form::hidden('table-list', 'datatable', array('id' => 'table-list')) !!}
        {!! Form::hidden('id', $data->id, array('id' => 'id')) !!}
        <div class="custom-modal-footer">
           <button class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Tutup</button>
            &nbsp;&nbsp;<button type="submit" class="btn btn-sm btn-primary float-right btn-upload"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<div class="row">
	<div class="col-md-12">
        <span class="pesan"></span>
        <div id="output"></div>
        <div class="progress">
            <div class="progress-bar-upload" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div id="statustxt">0%</div>
            </div>
        </div>
	</div>
    <div class="col-md-12">
    @if($data->file)
        @if($data->file->extension=='pdf')
        <object data="{{$data->file->url_stream.'?t='.time() ?? '#'}}" type="application/pdf" style="background: transparent url({{asset('backend/img/loading.gif')}}) no-repeat center; width: 100%;height: 700px">
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
    </div>
</div>
<style>
    .select2-container {
        z-index: 9999 !important;
    }
    .modal-lg{
        max-width: 45% !important;
    }
    .custom-modal-footer {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
        padding: 1rem;
        border-top: 0 solid #dee2e6;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
    }
    .float-right {
        float: right !important;
    }
</style>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/js/ajax_progress.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/'.\Auth::id().'/ajax.js') }}"></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Tambah {{$halaman->nama}}');
</script>
