<?php
	$resultData = array();
	$sFilter = '';
	include "./getData.php";
	$sSearchData = '';
	$data = array();
	$getData = new getData();

	if(isset($_REQUEST['search']))
	{
		$searchData = $_REQUEST['search'];

		$data = $getData->getAllData($searchData);

		if(!empty($data))
		{
			$sSearchData .= '<input type="hidden" name="counter" class="counter" value='.count($data).'>';
			foreach ($data as $key => $value) 
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
		
		$filter = $getData->getDistinctOptions($searchData);

		if(!empty($filter))
		{
			foreach ($filter as $key => $value) 
			{
				$value = trim($value);
				
				$sFilter .= '<li class="form-control selected_item" style="cursor:pointer;"  onclick="getSuggestionItem()">'.$value.'</li>';
			}
		}


		$resultData[] = $sSearchData;
		$resultData[] = $sFilter;
		echo json_encode($resultData);

		// return $resultData;
		// echo "<pre>";

		// print_r($resultData);
		// echo $sSearchData;

	}

?>