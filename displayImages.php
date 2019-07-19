<table class="table table-striped table-bordered" id="imageData1">
<?php
if (isset($_POST["action"])) {
    if ($_POST["action"] == "fetch") {
        ?>
   <thead>
         <tr>
            <th><i class="arrow up"><i class="arrow down">Title</th>
            <th>Image</th>
            <th>Option</th>
         </tr>
         </thead>
               <tbody>
                  <tr>
                     <?php
          include 'connection.php';
        if (isset($_POST["pageno"])) {
            $pn = $_POST["pageno"];
        } else {
            $pn = 1;
        }
        $limit = 2;
        $start_from = ($pn - 1) * $limit;
        $total_pages_sql = "SELECT COUNT(*) FROM imagedata";
        $result_count = mysqli_query($conn, $total_pages_sql);
        $total_rows = mysqli_fetch_array($result_count)[0];
        $total_pages = ceil($total_rows / $limit);
        $sortorder = $_POST["sortorder"];
        if($sortorder == "A-Z"){
            $fetchData = "SELECT * FROM imagedata ORDER BY name ASC LIMIT $start_from, $limit ";
        }
        else{
            $fetchData = "SELECT * FROM imagedata  ORDER BY name DESC LIMIT $start_from, $limit";
        }
        $result = mysqli_query($conn, $fetchData);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>" . "<td>" . $row['name'] . "</td>";
            echo '<td><img src="images/' . $row['image_path'] . '" height="100" width="100"></td>';
            echo "<td><button  class = 'btn btn-danger' id='delete_file'
            onclick='delete_img(" . $row['id'] . ")'>Delete</button></td></tr>";
        }
    }
}
?>
         </tbody>
         </table>
         <ul class="pagination">
         <li><a href="listing.php?pageno=1">First</a></li>
         <li class="<?php if ($pn <= 1) {echo 'disabled';}?>">
            <a href="<?php if ($pn <= 1) {echo '#';} else {echo "listing.php?pageno=" . ($pn - 1);}?>">Prev</a>
         </li>
         <li class="
         <?php
         if ($pn >= $total_pages) {echo 'disabled';}?>">
            <a href="<?php if ($pn >= $total_pages) {echo '#';} else {echo "listing.php?pageno=" . ($pn + 1);}?>">Next</a>
         </li>
         <li><a href="listing.php?pageno=<?php echo $total_pages; ?>">Last</a></li>
      </ul>
