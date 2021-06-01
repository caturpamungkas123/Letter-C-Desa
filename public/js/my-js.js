$('.modal-dialog').parent().on('show.bs.modal', function (e) {
    $(e.relatedTarget.attributes['data-target'].value).appendTo('body');
})
$('.close').on('click', function (e) {
    $(e.relatedTarget.attributes['data-target'].value).appendTo('body');
})
function buku() {

    const sampul = document.querySelector('#buku_c');
    const imgpreview = document.querySelector('.img-buku');

    const filesampul = new FileReader();
    filesampul.readAsDataURL(sampul.files[0]);

    filesampul.onload = function (e) {
        imgpreview.src = e.target.result;
    }
}
function previewTanah() {
    const tanah = document.querySelector('#tanah');
    const imgtanah = document.querySelector('.img-tanah');

    const filetanah = new FileReader();
    filetanah.readAsDataURL(tanah.files[0]);

    filetanah.onload = function (e) {
        imgtanah.src = e.target.result;
    }
}
const success = $('.success').data('success')
if (success) {
    Swal.fire({
        position: "center",
        icon: "success",
        title: success,
        showConfirmButton: false,
        timer: 2000,
    });
}
$(".hapus").on("click", function (e) {
    // hentikan default href
    e.preventDefault();
    const href = $(this).attr("href");
    Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Akan Menghapus Data Ini..?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // document.location.href = href
            document.location.href = href;
        }
    });
});


