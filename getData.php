<?php
if(!isset($_SESSION)) 
{ 	
	session_start(); 
} 
class getData{

	public function getDataById($id = null)
	{
		$data = array();
		include './database/connection.php';
		
		$sql = "SELECT id, product_id, brand, color, size, price,sold FROM collections WHERE id = '$id'";
		
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
		    while($row = $result->fetch_assoc()) 
		    {
		    	$data['id'] = $row['id'];
		    	$data['product_id'] = $row['product_id'];
		    	$data['brand'] = $row['brand'];
		    	$data['color'] = $row['color'];
		    	$data['size'] = number_format($row['size'],1);
		    	$data['price'] = number_format($row['price'],2);
		    	$data['sold'] = $row['sold'];
		    }
		}
		else
		{
			header('Location: create-collection.php');
		}
		include './database/connection_close.php';

		return $data;
	}

	/*Delete Data*/
	public function deleteDataById($id = null)
	{
	    $dNow = date('F j, Y h:i a');
		include './database/connection.php';
	    include './writefile.php';
	    $file = new WriteFile();


		// sql to delete a record
		$sql = "DELETE FROM collections WHERE id=$id";

		if ($conn->query($sql) === TRUE) 
		{
            $text = $id.' has been deleted on '.$dNow;
            $file->fwrite('logfile',$text);

            $_SESSION['success'] = '<strong>Success!</strong> Record Deleted Successfully.';          
		} 
		else 
		{
            $_SESSION['error'] = '<strong>Error!</strong> Record Not Found.';          
		}

		include './database/connection_close.php';
		
		header('Location: create-collection.php');

	}

	/*Get Brands*/
	public function getBrands()
	{
		include './database/connection.php';
		$brandArray = array();

		

	if(isset($_GET['asc'])=='brand')
	{
		$sql = 'SELECT
    brand , COUNT(*)
FROM
    collections
GROUP BY
    brand
HAVING 
    COUNT(*) > 1 order by  COUNT(*) asc';
	}
	elseif(isset($_GET['desc'])=='brand')
	{
		$sql = 'SELECT
    brand , COUNT(*)
FROM
    collections
GROUP BY
    brand
HAVING 
    COUNT(*) > 0 order by  COUNT(*) desc';
	}
	else
	{
		$sql = "SELECT brand from collections GROUP BY brand order by brand";
	}
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) 
		    {
		    	$brandArray[] = $row['brand']; 
		    }
		}

		include './database/connection_close.php';

		return $brandArray;

	}
	

	/*Get Colors*/
	public function getColors()
	{
		include './database/connection.php';
		$colorArray = array();

		
		if(isset($_GET['asc'])=='color')
	{
		$sql = 'SELECT
    color , COUNT(*)
FROM
    collections
GROUP BY
    color
HAVING 
    COUNT(*) > 1 order by  COUNT(*) asc';
	}
	elseif(isset($_GET['desc'])=='color')
	{
		$sql = 'SELECT
    color , COUNT(*)
FROM
    collections
GROUP BY
    color
HAVING 
    COUNT(*) > 0 order by  COUNT(*) desc';
	}
	else
	{
		$sql = "SELECT color from collections GROUP BY color ORDER BY color ASC";
	}
		
		

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) 
		    {
		    	$colorArray[] = $row['color']; 
		    }
		}


		include './database/connection_close.php';

		return $colorArray;

	}

	/*Get Size*/
	public function getSize()
	{
		include './database/connection.php';
		$sizeArray = array();

		
		
		if(isset($_GET['asc'])=='size')
	{
		$sql = 'SELECT
    size , COUNT(*)
FROM
    collections
GROUP BY
    size
HAVING 
    COUNT(*) > 1 order by  COUNT(*) asc';
	}
	elseif(isset($_GET['desc'])=='size')
	{
		$sql = 'SELECT
    size , COUNT(*)
FROM
    collections
GROUP BY
    size
HAVING 
    COUNT(*) > 0 order by  COUNT(*) desc';
	}
	else
	{
		
		$sql = "SELECT size from collections GROUP BY size ORDER BY size ASC";
	}

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) 
		    {
		    	$sizeArray[] = number_format($row['size'] , 1); 
		    }
		}


		include './database/connection_close.php';

		return $sizeArray;

	}

	/*Get Search Filtered Data*/
	public function getAllData($search = null)
	{
		$allData = array();
		$iCounter = 0;
		include './database/connection.php';
		$sql = "SELECT product_id, brand, size, price, color, sold from collections WHERE product_id LIKE '%".$search."%' OR brand LIKE '%".$search."%' OR color LIKE '%".$search."%' OR size LIKE '%".$search."%'";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
		    // output data of each row
		    while($row = $result->fetch_assoc()) 
		    {
		    	$allData[$iCounter]['product_id'] = $row['product_id']; 
		    	$allData[$iCounter]['brand'] = $row['brand']; 
		    	$allData[$iCounter]['size'] = $row['size']; 
		    	$allData[$iCounter]['price'] = $row['price']; 
		    	$allData[$iCounter]['color'] = $row['color']; 
		    	$allData[$iCounter]['sold'] = $row['sold']; 
		    	$iCounter++;
		    }
		}
		include './database/connection_close.php';

		return $allData;

	}

	/*Credentials*/
	public function login($email = null, $password = null)
	{
		$sql = 'SELECT email,name FROM user WHERE email = "'.$email.'" AND password = "'.$password.'"';

		
		include './database/connection.php';
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			$result2 = $conn->query($sql);
			while($row = $result2->fetch_assoc()) 
			{
				$_SESSION['email'] = $row['email'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['success'] = "<strong>Success!</strong> Login Successfully!";
			}

			return $result->num_rows;			
		}
		else
		{
			session_destroy();
			return 0;
		}

		include './database/connection_close.php';

	}



	/*Get Distinct Filtered Option*/
	public function getDistinctOptions($search = null)
	{
		$allData = array();
		$iCounter = 0;
		include './database/connection.php';
		$sql = "SELECT distinct(product_id) from collections WHERE product_id LIKE '%".$search."%'";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
		    // output data of each row
		    while($row = $result->fetch_assoc()) 
		    {
				
				$sql = "SELECT * from collections WHERE product_id = '".$row['product_id']."'";
				$res = $conn->query($sql);
		
		
		    	$allData[$iCounter] = $row['product_id'].'('.mysqli_num_rows($res).')'; ; 
		    	$iCounter++;
		    }
		}

		$sql = "SELECT distinct(brand) from collections WHERE brand LIKE '%".$search."%'";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
		    // output data of each row
		    while($row = $result->fetch_assoc()) 
		    {
				$sql = "SELECT * from collections WHERE brand = '".$row['brand']."'";
				$res = $conn->query($sql);
		
		    	$allData[$iCounter] = $row['brand'].'('.mysqli_num_rows($res).')'; 
		    	$iCounter++;
		    }
		}

		$sql = "SELECT distinct(size) from collections WHERE size LIKE '%".$search."%'";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
		    // output data of each row
		    while($row = $result->fetch_assoc()) 
		    {
				
				$sql = "SELECT * from collections WHERE size = '".$row['size']."'";
				$res = $conn->query($sql);
				
		    	$allData[$iCounter] = $row['size'].'('.mysqli_num_rows($res).')'; 
		    	$iCounter++;
		    }
		}

		$sql = "SELECT distinct(color) from collections WHERE color LIKE '%".$search."%'";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
		    // output data of each row
		    while($row = $result->fetch_assoc()) 
		    {
				
				$sql = "SELECT * from collections WHERE color = '".$row['color']."'";
				$res = $conn->query($sql);
				
		    	$allData[$iCounter] = $row['color'].'('.mysqli_num_rows($res).')';  
		    	$iCounter++;
		    }
		}

		include './database/connection_close.php';

		return $allData;
	}

}


?>