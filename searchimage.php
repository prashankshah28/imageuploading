<?php
include 'connection.php';
// Get search term
$searchTerm = $_GET['term']; 
// Fetch matched data from the database 
$fetchData = ("SELECT * FROM imagedata where name LIKE '%$searchTerm%' ORDER BY name ASC");
$result = mysqli_query($conn, $fetchData);
$imageName = array(); 
if($result->num_rows > 0){ 
    while($row = $result->fetch_assoc()){ 
        $data['id'] = $row['id']; 
        $data['name'] = $row['name']; 
        array_push($imageName, $data['name']); 
    } 
}
// Return results as json encoded array 
//print(json_encode($imageName)); 
echo json_encode($imageName);
?>