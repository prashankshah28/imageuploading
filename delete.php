<?php
include 'connection.php';
if(isset($_POST['delete_image']))
{
 	$image_id=$_POST['image_id'];
    $query = "DELETE FROM imagedata WHERE id=".$image_id;
    $select_image = "SELECT image_path FROM imagedata WHERE id=".$image_id;
    $select_imageData = mysqli_query($conn,$select_image);
    $image_path = mysqli_fetch_assoc($select_imageData); 
    //for Directory
    $image_name = "images/" . $image_path['image_path'];
    //Delete File From Directory
    unlink($image_name);
    mysqli_query($conn,$query);
    echo "Delete Successfully";
}
?>