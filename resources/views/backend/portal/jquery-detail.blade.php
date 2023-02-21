$(document).on("click",".tambah-halaman",function() {
    ojisatrianiLoadingFadeIn();
    $.loadmodal({
        url: "{{ url($url_admin.'/'.$kode.'/create_child/'.$id) }}",
        id: 'responsive',
        dlgClass: 'fade',
        bgClass: 'primary',
        title: 'Simpan',
        width: 'whatever',
        modal: {
            keyboard: true,
            },
        ajax: {
            dataType: 'html',
            method: 'GET',
            success: function(data, status, xhr){
                $('.submit-surat').hide();
                ojisatrianiLoadingFadeOut();
            },
        },
    });
});

$(document).on("click",".create",function() {
    ojisatrianiLoadingFadeIn();
    var id = $(this).attr("{{$kode.'-id'}}");
    $.loadmodal({
        url: "{{ url($url_admin.'/'.$kode) }}/save/"+ id,
    id: 'responsive',
        dlgClass: 'fade',
        bgClass: 'warning',
        title: 'Ubah',
        width: 'whatever',
        modal: {
            keyboard: true,
            // any other options from the regular $().modal call (see Bootstrap docs)
            },
        ajax: {
            dataType: 'html',
            method: 'GET',
            success: function(data, status, xhr){
                $('.modal-footer').remove();
                ojisatrianiLoadingFadeOut();
            },
        },
    });
});

$(document).on("click",".link",function() {
    ojisatrianiLoadingFadeIn();
    var id = $(this).attr("{{$kode.'-id'}}");
    $.loadmodal({
        url: "{{ url($url_admin.'/'.$kode) }}/link/"+ id,
    id: 'responsive',
        dlgClass: 'fade',
        bgClass: 'warning',
        title: 'Ubah',
        width: 'whatever',
        modal: {
            keyboard: true,
            // any other options from the regular $().modal call (see Bootstrap docs)
            },
        ajax: {
            dataType: 'html',
            method: 'GET',
            success: function(data, status, xhr){
                $('.modal-footer').remove();
                ojisatrianiLoadingFadeOut();
            },
        },
    });
});

$(document).on("click",".upload",function() {
    ojisatrianiLoadingFadeIn();
    var id = $(this).attr("{{$kode.'-id'}}");
    $.loadmodal({
        url: "{{ url($url_admin.'/'.$kode) }}/upload/"+ id,
    id: 'responsive',
        dlgClass: 'fade',
        bgClass: 'warning',
        title: 'Ubah',
        width: 'whatever',
        modal: {
            keyboard: true,
            // any other options from the regular $().modal call (see Bootstrap docs)
            },
        ajax: {
            dataType: 'html',
            method: 'GET',
            success: function(data, status, xhr){
                $('.modal-footer').remove();
                ojisatrianiLoadingFadeOut();
            },
        },
    });
});