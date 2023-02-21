$(document).ready(function () {
	$('.select2').select2(
		{
			placeholder: "- Pilih -",
			allowClear: true
		}
	);

	var controls = {
        leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
        rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
    }
})

$(function(){
	$('#halaman form').on('submit', function (e){
		if (!e.isDefaultPrevented()){
			$.ajax({
				url : "{{ url($kode.'/store_halaman') }}",
				type : "POST",
				data: new FormData($(this)[0]),
				processData: false,
				contentType: false,
				cache: false,
				xhr:function () {
				let xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function (evt) {
					if (evt.lengthComputable) {
						let percentComplete = evt.loaded / evt.total;
						percentComplete = parseInt(percentComplete * 100);
						$('.progress-bar-halaman').css('width', percentComplete + '%').html(`Menyimpan Data ${percentComplete}%`);
						if (percentComplete >=99) {
							$('.progress-bar-halaman').css('width', percentComplete + '%').html("Selesai " + percentComplete + '%');
						}
					}
				}, false);
				return xhr;
			},
			beforeSend: function () {
				$('.btn-halaman').prop('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Menyimpan');
				$('.is-invalid').toggleClass('is-invalid');
				$('.invalid-feedback').remove();
				$('.progress').show().find('.progress-bar-halaman').css('width', '0%').html("Mengirim Data 0%");
			},
				success: function (res) {
					if (res.status === true) {
						$('#datatable').DataTable().ajax.reload();
						Swal.fire({
							title: 'Sukses!',
							text: res.pesan,
							type: 'success',
							timer: 1500
						}).then((result) => {
							// if (result.dismiss === Swal.DismissReason.timer) {
							//     $('.modal').modal('hide');
							// }
						});
						$('.modal').modal('hide');
					} else {
						$.each(res.pesan, function (index, value) {
							$('#' + index).toggleClass('is-invalid').after('<span class="invalid-feedback" role="alert">' + value + '</span>');
						});
						$('.btn-halaman').prop('disabled', false).html('<i class="fa fa-save"></i> Simpan')
						$('.progress').hide();
					}
				},
				error : function(data){
					
				}
			});
			return false;
		}
	});
});

$(function(){
	$('#link form').on('submit', function (e){
		if (!e.isDefaultPrevented()){
			$.ajax({
				url : "{{ url($kode.'/store_link') }}",
				type : "POST",
				data: new FormData($(this)[0]),
				processData: false,
				contentType: false,
				cache: false,
				xhr:function () {
				let xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function (evt) {
					if (evt.lengthComputable) {
						let percentComplete = evt.loaded / evt.total;
						percentComplete = parseInt(percentComplete * 100);
						$('.progress-bar-link').css('width', percentComplete + '%').html(`Menyimpan Data ${percentComplete}%`);
						if (percentComplete >=99) {
							$('.progress-bar-link').css('width', percentComplete + '%').html("Selesai " + percentComplete + '%');
						}
					}
				}, false);
				return xhr;
			},
			beforeSend: function () {
				$('.btn-link').prop('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Menyimpan');
				$('.is-invalid').toggleClass('is-invalid');
				$('.invalid-feedback').remove();
				$('.progress').show().find('.progress-bar-link').css('width', '0%').html("Mengirim Data 0%");
			},
				success: function (res) {
					if (res.status === true) {
						$('#datatable').DataTable().ajax.reload();
						Swal.fire({
							title: 'Sukses!',
							text: res.pesan,
							type: 'success',
							timer: 1500
						}).then((result) => {
							// if (result.dismiss === Swal.DismissReason.timer) {
							//     $('.modal').modal('hide');
							// }
						});
						$('.modal').modal('hide');
					} else {
						$.each(res.pesan, function (index, value) {
							$('#' + index).toggleClass('is-invalid').after('<span class="invalid-feedback" role="alert">' + value + '</span>');
						});
						$('.btn-link').prop('disabled', false).html('<i class="fa fa-save"></i> Simpan')
						$('.progress').hide();
					}
				},
				error : function(data){
					
				}
			});
			return false;
		}
	});
});

$(function(){
	$('#upload form').on('submit', function (e){
		if (!e.isDefaultPrevented()){
			$.ajax({
				url : "{{ url($kode.'/store_upload') }}",
				type : "POST",
				data: new FormData($(this)[0]),
				processData: false,
				contentType: false,
				cache: false,
				xhr:function () {
				let xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function (evt) {
					if (evt.lengthComputable) {
						let percentComplete = evt.loaded / evt.total;
						percentComplete = parseInt(percentComplete * 100);
						$('.progress-bar-upload').css('width', percentComplete + '%').html(`Menyimpan Data ${percentComplete}%`);
						if (percentComplete >=99) {
							$('.progress-bar-upload').css('width', percentComplete + '%').html("Selesai " + percentComplete + '%');
						}
					}
				}, false);
				return xhr;
				},
				beforeSend: function () {
					$('.btn-upload').prop('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Menyimpan');
					$('.is-invalid').toggleClass('is-invalid');
					$('.invalid-feedback').remove();
					$('.progress').show().find('.progress-bar-upload').css('width', '0%').html("Mengirim Data 0%");
				},
				success: function (res) {
					if (res.status === true) {
						$('#datatable').DataTable().ajax.reload();
						Swal.fire({
							title: 'Sukses!',
							text: res.pesan,
							type: 'success',
							timer: 1500
						}).then((result) => {
							// if (result.dismiss === Swal.DismissReason.timer) {
							//     $('.modal').modal('hide');
							// }
						});
						$('.modal').modal('hide');
					} else {
						$.each(res.pesan, function (index, value) {
							$('#' + index).toggleClass('is-invalid').after('<span class="invalid-feedback" role="alert">' + value + '</span>');
						});
						$('.btn-upload').prop('disabled', false).html('<i class="fa fa-save"></i> Simpan')
						$('.progress').hide();
					}
				},
				error : function(data){
					
				}
			});
			return false;
		}
	});
});