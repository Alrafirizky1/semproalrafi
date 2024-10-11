<?php
// cek session
if (empty($_SESSION['admin'])) {
    $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
    header("Location: ./");
    die();
} else {

    if ($_SESSION['admin'] != 1 and $_SESSION['admin'] != 3 and $_SESSION['admin'] != 2) {
        echo '<script language="javascript">
                window.alert("ERROR! Anda tidak memiliki hak akses untuk membuka halaman ini");
                window.location.href="./logout.php";
              </script>';
    } else {

        if (isset($_REQUEST['id_surat'])) {
            $id_surat = $_REQUEST['id_surat'];

            // Menampilkan data surat masuk dari database
            $query = mysqli_query($config, "SELECT * FROM tbl_surat_masuk WHERE id_surat_masuk = '$id_surat'");
            $row = mysqli_fetch_array($query);

            // Membuat header untuk print
            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("content-disposition: attachment;filename=Surat_Masuk_" . $row['no_surat'] . ".doc");

            // Membuat isi print
            echo "
            <html>
            <head>
            <title>Surat Masuk</title>
            </head>
            <body>
            <h2>Surat Masuk</h2>
            <table border='1' cellpadding='5' cellspacing='0'>
            <tr>
            <td>No. Surat</td>
            <td>:</td>
            <td>" . $row['no_surat'] . "</td>
            </tr>
            <tr>
            <td>Tanggal Masuk</td>
            <td>:</td>
            <td>" . $row['tanggal_surat'] . "</td>
            </tr>
            <tr>
            <td>Asal Surat</td>
            <td>:</td>
            <td>" . $row['pengirim'] . "</td>
            </tr>
            <tr>
            <td>Tujuan Surat</td>
            <td>:</td>
            <td>" . $row['tujuan'] . "</td>
            </tr>
            <tr>
            <td>File</td>
            <td>:</td>
            <td>";
            if (!empty($row['file'])) {
                echo "<a href='?page=gsm&act=fsm&id_surat=" . $row['id_surat_masuk'] . "'>" . $row['file'] . "</a>";
            } else {
                echo "Tidak ada file yang diupload";
            }
            echo "</td>
            </tr>
            </table>
            </body>
            </html>
            ";
        }
    }
}
