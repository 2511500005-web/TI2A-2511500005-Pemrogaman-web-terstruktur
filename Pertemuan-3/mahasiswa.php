<h4>Daftar Kehadiran Mahasiswa</h4>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Status Kehadiran</th>
    </tr>
  </thead>
  <tbody>
    <?php
    for ($i=1; $i<=31; $i++) {
        $nama = str_pad($i, 3, "0", STR_PAD_LEFT); // 001, 002, dst
        echo "<tr>
                <td>$i</td>
                <td>$nama</td>
                <td>
                  <select class='form-control'>
                    <option>Hadir</option>
                    <option>Izin</option>
                    <option>Sakit</option>
                    <option>Alpa</option>
                  </select>
                </td>
              </tr>";
    }
    ?>
  </tbody>
</table>