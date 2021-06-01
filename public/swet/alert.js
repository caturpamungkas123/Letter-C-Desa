const contact = (".swal").data("contact");
if (contact) {
  Swal.fire({
    position: "center",
    icon: "success",
    title: contact,
    showConfirmButton: false,
    timer: 2000,
  });
}
