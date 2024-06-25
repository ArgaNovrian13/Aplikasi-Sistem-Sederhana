document.getElementById("cariData").addEventListener("input", function () {
  let query = this.value;

  fetch("searching.php?query=" + query)
    .then((response) => response.json())
    .then((data) => {
      let tableBody = document.getElementById("dataBody");
      tableBody.innerHTML = "";
      if (data.length > 0) {
        data.forEach((item, index) => {
          let row = `<tr>
            <td>${index + 1}</td>
            <td>${item.firstName}</td>
            <td>${item.lastName}</td>
            <td>${item.firstName} ${item.lastName}</td>
            <td>${item.jenisKelamin}</td>
            <td>${item.tglLahir}</td>
            <td>${item.alamat}</td>
            <td>${item.no_hp}</td>
            <td>
              <button type="button" class="btn btn-warning rounded-3 border-0"><a href="update.php?id=${
                item.id
              }" class="text-decoration-none text-dark m-2 fw-bold">Update</a></button>
              <button class="btn btn-danger rounded-3"><a href="delete.php?id=${
                item.id
              }" class="text-decoration-none text-dark fw-bold" onclick="return confirm('Apakah Anda Ingin Menghapusnya');">Delete</a></button>
            </td>
          </tr>`;
          tableBody.innerHTML += row;
        });
      } else {
        tableBody.innerHTML =
          '<tr><td colspan="9" class="text-center">Tidak Ada Data Yang Cocok</td></tr>';
      }
    });
});
