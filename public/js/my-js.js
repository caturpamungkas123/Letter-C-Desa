$(".modal-dialog")
  .parent()
  .on("show.bs.modal", function (e) {
    $(e.relatedTarget.attributes["data-target"].value).appendTo("body");
  });
$(".close").on("click", function (e) {
  $(e.relatedTarget.attributes["data-target"].value).appendTo("body");
});

function previewImg() {
  const fileImg = document.querySelector("#foto_transaksi").files[0];
  const thumbnaiImg = document.querySelector(".transaksi");
  const img = URL.createObjectURL(fileImg);
  thumbnaiImg.src = img;
}
const success = $(".success").data("success");
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
    title: "Apakah Anda Yakin ?",
    icon: "question",
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

function goBack() {
  window.history.back();
}
