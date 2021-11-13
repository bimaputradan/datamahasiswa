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
    <title>Data Mahasiswa TI</title>
  </head>
  <body>
    <?php 
      if(empty($_GET['id'])){
        header('location: jurusan.php');
      } else {
        $id = $_GET['id'];
        include('config.php');
        $data =  mysqli_query($mysqli, "SELECT * FROM jurusan where id_jurusan = $id");
        while($hasil = mysqli_fetch_array($data))
        {
          $jurusan = $hasil['namajur'];
          $kelas = $hasil['kelas'];
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
        <h4 class="card-title text-center mb-4">Edit Data Jurusan</h4>
        <form action="" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Nama Jurusan</label>
              <input name="nama" type="text" class="form-control" autocomplete="OFF" value="<?= $jurusan?>">
              <input name="id" type="text" class="form-control" autocomplete="OFF" value="<?= $id?>" hidden>
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">Kelas</label>
                <select name="kelas" class="form-control">
                  <option disabled >- Pilih Kelas -</option>
                  <option value="Pagi" <?php if($kelas == "Pagi"){ echo "selected"; }?> >Pagi</option>
                  <option value="Malam" <?php if($kelas == "Malam"){ echo "selected"; }?> >Malam</option>
                </select>
            </div>
          </div>
          <a href="jurusan.php"><button type="button" class="btn btn-danger">Batal</button></a>
          <button type="submit" name="tombol" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
  <?php
    if(isset($_POST['tombol'])){
      $nama = $_POST['nama'];
      $kelas = $_POST['kelas'];
      $idnya = $_POST['id'];

      if(empty($nama) ||empty($nama)){} else {
        include_once("config.php");              
        $result = mysqli_query($mysqli, "UPDATE jurusan SET namajur='$nama',kelas='$kelas' WHERE id_jurusan=$idnya");      }

      header('location: jurusan.php');
    }
  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>