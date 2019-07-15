<?php
if(isset($_POST["action"])){
 if($_POST["action"] == "fetch"){
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
                        $fetchData = "SELECT * FROM imagedata";
                        $result = mysqli_query($conn, $fetchData);
                        while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>" . "<td>" . $row['name'] .  "</td>";
                        echo '<td><img src="images/'  . $row['image_path'] .'" height="100" width="100"></td>';
                        echo "<td><button  class = 'btn btn-danger' id='delete_file' 
                        onclick='delete_img(". $row['id'].")'>Delete</button></td></tr>";
                        }
                     }
                  }?>
               </tbody>