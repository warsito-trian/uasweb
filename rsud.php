<?php
require 'function.php';     
require 'cek.php';                                                                
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">WELCOME</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
                 <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                       
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>

                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
            

            <ul class="navbar-nav ml-auto ml-md-0">
                <a class="nav-link" href="barang.php">
                  
                              
                                  <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Puskesmas
                            </a>
                               <a class="nav-link" href="rsud.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                RSUD
                            </a>
                            
                           
                           

                          
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4" align="center">  Daftar Peserta Vaksinasi Covid19 DKI Jakarta</h1>
                         <div align="center" id="hasil"></div>
            <script>
                var waktu = new Date(); 
                document.getElementById("hasil").innerHTML = waktu;
            </script>
            
                    
                              <a href ="export index.php" class="btn btn-info">Export</a>

                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      Update Data
                      </button>
                       
                                 <!-- Button to Open the Modal -->
              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nama Faskes</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Kelamin</th>
                                                <th>Umur</th>
                                                <th>NO HP</th>
                                                <th>Tools</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                                <?php
                                          $ambilsemuadatastock = mysqli_query($conn,"select * from stock");
                                            $i = 1;
                                          while($data= mysqli_fetch_array($ambilsemuadatastock)){

                                            $namafaskes = $data [ 'namafaskes'];
                                            $nama = $data [ 'nama'];
                                            $nik = $data ['nik'];
                                            $kelamin = $data ['kelamin'];
                                            $umur = $data ['umur'];
                                            $nohp = $data ['nohp'];
                                            $idb = $data ['idbarang'];

                                           ?>

                                        
                                            <tr>
                                                
                                                <td><?=$namafaskes;?></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$nik;?></td>
                                                <td><?=$kelamin;?></td>
                                                <td><?=$umur;?></td>
                                                <td><?=$nohp;?></td>
                                                
                                                  <td>  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>">
                                                    Edit
                                                  </button>
                                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                                      Delete
                                                    </button>
                                                  </td>
                                                  
                                                 
                                            </tr>
                                           <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?=$idb;?>">
                                              <div class="modal-dialog">
                                                <div class="modal-content">

                                                  <!-- Modal Header -->
                                                  <div class="modal-header">
                                                    <h4 class="modal-title">Edit Barang</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  </div>

                                                  <form method="post">
                                                  <div class="modal-body">
                                                  <input type="text" name="namafaskes" value = " <?=$namafaskes;?>" class="form-control" required>
                                                  <br>
                                                    <input type="text" name="nama" value = " <?=$nama;?>" class="form-control" required>
                                                    <br>
                                                    <input type="text" name="nik" value = " <?=$nik;?>" class="form-control" required>
                                                    <br>
                                                    <input type="text" name="kelamin" value = " <?=$kelamin;?>" class="form-control" required>
                                                    <br>
                                                    <input type="text" name="umur" value = " <?=$umur;?>" class="form-control" required>
                                                    <br>
                                                    <input type="text" name="nohp" value = " <?=$nohp;?>" class="form-control" required>
                                                    <br>
                                                      <script>
                                                    var waktu = new Date(); 
                                                    document.getElementById("hasil").innerHTML = waktu;
                                                   </script>


                                                    <input type= "hidden" name = "idb" value=<?=$idb;?>>
                                                    <button type="submit" class="btn btn-primary" name="updatebarang">Edit</button>
                                                  </div>
                                                </form>


                                                </div>
                                              </div>
                                            </div>
                                            <!-- delete Modal -->
                                          <div class="modal fade" id="delete<?=$idb;?>">
                                            <div class="modal-dialog">
                                              <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Hapus Barang?</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <form method="post">
                                                <div class="modal-body">
                                              Are you sure want to delete <?=$namafaskes;?>?
                                              <input type= "hidden" name = "idb" value="<?=$idb;?>">
                                                  <br>
                                                  <br>
                                                  <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
                                                </div>
                                              </form>
                                            </div>
                                              </div>
                                            </div>
                                          </div>
                                            <?php
                                          };
                                             ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>

     <!-- The Modal -->
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Vaksinasi Covid19</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
            <input type="text" name="namafaskes" placeholder="Nama Faskes" class="form-control" required>
            <br>
            <input type="text" name="nama" placeholder="Nama" class="form-control" required>
            <br>
            <input type="text" name="nik" placeholder="NIK" class="form-control" required>
            <br>
             <input type="text" name="kelamin" placeholder="Kelamin" class="form-control" required>
            <br>
            <input type="text" name="umur" placeholder="Umur" class="form-control" required>
            <br>
            <input type="text" name="nohp" placeholder="Nomor HP" class="form-control" required>
            <br>
        
            <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
        </div>
    </form>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
</html>
