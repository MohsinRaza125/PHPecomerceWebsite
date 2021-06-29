<?php
session_start();
if(!isset($_SESSION['email']) && !isset($_SESSION['name']))
{
  $_SESSION['error'] = 'Invalid username or password';
  header('Location: index.php');
}

$tableData = '';
$icounter = 1;
include './database/connection.php';

$sql = "SELECT id,product_id, brand, color, size, price, sold FROM collections ORDER BY id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $tableData .= '<tr>';
        $tableData .= '<td>'.$icounter.'</td>';
        $tableData .= '<td>'.$row['product_id'].'</td>';
        $tableData .= '<td>'.$row['brand'].'</td>';
        $tableData .= '<td>'.$row['color'].'</td>';
        $tableData .= '<td>'.number_format($row['size'],1).'</td>';
        $tableData .= '<td>'.number_format($row['price'],2).'</td>';
        $tableData .= '<td>'.$row['sold'].'</td>';
        $tableData .= '<td>';
        $tableData .= '<a href="addCollection.php?q='.$row['id'].'" class="badge badge-warning text-white mr-1" style="cursor:pointer;">Edit</a>';
        $tableData .= '<a href="deleteCollection.php?q='.$row['id'].'" class="badge badge-danger text-white" style="cursor:pointer;">Delete</a>';
        $tableData .= '</td>';
        $tableData .= '</tr>';

        $icounter++;

    }
} 

include './database/connection_close.php';


?>

<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Collection</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="./assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <?php 
      include './layouts/header.php';

      include './layouts/sidebar.php';
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Collection</h1>
            <a class="btn btn-secondary text-white mt-4" href="addCollection.php" style="font-size: 19px; padding: 10px;">Add Collection</a>

              <?php if(isset($_SESSION['success'])){?>
                <div class="alert alert-success alert-dismissible mt-4">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <?php echo $_SESSION['success'];?>
                </div>
              <?php unset($_SESSION['success']); } ?>

              <?php if(isset($_SESSION['error'])){?>
                <div class="alert alert-danger alert-dismissible mt-4">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <?php echo $_SESSION['error'];?>
                </div>
              <?php unset($_SESSION['error']); } ?>



          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="create-collection" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>S#</th>
                    <th>Product ID</th>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Sold</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php echo $tableData;?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include('./layouts/footer.php');
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="./assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="./assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="./assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#create-collection').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jan 2020 17:07:51 GMT -->
</html>
