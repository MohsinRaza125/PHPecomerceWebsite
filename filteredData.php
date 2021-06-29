<?php

$abrands = array();
$acolors = array();
$asize = array();
$sSearchData = '';
$CounterData = '';
if(array_key_exists('brand', $_REQUEST))
	$brands = $_REQUEST['brand'];
if(array_key_exists('colors', $_REQUEST))
	$colors = $_REQUEST['colors'];
if(array_key_exists('size', $_REQUEST))
	$size = $_REQUEST['size'];

    
include './getData.php';

if(!empty($brands)) $abrands = explode(',', $brands);
if(!empty($colors)) $acolors = explode(',', $colors);
if(!empty($size)) $asize = explode(',', $size);

		
//$getData = new getData();
function getFilteredData($brands = null, $colors = null, $size = null)
	{
		$sBrands = '';
		$sColors = '';
		$sSize = '';
		$filteredData = array();
		$iCounter = 0;

		if(count($brands) > 0)
		{
			$sBrands = 'brand IN(';
			foreach ($brands as $key => $value) 
			{
				$sBrands .= '"'.$value .'",';
			}
			$sBrands = substr($sBrands, 0, -1);
			$sBrands .= ')';
		}



		if(count($colors) > 0)
		{
			if(count($brands) > 0)
				$sColors = ' AND ';
			$sColors .= 'color IN(';
			foreach ($colors as $key => $value) 
			{
				$sColors .= '"'.$value.'",';
			}
			$sColors = substr($sColors, 0, -1);
			$sColors .= ')';
		} 

		if(count($size) > 0)
		{
			if(count($colors) > 0)
				$sSize = ' AND ';
			$sSize .= 'size IN(';
			foreach ($size as $key => $value) 
			{
				$sSize .= $value .',';
			}
			$sSize = substr($sSize, 0, -1);
			$sSize .= ')';
		}			

		if(count($brands) > 0 || count($colors) > 0 || count($size))
		{
			$sql = "SELECT product_id, brand, color, size, price, sold FROM collections WHERE $sBrands $sColors $sSize";

			include './database/connection.php';

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) 
			    {
			    	$filteredData[$iCounter]['product_id'] = $row['product_id']; 
			    	$filteredData[$iCounter]['brand'] = $row['brand']; 
			    	$filteredData[$iCounter]['size'] = $row['size']; 
			    	$filteredData[$iCounter]['price'] = $row['price']; 
			    	$filteredData[$iCounter]['color'] = $row['color']; 
			    	$filteredData[$iCounter]['sold'] = $row['sold']; 
			    	$iCounter++;
			    }
			}

			include './database/connection_close.php';

			return $filteredData;			
		}
	}

$getFilteredData = getFilteredData($abrands, $acolors, $asize);
if(!empty($getFilteredData))
{
	$sSearchData .= '<input type="hidden" name="counter" class="counter" value='.count($getFilteredData).'>';
	foreach ($getFilteredData as $key => $value) 
	{
		$sSearchData .= '<div class="col-lg-6" style="margin-top:10px;">';
		$sSearchData .= '<div class="card">';
		$sSearchData .= '<div class="card-body">';

		$sSearchData .= '<div class="container">';
		$sSearchData .= '<div class="row">';
		$sSearchData .= '<div class="col-lg-7">';
		$sSearchData .= '<b>Product ID :</b>';
		$sSearchData .= '</div>';
		$sSearchData .= '<div class="col-lg-5">';
		$sSearchData .= $value['product_id'];
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';


		$sSearchData .= '<div class="container">';
		$sSearchData .= '<div class="row">';
		$sSearchData .= '<div class="col-lg-7">';
		$sSearchData .= '<b>Brand :</b>';
		$sSearchData .= '</div>';
		$sSearchData .= '<div class="col-lg-5">';
		$sSearchData .= $value['brand'];
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';


		$sSearchData .= '<div class="container">';
		$sSearchData .= '<div class="row">';
		$sSearchData .= '<div class="col-lg-7">';
		$sSearchData .= '<b>Size :</b>';
		$sSearchData .= '</div>';
		$sSearchData .= '<div class="col-lg-5">';
		$sSearchData .= number_format($value['size'],1);
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';

		$sSearchData .= '<div class="container">';
		$sSearchData .= '<div class="row">';
		$sSearchData .= '<div class="col-lg-7">';
		$sSearchData .= '<b>Price :</b>';
		$sSearchData .= '</div>';
		$sSearchData .= '<div class="col-lg-5">';
		$sSearchData .= number_format($value['price'],2);
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';

		$sSearchData .= '<div class="container">';
		$sSearchData .= '<div class="row">';
		$sSearchData .= '<div class="col-lg-7">';
		$sSearchData .= '<b>Color :</b>';
		$sSearchData .= '</div>';
		$sSearchData .= '<div class="col-lg-5">';
		$sSearchData .= $value['color'];
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';

		$sSearchData .= '<div class="container">';
		$sSearchData .= '<div class="row">';
		$sSearchData .= '<div class="col-lg-7">';
		$sSearchData .= '<b>Sold :</b>';
		$sSearchData .= '</div>';
		$sSearchData .= '<div class="col-lg-5">';
		$sSearchData .= $value['sold'];
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';
		
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';
		$sSearchData .= '</div>';
	}
}
else
{
	$sSearchData .= '<input type="hidden" name="counter" class="counter" value="0">';
}

