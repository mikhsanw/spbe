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