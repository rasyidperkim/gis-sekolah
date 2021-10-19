<a href="{{ route('kecamatan.edit', $model) }}" class="btn btn-warning">Edit</a>
<button href="{{ route('kecamatan.destroy', $model) }}" class="btn btn-danger" id="delete"
    style="margin:3px">Hapus</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('button#delete').on('click', function(e) {
        e.preventDefault();
        let href = $(this).attr('href');
        Swal.fire({
            title: 'Apakah Kamu Yakin Hapus Data Ini?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya,hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
                Swal.fire(
                    'Terhapus !',
                    'Data Kamu Berhasil Dihapus',
                    'success'
                )
            }
        })

    })
</script>
