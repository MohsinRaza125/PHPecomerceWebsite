<?php 
if(!isset($_SESSION)) 
{   
  session_start(); 
} 
include './database/connection.php';
include "getData.php";
$brandCheckbox = '';
$colorCheckbox = '';
$sizeCheckbox = '';
$dataCollection =  new getData();

$brands = $dataCollection->getBrands(); 
$colors = $dataCollection->getColors();
$size = $dataCollection->getSize();

/*Get All Brands Collection*/
if(!empty($brands))
{
  foreach ($brands as $key => $value) 
  {
	 
	  
	 $sql = 'select * from collections where brand = "'.$value.'"';
	 $result = $conn->query($sql);
	 	 
    $brandCheckbox .= '<div id="brandy">';
    $brandCheckbox .= '<span><input type="checkbox" class="custom-checkbox" name="brand[]" value="'.$value.'" onclick="checbox(this)"></span>';
    $brandCheckbox .= '<span class="filters">'.$value.'('.mysqli_num_rows($result).')</span>';
    $brandCheckbox .= '</div>';
  }

}

/*Get All Color Collection*/
if(!empty($colors))
{
  foreach ($colors as $key => $value) 
  {
	  
	  $sql = 'select * from collections where color = "'.$value.'"';
	 $result = $conn->query($sql); 
    $colorCheckbox .= '<div>';
    $colorCheckbox .= '<span><input type="checkbox" class="custom-checkbox" name="colors[]" value="'.$value.'" onclick="checbox(this)"></span>';
    $colorCheckbox .= '<span class="filters">'.$value.'('.mysqli_num_rows($result).')</span>';
    $colorCheckbox .= '</div>';
  }

}

/*Get All Size Collection*/
if(!empty($size))
{
  foreach ($size as $key => $value) 
  {
	  
	  $sql = 'select * from collections where size = "'.$value.'"';
	 $result = $conn->query($sql);  
    $sizeCheckbox .= '<div>';
    $sizeCheckbox .= '<span><input type="checkbox" class="custom-checkbox" name="size[]" value="'.$value.'" onclick="checbox(this)"></span>';
    $sizeCheckbox .= '<span class="filters">'.$value.'('.mysqli_num_rows($result).')</span>';
    $sizeCheckbox .= '</div>';
  }

}


 $sql = 'select * from collections';
	 $all_rec = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/custom-css.css">

    <title>Filter</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Admin Login</a>
          </li>
		  <li class="nav-item"><h3 class="nav-link" style = "text-indent : 17em;"> Desktop and Laptop Shop</h3></li>
       
        </ul>
    </nav>
    <div class="container" style="margin-top: 40px;">
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <input type="text" name="search" id="search" class="form-control search" onKeyUp="search()" placeholder="Search Here" style="height: 44px; padding: 10px;">
            <ul style="padding-inline-start: 0px;" class="appended-ui">
            </ul>
        </div>
        <div class="col-lg-1"></div>
      </div>
    </div>


    <div class="appended-search">
          <div class="container" style="margin-top: 40px;">
          <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10">
          <div class="card">
          <div class="card-body search-counter">	
          <b><?= mysqli_num_rows($all_rec) ?> Records</b>
          </div>
          </div>
          </div>
          <div class="col-lg-1"></div>
          </div>


          <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10">

          <div class="card">
          <div class="card-body">

          <div class="container">
          <div class="row">

          <div class="col-lg-4">
          <div class="card">
          <div class="card-body">
          <h4 class="card-title">Brand &nbsp;&nbsp;<a href="filter.php?asc=brand"  style="font-size:13px">Asc</a> <a style="font-size:13px" href="filter.php?desc=brand">Desc</a></h4>
          <?php echo $brandCheckbox;?>
          </div>
          </div>

          <div class="card" style="margin-top: 10px;">
          <div class="card-body">
          <h4 class="card-title">Color &nbsp;&nbsp;<a href="filter.php?asc=color"  style="font-size:13px">Asc</a> <a style="font-size:13px" href="filter.php?desc=color">Desc</a></h4>
          <?php echo $colorCheckbox;?>
          </div>
          </div>

          <div class="card" style="margin-top: 10px;">
          <div class="card-body">
          <h4 class="card-title">Size &nbsp;&nbsp;<a href="filter.php?asc=size"  style="font-size:13px">Asc</a> <a style="font-size:13px" href="filter.php?desc=size">Desc</a></h4>
          <?php echo $sizeCheckbox;?>
          </div>
          </div>

          </div>
          <!-- etho tk krna-->
          <div class="col-lg-8">

          <div class="container">
          <div class="row appended-card-data">
          <?php  
		 
	 while ($x = mysqli_fetch_assoc($all_rec)):
		  ?>
          <div class="col-lg-6" style="margin-top:10px;">
