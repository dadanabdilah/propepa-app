$("#config-table").DataTable({
  responsive: true,
  drawCallback: function () {
    $(".delete-confirm").on("click", function (event) {
      event.preventDefault();
      Swal.fire({
        title: "Apakah anda yakin?",
        text: "Jika data dihapus maka data yang bersangkutan akan ikut terhapus juga.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          let action = $(this).attr("data-action");
          let name = $(this).attr("data-csrf-name");
          let token = $(this).attr("data-csrf-token");
          $("body").html(
            "<form class='form-inline remove-form' method='post' action='" +
              action +
              "'></form>"
          );
          $("body")
            .find(".remove-form")
            .append('<input name="_method" type="hidden" value="delete">');
          $("body")
            .find(".remove-form")
            .append(
              '<input name="' + name + '" type="hidden" value="' + token + '">'
            );
          $("body").find(".remove-form").submit();
        }
      });
    });
  },
});
