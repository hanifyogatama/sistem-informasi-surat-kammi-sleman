const flashdata = $('.flash-data').data('flashdata');

if (flashdata) {
    Swal.fire({
        title: 'Data Instansi',
        text: 'Berhasil' + flashdata,
        type: 'success'
    });
}

// delete data 
$('.data-delete-2').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't to delete this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#f6c23e',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })

});