<?php
require 'koneksi.php';
?>
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>
<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : " . $cari . "</b>";
}
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Kode MK</th>
        <th>Nama Matakuliah</th>
        <th>Nilai</th>
    </tr>
    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $sql = "SELECT * FROM khs INNER JOIN mahasiswa ON mahasiswa.NIM=khs.nim
        INNER JOIN matakuliah ON matakuliah.kode=khs.kode_mk where  mahasiswa.NIM = '" . $cari . " '";
        $tampil = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM khs INNER JOIN mahasiswa ON mahasiswa.NIM=khs.nim
        INNER JOIN matakuliah ON matakuliah.kode=khs.kode_mk";
        $tampil = mysqli_query($conn, $sql);
    }
    $no = 1;
    while ($r = mysqli_fetch_array($tampil)) 
    {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['NIM']; ?></td>
            <td><?php echo $r['Nama'] ?></td>
            <td><?php echo $r['kode_mk']; ?></td>
            <td><?php echo $r['nama_mk'] ?></td>
            <td><?php echo $r['nilai']; ?></td>
        </tr>
    <?php }
    ?>
</table>