echo $sSearchData;
	//$Dbrands = $dataCollection->getBrands(); 
				//$Dcolors = $dataCollection->getColors();
				//$Dsize = $dataCollection->getSize();
$dataCollection =  new getData();

			
					$CBrands = '1=1';
                    $CColors = '1=1';
                    $CSize = '1=1';
                    $selectedbrands = $selectedcolor = $selectedsize = array();
					//brand
                    if(!empty($brands)) {
                        $CBrands = '(';
                        foreach($abrands as $check) {
							//var_dump($abrands);
                            array_push($selectedbrands, $check);
							//echo ($check);
                            $CBrands = $CBrands . "brand='" . $check . "' OR ";									
                        }
                        $CBrands = substr($CBrands, 0, -3);		
                        $CBrands = $CBrands . ")";
                    } 
					//color
                    if(!empty($colors)) {
                        $CColors = '(';
                        foreach($acolors as $check) {
                            array_push($selectedcolor, $check);
							
                            $CColors = $CColors . "color='" . $check . "' OR ";									
                        }	
                        $CColors = substr($CColors, 0, -3);		
                        $CColors = $CColors . ")";
                    }
                    //Size
                    if(!empty($size)) {
                        $CSize = '(';
                        foreach($asize as $check) {
                            array_push($selectedsize, $check);
                            $CSize = $CSize . "size='" . $check . "' OR ";									
                        }	
                        $CSize = substr($CSize, 0, -3);		
                        $CSize = $CSize . ")";
                    }			
				$brandsqlCount = 'SELECT brand, Sum(IF((' . $CBrands . ' AND ' . $CColors . ' AND ' .  $CSize . '), 1, 0)) AS Total FROM collections GROUP BY brand';
                $colorsqlCount = 'SELECT color, Sum(IF((' . $CBrands . ' AND ' . $CColors . ' AND ' . $CSize . ' ), 1, 0)) AS Total FROM collections GROUP BY color';
                $sizesqlCount = 'SELECT size, Sum(IF((' . $CBrands . ' AND ' . $CColors . ' AND ' . $CSize . ' ), 1, 0)) AS Total FROM collections GROUP BY size';
               
				
			include './database/connection.php';
			//$result1 = mysqli_query($con, $brandsqlCount);
			$result1 = $conn->query($brandsqlCount);
			  echo('<div class="col-lg-4">');
			  echo('<div class="card">');
			  echo('<div class="card-body">');
			  echo('<h4 class="card-title">Brand</h4>');
			  if($result1)
			  {
				while($row = $result1 -> fetch_row())
				{
				 if (in_array($row[0], $selectedbrands)) {
                      echo('<div>');
					  echo('<span><input type="checkbox" class="custom-checkbox" name="brand[]" value="'.$row[0].'" onclick="checbox(this)"></span>');
					  echo('<span class="filters">'.$row[0].'('.$row[1].')</span>');
					  echo('</div>');
                     }   else {
						 
                      echo('<div>');
					  echo('<span><input type="checkbox" class="custom-checkbox" name="brand[]" value="'.$row[0].'" onclick="checbox(this)"></span>');
					  echo('<span class="filters">'.$row[0].'('.$row[1].')</span>');
					  echo('</div>');
					 }
				}
			  }
				include './database/connection_close.php';
			  echo ('</div>');
			  echo ('</div>');
			
			include './database/connection.php';
			$result2 = $conn->query($colorsqlCount);
				echo('<div class="card" style="margin-top: 10px;">');
				echo('<div class="card-body">');
				echo('<h4 class="card-title">Color</h4>');
				if($result2)
				{
				while($row = $result2 -> fetch_row())
				{
				 if (in_array($row[0], $selectedcolor)) {
					echo('<div>');
					echo('<span><input type="checkbox" class="custom-checkbox" name="colors[]" value="'.$row[0].'" onclick="checbox(this)"></span>');
					echo('<span class="filters">'.$row[0].'('.$row[1].')</span>');
					echo('</div>');
				 }	else {
						 
                      echo('<div>');
					  echo('<span><input type="checkbox" class="custom-checkbox" name="colors[]" value="'.$row[0].'" onclick="checbox(this)"></span>');
					  echo('<span class="filters">'.$row[0].'('.$row[1].')</span>');
					  echo('</div>');
					 }				 
				}
				}
				include './database/connection_close.php';
				echo ('</div>');
				echo ('</div>');
				include './database/connection.php';
				$result3 = $conn->query($sizesqlCount);
				echo('<div class="card" style="margin-top: 10px;">');
				echo('<div class="card-body">');
				echo('<h4 class="card-title">Size</h4>');
				if($result3)
				{
				while($row = $result3 -> fetch_row())
				{
				 if (in_array($row[0], $selectedsize)) {
					echo('<div>');
					echo('<span><input type="checkbox" class="custom-checkbox" name="size[]" value="'.$row[0].'" onclick="checbox(this)"></span>');
					echo('<span class="filters">'.$row[0].'('.$row[1].')</span>');
					echo('</div>');
				 }	else {
						 
                      echo('<div>');
					  echo('<span><input type="checkbox" class="custom-checkbox" name="size[]" value="'.$row[0].'" onclick="checbox(this)"></span>');
					  echo('<span class="filters">'.$row[0].'('.$row[1].')</span>');
					  echo('</div>');
					 }				 
				}
				}
				include './database/connection_close.php';
				echo ('</div>');
				echo ('</div>');
			echo('</div>');
			
		echo($brandsqlCount);
		echo($colorsqlCount);
		echo($sizesqlCount);
		


?>