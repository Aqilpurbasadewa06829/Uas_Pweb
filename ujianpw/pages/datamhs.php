<?php
include 'dbconnect.php'; // Pastikan file db.php berada di path yang benar

// Lakukan query ke database
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);

if (!$result) {
    die("Query Error: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin One HTML - Bulma Admin Dashboard</title>

  <!-- Bulma is included -->
  <link rel="stylesheet" href="../asset/css/main.min.css">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>
<body>
<div id="app">
  <nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
      <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
        <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
      </a>
      <div class="navbar-item has-control">
        <div class="control"><input placeholder="Search everywhere..." class="input"></div>
      </div>
    </div>
    <div class="navbar-brand is-right">
      <a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
        <span class="icon"><i class="mdi mdi-dots-vertical"></i></span>
      </a>
    </div>
  </nav>
  <aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div class="aside-tools-label">
        <span><b>Admin</b> One HTML</span>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">General</p>
      <ul class="menu-list">
        <li>
          <a href="../default.php" class="is-active router-link-active has-icon">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">MANAJEMEN</p>
      <ul class="menu-list">
        <li>
          <a href="datamhs.php" class="is-active router-link-active has-icon">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Data Mahasiswa</span>
          </a>
        </li>
      </ul>
  </aside>
  <section class="section is-title-bar">
    <div class="level">
      <div class="level-left">
        <div class="level-item">
          <ul>
            <li>Admin</li>
            <li>Dashboard</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="hero is-hero-bar">
        <div class="hero-body">
            <div class="level">
                <div class="level-left">
                    <div class="level-item"><h1 class="title">
                        Data Mahasiswa
                    </h1></div>
                </div>
                <div class="level-right" style="display: none;">
                  <div class="level-item"></div>
                </div>
              </div>
            </div>
    </section>
    <section class="section is-main-section">
      <a class="btn btn-primary" href="insert.php">Tambah Data Mahasiswa</a>
        <div class="card has-table has-mobile-sort-spaced">
            <header class="card-header">
              <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
              </a>
            </header>
            <div class="card-content">
              <div class="b-table has-pagination">
                <div class="table-wrapper has-mobile-cards">
                  <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
                            <thead>
                              <tr>
                                <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Program Studi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td>{$row['nim']}</td>
                                            <td>{$row['nama']}</td>
                                            <td>{$row['jenis_kelamin']}</td>
                                            <td>{$row['alamat']}</td>
                                            <td>{$row['program_studi']}</td>
                                            <td>
                                                <a href='edit.php?id={$row['id']}'>Edit</a> | 
                                                <a href='delete.php?id={$row['id']}'>Delete</a>
                                            </td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td style='text-align: center;' colspan='6'>Tidak ada data mahasiswa.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<div id="sample-modal" class="modal">
  <div class="modal-background jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Confirm action</p>
      <button class="delete jb-modal-close" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <p>This will permanently delete <b>Some Object</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button jb-modal-close">Cancel</button>
      <button class="button is-danger jb-modal-close">Delete</button>
    </footer>
  </div>
  <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="asset/js/main.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="asset/js/chart.sample.min.js"></script>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>
</html>

<?php
$conn->close();
?>
