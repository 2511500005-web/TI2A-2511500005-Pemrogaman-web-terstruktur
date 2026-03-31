<h4>Daftar Kehadiran Mahasiswa</h4>
<table>
  <tr><th>No</th><th>Nama</th><th>Status Kehadiran</th></tr>
  <?php
  for ($i=1; $i<=31; $i++) {
      $nama = "Mahasiswa ".str_pad($i,2,"0",STR_PAD_LEFT);
      echo "<tr><td>$i</td><td>$nama</td><td><select><option>Hadir</option><option>Izin</option><option>Sakit</option><option>Alpa</option></select></td></tr>";
  }
  ?>
</table>