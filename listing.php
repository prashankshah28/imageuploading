<html>
<head>
  <title>
  </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- jQuery UI library -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  
  <!-- jQuery Autocomplete -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- js notify  -->
  <script type="text/javascript" src="js/notify.min.js"></script>
  <script type="text/javascript" src="js/notify.js"></script>
  <style>
    .search{
      background-color: blue;
    }
  </style>
</head>
<body>
<?php
if (isset($_GET["pageno"])) {
  $pn  = $_GET["pageno"];
  echo "<input type='hidden' id='pageno' name='pageno' value='$pn'>"
?>
<?php
}  
else {
  $pn = 1;
  echo "<input type='hidden' id='pageno' name='pageno' value='$pn'>";
}
?>

  <br>
  <div class="col-md-12">
    <h2 class="text-center">All Uploaded Images</h2>
  </div>
  <div class="container">
    <div class="form-group">  
      <div class="col-md-6 float-right">
      <a href="index.php"  class="btn btn-primary float-right">Click here For add Image </a>
      </div>
      <div class="col-md-6">
      <input type="text" name="search" id="search"/>
      <input type="submit" value="Search" class="btn-primary" onclick='search_name()' />
      <input type="reset" value="Reset" onclick="reset()" />
      </div>
  </div>
</div>
  <br>
<div class="container">
  <div class="form-group">
    <div class="col-md-9">
    </div>
    <div class="col-md-3">
      <select class="form-control" id="sortorder" onchange="load_image_list()">
        <option>A-Z</option>
        <option>Z-A</option>
     </select>
    </div>
    </div>
</div>
    <br>
  <div class="container" id = "imageData">
   
  </div>
</body>
</html>
<script>

function reset(){
   document.getElementById("search").value = "";
}
//Delete Function For Delete Image
function delete_img(id){
//    alert("hey");
var image_id = id;
    //alert(image_id);
    if(confirm("Are you sure you want to delete this?")){
      delete_image(image_id);
    }
  }
//call by delete_img
function delete_image(image_id){

  $.ajax({
    url: 'delete.php',
    type: 'POST',
    data:{
      delete_image:'delete_image',
      image_id:image_id,
    },
    success:function(response) {
    if(response=="Delete Successfully"){
//        $.notify("Hello World");
        $.notify("Delete Successfully", "success");
        load_image_list();
        
                //window.location = "listing.php";
        //    document.location.reload();
      }
    }
  });
}
function load_image_list(){
  var sortorder = document.getElementById("sortorder").value;
  var action = "fetch";
  var pageno = document.getElementById("pageno").value;
  $.ajax({
  url:"displayImages.php",
  method:"POST",
  data:{action:action, pageno:pageno, sortorder:sortorder},
  success:function(data){
    $('#imageData').html(data);
    }
  });
};
</script>
<script>
  function search_name(){
    var search_name = document.getElementById("search").value;
    //alert(search_name);
    var action = "search";
    $.ajax({
      url:"search.php",
      method:"POST",
      data:{action:action,search_name:search_name},
      success:function(data){
//    alert(data);
        $('#imageData').html(data);
      }
  });
};
load_image_list();
</script>
<script>
  $(function() {
    $("#search").autocomplete({
      classes : {
        "ui-autocomplete" : "search"
      },
      source: "searchimage.php"
     
    });
});
</script>
<script>
  $("#myHref").on('click', function() {
   alert("hey") 
});

<script>