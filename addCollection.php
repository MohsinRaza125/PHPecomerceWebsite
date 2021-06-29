<?php

session_start();

$collection_type = "Create Collection";
$button_type = "Create";
$id = 0;
$prodID = '';
$brand = ''; 
$color = '';
$size = '';
$price = '';
$sold = '';
if(isset($_POST['submit']))
{
    $file_name = date('F-Y');
    $id = trim($_POST['id']);
    $prodID = trim($_POST['prodID']);
    $brand  = trim($_POST['brand']);
    $color  = trim($_POST['color']);
    $size   = trim($_POST['size']);
    $price  = trim($_POST['price']);
    $sold   = trim($_POST['sold']);
    $dNow2 = date('F j, Y h:i a');
    $dNow = date('Y-m-d H:i:s');
    include './writefile.php';

    $file = new WriteFile();
    include './database/connection.php';

    if(!empty($prodID) && !empty($brand) && !empty($color) && !empty($size) && !empty($price) && !empty($sold))
    {

      if($id == 0)
      {
          $sql = "INSERT INTO collections (product_id, brand, color, size, price, sold)
          VALUES ('$prodID', '$brand', '$color', '$size', '$price','$sold')";

          if ($conn->query($sql) === TRUE) 
          {
            $_SESSION['success'] = '<strong>Success!</strong> Product '.$product_id.' has been added successfully.';
            $text = $prodID.' has been added on '.$dNow2;
            $file->fwrite('logfile',$text);
            header("Location: create-collection.php");
          } else 
          {
            $_SESSION['error'] = '<strong>Error!</strong> Please fill all fields appropriately.';          
          }              
      }
      else
      {

          $sql = "UPDATE collections 
                  SET product_id='$prodID', 
                  brand='$brand', 
                  color='$color', 
                  size = '$size',
                  price = '$price',
                  sold = '$sold',
                  updated_at = '$dNow' 
                  WHERE id='$id'";

          if ($conn->query($sql) === TRUE) 
          {
            $text = $prodID.' has been updated on '.$dNow2;
            $file->fwrite('logfile',$text);
            $_SESSION['success'] = '<strong>Success!</strong> Product '.$prodID.' updated successfully.';
            header('Location: create-collection.php');

          } 
          else 
          {
            $_SESSION['error'] = '<strong>Error!</strong> Something went wrong';
          }
      }

    } 
    else 
    {
          $_SESSION['error'] = '<strong>Error!</strong> Please fill all fields appropriately.';
    }





    include './database/connection_close.php';
}

if(isset($_GET['q']))
{
  $collection_type = 'Update Collection';
  $button_type = "Update";
  $id = $_GET['q'];

  include './getData.php';

  $objGetData = new getData();
  $data = $objGetData->getDataById($id);

  $id = $data['id'];
  $prodID = $data['product_id'];
  $brand = $data['brand'];
  $color = $data['color'];
  $size = $data['size'];
  $price = $data['price'];
  $sold = $data['sold'];

}


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
          <div class="col-sm-8">
            <h1><?php echo $collection_type;?></h1>
            <?php if(isset($_SESSION['error'])){  ?>
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

              <form action="addCollection.php" name="addCollectionForm" method="POST">
                <div class="container">

                  <div class="row">

                    <div class="col-lg-6">

                      <input type="hidden" name="id" value="<?php echo $id;?>">

                      <label for="prodID" class="text-secondary">Product ID</label>

                      <input type="text" name="prodID" placeholder="Enter Product ID" class="form-control prodID" autocomplete="off" value="<?php echo $prodID;?>">

                    </div>

                    <div class="col-lg-6">

                      <label for="brand" class="text-secondary">Brand</label>

                      <input type="text" name="brand" placeholder="Enter Brand" class="form-control brand" autocomplete="off" value="<?php echo $brand;?>">

                    </div>

                  </div>

                  <div class="row mt-4">

                    <div class="col-lg-6">
                      <label for="color" class="text-secondary">Color</label>
                      <input type="text" name="color" placeholder="Enter Color" class="form-control color" autocomplete="off" value="<?php echo $color;?>">
                    </div>

                    <div class="col-lg-6">
                      <label for="size" class="text-secondary">Size</label>
                      <input type="text" name="size" placeholder="Enter Size" class="form-control size" autocomplete="off" value="<?php echo $size;?>">
                    </div>

                  </div>

                  <div class="row mt-4">

                    <div class="col-lg-6">
                      <label for="price" class="text-secondary">Price</label>
                      <input type="text" name="price" placeholder="Enter Price" class="form-control price" autocomplete="off" value="<?php echo $price;?>">
                    </div>

                    <div class="col-lg-6">
                      <label for="sold" class="text-secondary">Sold</label>
                      <input type="text" name="sold" placeholder="Enter Sold" class="form-control sold" autocomplete="off" value="<?php echo $sold;?>">
                    </div>

                  </div>

                  <div class="row mt-5">
                    <div class="col-lg-12 col-sm-12 col-md-12" style="text-align: center;">
                      <button type="submit" class="btn btn-dark text-white" name="submit" style="font-size: 24px; padding: 10px; border-radius: 12px; width: 140px;"><?php echo $button_type;?></button>
                    </div>
                  </div>
                </div>                
              </form>
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
</body>

</html>