<div class="card">
<div class="card-body">
<div class="container">
<div class="row">
<div class="col-lg-7">
<b>
Product ID :</b>
</div>
<div class="col-lg-5">
<?= $x['product_id'] ?></div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-lg-7">
<b>
Brand :</b>
</div>
<div class="col-lg-5">
<?= $x['brand'] ?></div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-lg-7">
<b>
Size :</b>
</div>
<div class="col-lg-5">
<?= $x['size'] ?></div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-lg-7">
<b>
Price :</b>
</div>
<div class="col-lg-5">
<?= number_format($x['price']) ?></div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-lg-7">
<b>
Color :</b>
</div>
<div class="col-lg-5">
<?= $x['color'] ?></div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-lg-7">
<b>
Sold :</b>
</div>
<div class="col-lg-5">
<?= $x['sold'] ?></div>
</div>
</div>
</div>
</div>
</div>
          <?php endwhile ?>
          
          
          </div>
          </div>

          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>                
    </div>
    <?php include "./layouts/footer2.php";?>
    <script src="./assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery-3.5.0.js"></script>

    <script>
      
      function search(event)
      { 
        var search = document.getElementsByClassName('search')[0].value;
        var suggestion = '';
        if(search !== '')
        {

  
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) 
              {
                var responseArray = JSON.parse(this.responseText);

                if(this.responseText != '')
                {
                  document.getElementsByClassName('appended-ui')[0].innerHTML = "";          
                  document.getElementsByClassName('appended-ui')[0].innerHTML = responseArray[1];

                  document.getElementsByClassName('appended-card-data')[0].innerHTML = responseArray[0];                  
                }


              }
            };
            xhttp.open("GET", "getAjaxData.php?search="+search, true);
            xhttp.send();

          var Html = '<div class="container" style="margin-top: 40px;">';

          /*Header Box Start*/
          Html += '<div class="row">';
          Html += '<div class="col-lg-1"></div>';
          Html += '<div class="col-lg-10">';
          Html += '<div class="card">';
          Html += '<div class="card-body search-counter">';
          /*Here total Search will be shown*/

          Html += '</div>';
          Html += '</div>';
          Html += '</div>';
          Html += '<div class="col-lg-1"></div>';
          Html += '</div>';
          /*Header Box End*/


          /*Card Body Start Here*/
          Html += '<div class="row">';
          Html += '<div class="col-lg-1"></div>';
          Html += '<div class="col-lg-10">';

          Html += '<div class="card">';
          Html += '<div class="card-body">';

          Html += '<div class="container">';
          Html += '<div class="row">';

          /*Filters Start Here*/
          Html += '<div class="col-lg-4">';
          /*Brand*/
          Html += '<div class="card">';
          Html += '<div class="card-body">';
          Html += '<h4 class="card-title">Brand</h4>';
          Html += '<?php echo $brandCheckbox;?>';
          Html += '</div>';
          Html += '</div>';

          /*Color*/
          Html += '<div class="card" style="margin-top: 10px;">';
          Html += '<div class="card-body">';
          Html += '<h4 class="card-title">Color</h4>';
          Html += '<?php echo $colorCheckbox;?>';
          Html += '</div>';
          Html += '</div>';

          /*Size*/
          Html += '<div class="card" style="margin-top: 10px;">';
          Html += '<div class="card-body">';
          Html += '<h4 class="card-title">Size</h4>';
          Html += '<?php echo $sizeCheckbox;?>';
          Html += '</div>';
          Html += '</div>';

          Html += '</div>';
          /*Filters Start Here*/

          /*Filters Data Start Here*/
          Html += '<div class="col-lg-8">';

          Html += '<div class="container">';
          Html += '<div class="row appended-card-data">';
          Html += '</div>';
          Html += '</div>';

          Html += '</div>';
          Html += '</div>';
          Html += '</div>';
          Html += '</div>';
          Html += '</div>';
          Html += '</div>';
          Html += '</div>';
          Html += '</div>';          

          document.getElementsByClassName('appended-search')[0].innerHTML = "";
          document.getElementsByClassName('appended-search')[0].innerHTML = Html;

           //document.getElementsByClassName('appended-ui')[0].innerHTML = "";          
           //document.getElementsByClassName('appended-ui')[0].innerHTML = suggestion;
          //$('.appended-ui').empty();
          //$('.appended-ui').append(suggestion);

          
          setTimeout(function(){ 
            var x = document.getElementsByClassName('counter');
            var services = x.item(0).defaultValue;

            document.getElementsByClassName('search-counter')[0].innerHTML = '<b>'+services + ' results for ' + search +'</b>';

           }, 1000);

        }
        else
        {
            // document.getElementsByClassName('appended-search')[0].innerHTML = "";
        }
      }

      function checbox(event)
      {
        var brand = [];
        var colors = [];
        var size = [];
        /*Get Brand*/
        $("input:checkbox[name='brand[]']:checked").each(function(){
            brand.push($(this).val());
        });

        /*Get Size*/
        $("input:checkbox[name='size[]']:checked").each(function(){
            size.push($(this).val());
        });

        /*Get Color*/
        $("input:checkbox[name='colors[]']:checked").each(function(){
            colors.push($(this).val());
        });

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) 
          {
            if(this.responseText != '')
            {
			 
              
			  document.getElementsByClassName('appended-card-data')[0].innerHTML = "";
			  document.getElementsByClassName('appended-card-data')[0].innerHTML = this.responseText;
			  //document.getElementsByClassName('row')[0].innerHTML = "";
              //document.getElementsByClassName('col-lg-4')[0].innerHTML = "";
			  //document.getElementsByClassName('col-lg-8')[0].innerHTML = "";
			  //document.getElementsByClassName('col-lg-10')[0].innerHTML = "";

			 // document.getElementsByClassName('row')[0].innerHTML = this.responseText;
			  

            }

          }
        };
        xhttp.open("GET", "filteredData.php?brand="+brand+'&size='+size+'&colors='+colors, true);
        xhttp.send();

      }

      function getSuggestionItem(search = null)
      { 
        
        var search = document.getElementsByClassName('selected_item')[0].innerHTML;
		 search = search.substring(0, search.indexOf("("));
		 console.log(search);
		 
        var suggestion = '';
        if(search !== '')
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) 
              {
                var responseArray = JSON.parse(this.responseText);

                document.getElementsByClassName('appended-card-data')[0].innerHTML = responseArray[0];

              }
            };
            xhttp.open("GET", "getAjaxData.php?search="+search, true);
            xhttp.send();


            var Html = '<div class="container" style="margin-top: 40px;">';

            /*Header Box Start*/
            Html += '<div class="row">';
            Html += '<div class="col-lg-1"></div>';
            Html += '<div class="col-lg-10">';
            Html += '<div class="card">';
            Html += '<div class="card-body search-counter">';
            /*Here total Search will be shown*/

            Html += '</div>';
            Html += '</div>';
            Html += '</div>';
            Html += '<div class="col-lg-1"></div>';
            Html += '</div>';
            /*Header Box End*/


            /*Card Body Start Here*/
            Html += '<div class="row">';
            Html += '<div class="col-lg-1"></div>';
            Html += '<div class="col-lg-10">';

            Html += '<div class="card">';
            Html += '<div class="card-body">';

            Html += '<div class="container">';
            Html += '<div class="row">';

            /*Filters Start Here*/
            Html += '<div class="col-lg-4">';
            /*Brand*/
            Html += '<div class="card">';
            Html += '<div class="card-body">';
            Html += '<h4 class="card-title">Brand</h4>';
            Html += '<?php echo $brandCheckbox;?>';
            Html += '</div>';
            Html += '</div>';

            /*Color*/
            Html += '<div class="card" style="margin-top: 10px;">';
            Html += '<div class="card-body">';
            Html += '<h4 class="card-title">Color</h4>';
            Html += '<?php echo $colorCheckbox;?>';
            Html += '</div>';
            Html += '</div>';

            /*Size*/
            Html += '<div class="card" style="margin-top: 10px;">';
            Html += '<div class="card-body">';
            Html += '<h4 class="card-title">Size</h4>';
            Html += '<?php echo $sizeCheckbox;?>';
            Html += '</div>';
            Html += '</div>';

            Html += '</div>';
            /*Filters Start Here*/

            /*Filters Data Start Here*/
            Html += '<div class="col-lg-8">';

            Html += '<div class="container">';
            Html += '<div class="row appended-card-data">';
            Html += '</div>';
            Html += '</div>';

            Html += '</div>';
            Html += '</div>';
            Html += '</div>';
            Html += '</div>';
            Html += '</div>';
            Html += '</div>';
            Html += '</div>';
            Html += '</div>';          

            document.getElementsByClassName('appended-search')[0].innerHTML = "";
            document.getElementsByClassName('appended-search')[0].innerHTML = Html;

             //document.getElementsByClassName('appended-ui')[0].innerHTML = "";          
             //document.getElementsByClassName('appended-ui')[0].innerHTML = suggestion;
            //$('.appended-ui').empty();
            //$('.appended-ui').append(suggestion);

            
            setTimeout(function(){ 
              var x = document.getElementsByClassName('counter');
              var services = x.item(0).defaultValue;

              document.getElementsByClassName('search-counter')[0].innerHTML = '<b>'+services + ' results for ' + search +'</b>';

             }, 1000);

        }
        else
        {
            document.getElementsByClassName('appended-search')[0].innerHTML = "";
        }
      }


    </script>


  </body>
</html>