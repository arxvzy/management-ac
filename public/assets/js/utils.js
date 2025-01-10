function confirmDelete(userId, userName, type) {
    Swal.fire({
        title: "Apakah anda yakin?",
        text: `Anda akan menghapus ${type} "${userName}"`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#805ad5",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-form-${userId}`).submit();
        }
    });
}
