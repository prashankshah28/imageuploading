<?php
 if($_POST["action"] == "search" ){
   ?>
   <thead>
         <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Option</th>
         </tr>
         </thead>
               <tbody>
                  <tr>
                     <?php

                        include 'connection.php';
                        $image_name = $_POST["search_name"];
                        $fetchData = "SELECT * FROM imagedata where name LIKE '%$image_name%'";
                        $result = mysqli_query($conn, $fetchData);
                        while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>" . "<td>" . $row['name'] .  "</td>";
                        echo '<td><img src="images/'  . $row['image_path'] .'" height="100" width="100"></td>';
                        echo "<td><button  class = 'btn btn-danger' id='delete_file' onclick='delete_img(". $row['id'].")'>Delete</button></td></tr>";
                        }
                     }
     
                     ?>
               </tbody>

