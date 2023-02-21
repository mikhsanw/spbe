<div id="halaman">
    {!! Form::open(array('class' => 'form account-form', 'method' => 'post')) !!}
    <div class="row">
        <div class="col-md-12">
            <p>
                {!! Form::label('isi', 'Tambahkan informasi disini', array('class' => 'control-label')) !!}
                {!! Form::textarea('isi', $data->isi, array('id' => 'isi', 'class' => 'form-control js-summernote')) !!}
            </p>
        </div>
        {!! Form::hidden('table-list', 'datatable', array('id' => 'table-list')) !!}
        {!! Form::hidden('id', $data->id, array('id' => 'id')) !!}
        <div class="custom-modal-footer">
            <button class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i> Tutup</button>
            &nbsp;&nbsp;<button type="submit" class="btn btn-sm btn-primary btn-profil"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<div class="row">
	<div class="col-md-12">
        <span class="pesan"></span>
        <div id="output"></div>
        <div class="progress">
            <div class="progress-bar-halaman" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div id="statustxt">0%</div>
            </div>
        </div>
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
</script>
