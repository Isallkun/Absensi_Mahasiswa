<?php
	
  session_start();
  if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
	include "koneksi.php";
	/*
	if(isset($_session['id'])){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';	
	}*/		
	$dosen_id = $_SESSION['dosen_id'];
	$dosen_name = $_SESSION["dosen_user_name"];
	$dosen_foto = $_SESSION["dosen_user_foto"];
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Berita Perkuliahan</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ABSENSI</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="absensi.php">
          <i class="fas fa-fw fa-user-check"></i>
          <span>Absensi</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="berita.php">
        <i class="fas fa-fw fa-pen"></i>
          <span>Berita Perkuliahan</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="nilai.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Nilai Tugas</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $dosen_name ;?></span>
                <img class="img-profile rounded-circle" src="img/<?= $dosen_foto; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Pengaturan
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="mb-3 text-gray-800">Berita Perkuliahan</h1>
            <div class="row mt-3">
                <div class="col">
                 <button type="button" class="btn btn-success btn-sm" onclick="add_menu()">
                    <i class="fas fa-plus"></i> Tambah
                </button>
                <button class="btn btn-danger btn-sm" onclick="reload_table()">
               <i class="fas fa-file"></i> Download PDF
                </button>
            </div>
        </div>
    <br>
            
            <!-- DataTales -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Rekap Berita Perkuliahan</h6>
            </div>
            <div class="card-body">             
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Hari</th>
                      <th>Tanggal</th>
                      <th>Pokok Bahasan</th>
                      <th>Jumlah Mahasiswa</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php
                    $sql="SELECT * FROM berita";
                    $query=mysqli_query($koneksi,$sql);
                    $i = 1;
                    while ($data=mysqli_fetch_array($query)){
                        $hari=$data["hari"];
                        $tanggal=$data["tanggal"];
                        $pokok_bahasan=$data["bahasan"];
                        $jumlah_mahasiswa=$data["jml_mahasiswa"];
                    ?>
                    <tr>
                      <td><?=$i++;?></td>
                      <td><?= $hari;?></td>
                      <td><?= $tanggal;?></td>
                      <td><?= $pokok_bahasan;?></td>
                      <td><?= $jumlah_mahasiswa;?></td>
                      <?php } 
                    ?>
                    </tbody>
                </table>
            </div>    
            </div>
          </div>
        </div>


    <!-- Modal -->
<div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title" id="modal-title">Isi Berita Perkuliahan</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="form">
            
               <input type="hidden" name="id" id="id">

               <div class="form-group row">
                  <label for="hari" class="col-sm-3 col-form-label">Hari</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="hari" name="hari">
                  </div>
               </div> 

               <div class="form-group row">
                  <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                  <div class="col-sm-9">
                  <input type="date" class="form-control" id="tanggal" name="tanggal">
                  </div>
               </div>

               <div class="form-group row">
                  <label for="tanggal" class="col-sm-3 col-form-label">Pokok Bahasan</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="bahasan" name="bahasan">
                  </div>
               </div>

               <div class="form-group row">
                  <label for="jml_mahasiswa" class="col-sm-3 col-form-label">Jumlah Mahasiswa</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="jml_mahasiswa" name="jml_mahasiswa">
                  </div>
               </div>

            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-sm btn-primary" onclick="save()" id="btn_save">Simpan</button>
         </div>
      </div>
   </div>
</div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Kelompok 9 2022</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Logout untuk keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- For Datatable -->
  <script type="text/javascript">

   let tableMenu;

   // Show Table
   $(document).ready(function(){
      tableMenu = $('#tableMenu').DataTable({
         processing: true,
         serverSide: true,
         order: [],
         ajax: {
         'url': "http://localhost/portal-news/back/menu/ajax_list",
         'type': "POST"
         },
         columnDefs: [
            { 
               'targets': [ 0, -1 ], 
               'orderable': false, 
            }
         ],
      });
   });

   // Reload Table
   function reload_table(){
      tableMenu.ajax.reload(null, false);
   }

   // Save Button Modal
   function save(){
      $('#btn_save').text('Saving...');
      $('#btn_save').attr('disabled', true);
      
      $.ajax({
         type: 'post',
         dataType: 'json',
         url: 'add_berita.php',
         data: $('#form').serialize(),
         success: function(data){
            if(data.status){
               $('#modalMenu').modal('hide');
               location.reload();
            } 
            console.log('sukses:', data)
            $('#btn_save').text('Simpan');
            $('#btn_save').attr('disabled', false);
         },
         error: function(e){
        /*Swal.fire({
               icon: 'error',
               title: 'Oops...',
               text: 'Terji Suatu Kesalahan!',
               showConfirmButton: true
            });*/
            console.log(e)
            $('#modalMenu').modal('hide');
            $('#btn_save').text('Simpan');
            $('#btn_save').attr('disabled', false);
         }
      }); 
   }

   // Add Menu
   function add_menu(){
      $('#form')[0].reset();
      $('.modal-title').text('Isi Berita Perkuliahan');
      $('#modalMenu').modal('show');
   } 

   //Edit  
   function edit_menu(id){
      $.ajax({
         url : 'add_berita.php',
         data: {id :id},
         type: 'post',
         dataType: 'json',
         success: function(data){
            $('[name="id"]').val(data.id);
            $('[name="hari"]').val(data.hari);
            $('[name="tgl"]').val(data.tgl);
            $('[name="bahasan"]').val(data.bahasan);
            $('[name="jml_mahasiswa"]').val(data.jml_mahasiswa);

            $('.modal-title').text('Edit Menu');
            $('#modalMenu').modal('show');
         },
      });
   }

   // Delete Menu
   function delete_menu(id){
      Swal.fire({
         title: 'Apakah anda yakin?',
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Hapus!'
         }).then((result) => {
         if (result.value) {
            $.ajax({
               type: 'post',
               dataType: 'json',
               url: 'http://localhost/portal-news/back/menu/delete',
               data: {
                  id: id
               },
               success: function(data){
                  if(data.status){
                     tableMenu.row( $(this).parents('tr') ).remove().draw();
                     $('#modalMenu').modal('hide');
                     location.reload();
                  }
               },
               error: function(){
                  $('#modalMenu').modal('hide');
                  Swal.fire({
                     icon: 'error',
                     title: 'Oops...',
                     text: 'Terjadi Suatu Kesalahan!',
                     showConfirmButton: true
                  });
               }
            });
         }
      });
   }


</script>

</body>

</html>
