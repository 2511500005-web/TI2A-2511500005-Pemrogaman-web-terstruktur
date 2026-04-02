
<?php include "config.php"; ?>

<html>
<head><link rel="stylesheet" href="assets/style.css"></head>
<body>

<?php include "partials/header.php"; ?>
<?php include "partials/sidebar.php"; ?>

<div class="content">
<h2>Jadwal Kuliah</h2>

<table>
<tr>
<th>No</th><th>Kode</th><th>Mata Kuliah</th><th>SKS</th>
<th>Kelas</th><th>Hari, Jam</th><th>Ruang</th><th>Pengajar</th>
</tr>

<tr><td>1</td><td>IT202</td><td>Kalkulus 2</td><td>3</td><td>TI2A</td><td>Senin, 08:00-10:30</td><td>2.2.4</td><td>R Burham I. F., S.Si., M.Kom</td></tr>
<tr><td>2</td><td>IF901</td><td>Algoritma dan Struktur Data</td><td>4</td><td>TI2A</td><td>Senin, 13:00-16:20</td><td>LAB.3</td><td>Eza Budi Perkasa, M.Kom</td></tr>
<tr><td>3</td><td>IT311</td><td>Pemrograman Web Terstruktur</td><td>3</td><td>TI2A</td><td>Selasa, 10:30-13:00</td><td>LAB.3</td><td>Delpiah W., S.Kom., M.Kom</td></tr>
<tr><td>4</td><td>IT305</td><td>Sistem Manajemen Basis Data</td><td>3</td><td>TI2A</td><td>Rabu, 10:30-13:00</td><td>2.2.4</td><td>Melati Suci M., M.Kom</td></tr>
<tr><td>5</td><td>IT306</td><td>Desain dan Pemrograman Mobile</td><td>3</td><td>TI2A</td><td>Kamis, 08:00-10:30</td><td>LAB.4</td><td>Rezky Yuranda, M.Kom</td></tr>
<tr><td>6</td><td>UM301</td><td>English For Business</td><td>2</td><td>TI2A</td><td>Jumat, 08:00-09:40</td><td>1.2.1</td><td>Sinta S., S.Pd., M.Pd</td></tr>
<tr><td>7</td><td>MT102</td><td>Agama</td><td>2</td><td>KRT</td><td>Jumat, 13:50-15:30</td><td>2.1.6</td><td>Shito Mulyatidani, M.Hum</td></tr>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tabel Kehadiran Mahasiswa</title>
  <style>
    table {
      border-collapse: collapse;
      width: 70%;
      margin: 20px auto;
      font-family: Arial, sans-serif;
    }
    th, td {
      border: 1px solid #333;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
    .alpa {
      background-color: red;
      color: white;
    }
    .izin {
      background-color: yellow;
      color: black;
    }
    .hadir {
      background-color: green;
      color: white;
    }
    select {
      padding: 4px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <h2 style="text-align:center;">Daftar Kehadiran Mahasiswa</h2>
  <table>
    <tr>
      <th>No</th>
      <th>Nama Mahasiswa</th>
      <th>Status Kehadiran</th>
    </tr>
    <!-- Generate 31 baris -->
    <!-- Status default Hadir -->
    <!-- Nanti bisa diganti lewat dropdown -->
    <!-- Contoh baris -->
    <!-- Gunakan JavaScript untuk update warna -->
    <!-- Loop manual 31 baris -->
    <tbody id="tabel-body">
      <!-- Baris akan diisi lewat JS -->
    </tbody>
  </table>

  <script>
    const tbody = document.getElementById("tabel-body");
    const statusOptions = ["Hadir", "Izin", "Alpa"];

    // Buat 31 baris
    for (let i = 1; i <= 31; i++) {
      const tr = document.createElement("tr");

      // Kolom nomor
      const tdNo = document.createElement("td");
      tdNo.textContent = i;
      tr.appendChild(tdNo);

      // Kolom nama (001, 002, dst)
      const tdNama = document.createElement("td");
      tdNama.textContent = String(i).padStart(3, "0");
      tr.appendChild(tdNama);

      // Kolom status (dropdown)
      const tdStatus = document.createElement("td");
      const select = document.createElement("select");

      statusOptions.forEach(opt => {
        const option = document.createElement("option");
        option.value = opt.toLowerCase();
        option.textContent = opt;
        select.appendChild(option);
      });

      // Default Hadir
      select.value = "hadir";
      tdStatus.className = "hadir";

      // Event listener untuk ubah warna sesuai pilihan
      select.addEventListener("change", function() {
        tdStatus.className = this.value;
      });

      tdStatus.appendChild(select);
      tr.appendChild(tdStatus);

      tbody.appendChild(tr);
    }
  </script>
</body>
</html>

</table>
</div>

<?php include "partials/footer.php"; ?>
</body>
</html>