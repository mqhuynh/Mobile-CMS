<?php
require_once('core/config.php'); // to use the connection setting from the config.php file
require_once('core/helpers.php'); // file containing functions to check data validity and other util functions
$connection = new mysqli($server, $username, $password, $database);
if(mysqli_connect_errno()){
    echo "Connection could not be established";
    exit();
}
$url_id = isset($_GET["id"])?$_GET["id"]:NULL; // get the value of id from url
$query = 'SELECT * FROM '.$table;
$result = $connection->query($query);
$all_data =array(); // all data from database as an array
$specific = array(); // specific data row from table
$name_list = array(); // list of the key field of rows, eg. service name
$fieldname = array(); // array of field names
$datatype = array(); // array of data types corresponding to different fields 
$searchable = array(); // array of searchable fields
$search_keys = array(); // array of searchable field keys
$name_keys = array(); // array of keys of field with data-type "name"
$i = 0; // counter for row
$m = 0; // counter for actual data rows
while ($row = $result->fetch_array(MYSQLI_NUM)) // scan all the table
{
    //According to convention, the first row is going to store the field names, store as $fieldname.
    if($i == 0){
        $fieldname = $row;
    }
    //According to convention, the second row contains the data types corresponding the field, store as $datatype
    else if($i == 1){
        $datatype = $row;
    }

    //rest of the rows contain the actual data, store them as $all_data, indexed to be the key of the rows of the actual data. ($row[0] gives the key of the data.)
    // store the keys as $name_keys array.
    else{
        $all_data[$row[0]]= $row;
        $name_keys[$m++] = $row[0];
    }
    $i++;
}
// searching for a row that matches the id passed in the url
foreach ($all_data as $each_service){
    if(!strcmp($url_id, $each_service[0])){
        $specific = $each_service;
       break;
    }
}

// build array of searchable fields and another array with searchable keys
for($i = 0; $i < count($datatype); $i++){
    if(strpos($datatype[$i], "search_")!== FALSE){
        $searchable[$i] = $datatype[$i];
        $search_keys[$i] = $i;
    }
}

// find the index of field that has datatype "name", this is usually key field in the table
$name_index = 0;
foreach ($datatype as $key) {
    if(strpos($key,"name") !== false){
        break;
    }
    $name_index++;
}

// populate the name_list array with the names (or key fields).
foreach ($all_data as $key=>$value) {
    $name_list[$key] = $value[$name_index];
}
//echo $name_index;
//print_r($names);
//var_dump($all_data);
//print_r($name_list);
//print_r($specific);
//print_r($fieldname);
//print_r($datatype);
//print_r($searchable);
//print_r($search_keys);
//print_r($name_keys);

//closing the connection
$connection->close();
?>