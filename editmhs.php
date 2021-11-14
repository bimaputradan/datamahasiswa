<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />

    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Date PIcker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
      $(function () {
        $("#datepicker").datepicker();
      });
    </script>
    <title>Data Mahasiswa TI</title>
  </head>
  <body>
    <?php 
      if(empty($_GET['id'])){
        header('location: mahasiswa.php');
      } else {
        $id = $_GET['id'];
        include('config.php');
        $data =  mysqli_query($mysqli, "SELECT * FROM mahasiswa where id_mhs = $id");
        while($hasil = mysqli_fetch_array($data))
        {
          $namad = $hasil['nama'];
          $npmd = $hasil['npm'];
          $alamatd = $hasil['alamat'];
          $notelpd = $hasil['notelp'];
          $tgld = $hasil['tgllahir'];
          $jkd = $hasil['jenis_kelamin'];
          $jurusand = $hasil['id_jurusan'];
        }
      }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
      <div class="container">
        <a class="navbar-brand" href="index.php" style="font-family: 'Viga', sans-serif">Institut Teknologi Adhi Tama Surabaya</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active mr-4" href="index.php"><i class="ri-home-4-line"></i></i></a>
          </div>
        </div>
      </div>
    </nav>

  <div div class="container" style="width: 40rem;">
    <div class="card shadow">
      <div class="card-body">
        <h4 class="card-title text-center mb-4">Edit Data Mahasiswa</h4>
        <form action="editmhs.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Nama</label>
              <input name="id" type="text" class="form-control" autocomplete="OFF" value="<?= $id?>" hidden>
              <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" autocomplete="off" value="<?= $namad?>">
            </div>
            <div class="form-group col-md-6">
              <label>NPM</label>
              <input type="text" class="form-control" placeholder="NPM" name="npm" autocomplete="off" value="<?= $npmd?>">
            </div>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" type="text" class="form-control" placeholder="Alamat" autocomplete="off" value="<?= $alamatd?>">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>No Telp</label>
              <input name="telp" type="text" class="form-control" placeholder="081234567891" autocomplete="off" value="<?= $notelpd?>">
            </div>
            <div class="form-group col-md-6">
              <label>Tanggal Lahir</label>
              <input name="ttl" type="text" class="form-control" id="datepicker" placeholder="22/10/2000" autocomplete="off" value="<?= $tgld?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Jenis Kelamin</label>
              <select class="form-control" name="jk">
                <option disabled> - Pilih Jenis Kelamin - </option>
                <option value="L" <?php if($jkd=='L'){ echo 'selected'; } ?> >Laki - Laki</option>
                <option value="P" <?php if($jkd=='P'){ echo 'selected'; } ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Jurusan</label>
              <select class="form-control" name="jurusan">
                <option disabled selected> - Pilih Jurusan dan Kelas - </option>
                <?php 
                  include('config.php');
                  $jurusan = mysqli_query($mysqli, "SELECT * FROM jurusan");
                  while($hasil = mysqli_fetch_array($jurusan)){
                ?>
                <option value="<?= $hasil['id_jurusan']?>" <?php if($hasil['id_jurusan']==$jurusand){ echo 'selected'; }?> ><?= $hasil['namajur'].' - '.$hasil['kelas']?></option>
                <?php }?>
              </select>
            </div>
          </div>
          <a href="mahasiswa.php"><button type="button" class="btn btn-danger">Kembali</button></a>
          <button type="submit" name="tombol" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>

  <?php
    if(isset($_POST['tombol'])){
      $idnya = $_POST['id'];
      $nama = $_POST['nama'];
      $npm = $_POST['npm'];
      $alamat = $_POST['alamat'];
      $notelp = $_POST['telp'];
      $tanggal = date('Y-m-d', strtotime($_POST['ttl']));
      $jk = $_POST['jk'];
      $jurusanpilih = $_POST['jurusan'];
      if(empty($nama) ||empty($npm) ||empty($alamat)||empty($jk)||empty($jurusanpilih)||empty($notelp)){} else {
        include_once("config.php");
        $result = mysqli_query($mysqli, "UPDATE mahasiswa SET nama='$nama',npm='$npm',alamat='$alamat',notelp='$notelp',tgllahir='$tanggal',jenis_kelamin='$jk',id_jurusan='$jurusanpilih' WHERE id_mhs=$idnya");
        echo "<script>alert('Data Berhasil Di Ubah'); window.location = 'mahasiswa.php';</script>";
      }
    }
  ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>