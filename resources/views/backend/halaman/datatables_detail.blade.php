$(document).ready(function() {
	$('#datatable').DataTable({
		responsive: true,
		serverside: true,
		lengthChange: true,
		language: {
            url: "{{ asset('resources/vendor/datatables/js/indonesian.json') }}"
        },
		processing: true,
		serverSide: true,
		ajax: "{{ url($url_admin.'/'.$kode.'/data/'.$id) }}",
		columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
				{ data: 'nama' },
				{ data: 'kelola'},
				{ data: 'action', orderable: false, searchable: false}
		    ]
    });
});
