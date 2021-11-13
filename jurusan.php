<!DOCTYPE html>
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

    <title>Data Mahasiswa TI</title>
  </head>
  <body>
    <?php
      include('config.php');
      $data = mysqli_query($mysqli, "SELECT * FROM jurusan");
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

    <div class="container">
        <div class="row mt-3 mb-4">
            <div class="col-10">
                <h4>Daftar Jurusan ITATS</h4>
            </div>
            <div class="col mr-auto">
                <a href="tambahjurusan.php"><button type="button" class="btn btn-success">Tambah Jurusan</button></a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Jurusan</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $n = 1;
              while($hasil = mysqli_fetch_array($data)){?>
              <tr>
                <th scope="row"><?= +$n?></th>
                <td><?= $hasil['namajur']?></td>
                <td><?= $hasil['kelas']?></td>
                <td>
                  <a href="editjurusan.php?id=<?= $hasil['id_jurusan']?>"><span class="badge badge-warning">Edit</span></a>
                  <a href="hapus.php?hal=jurusan&&id=<?= $hasil['id_jurusan']?>"><span type="button" class="badge badge-danger">Hapus</span></a>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
