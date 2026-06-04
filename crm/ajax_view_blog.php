<?php
// die('nimra');

require 'includes/conn.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

## Read value

$draw = $_POST['draw'];

$row = $_POST['start'];

$rowperpage = $_POST['length']; // Rows display per page

$columnIndex = $_POST['order'][0]['column']; // Column index

$columnName = $_POST['columns'][$columnIndex]['data']; // Column name

$columnSortOrder = 'desc'; // asc or desc

$searchValue = $_POST['search']['value']; // Search value



## Custom Field value

$date_from = $_POST['date_from'];
$date_to = $_POST['date_to'];

## Search

$searchQuery = " ";

if($date_from != '' && $date_to !=''){

  $searchQuery .= " and `date` <= '".$date_from."' AND `date` <= '".$date_to."' ";

}
// echo $searchQuery;
// die;
if($searchValue != ''){

 $searchQuery .= " and (title like '%".$searchValue."%' or

 subject like '%".$searchValue."%' or

 description like '%".$searchValue."%' or 

 author like '%".$searchValue."%') ";

}

## Total number of records without filtering
// var_dump($searchQuery);

$sel = mysqli_query($con,"select count(*) as allcount from blogs");

$records = mysqli_fetch_assoc($sel);

$totalRecords = $records['allcount'];



## Total number of records with filtering

$sel = mysqli_query($con,"select count(*) as allcount from blogs WHERE 1 ".$searchQuery);

$records = mysqli_fetch_assoc($sel);

$totalRecordwithFilter = $records['allcount'];



## Fetch records

$empQuery = "select * from blogs WHERE 1 ".$searchQuery." order by ".$columnName."  ".$columnSortOrder." limit ".$row.",".$rowperpage;
// echo $empQuery;
// die;

$empRecords = mysqli_query($con, $empQuery);

$data = array();

$sr_no =$_POST['start']+1;

while ($fetch1 = mysqli_fetch_assoc($empRecords)) {
 
  $data[] = array(

   "id"=>"<td class='all_brands'><div class='srno'>".$sr_no."</div></td>",
   "srno"=>"<td class='all_brands'><div class='brand_logo'><img src='admin/uploads/".$fetch1['image']."' height='200' width='200' alt='blog_feature_image'></div></td>",
   "pickup_deatil"=>"<td>".$fetch1['title']."</td>",

   "order_detail"=>"<td><div class='listing_boxes'><h4>".$fetch1['date']."</h4></div></td>",

   "tracK_image"=> "<td><div class='cod_imgbox'>".$fetch1['subject']."</div></td>",

   "delivery_detail"=>"<td><div class='listing_boxes'></div></td>",

   "orgin_destination"=>"<td><div class='from_to1'></div></td>",

   "action"=>"<td></td>",

   "payment"=>"<td></td>",
 );
  $sr_no ++;
}

## Response

$response = array(

  "draw" => intval($draw),

  "iTotalRecords" => $totalRecords,

  "iTotalDisplayRecords" => $totalRecordwithFilter,

  "aaData" => $data

);
// echo '<pre>';
// print_r($response);
// die;

echo json_encode($response);
