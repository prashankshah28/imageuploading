<html>
   <head>
      <title>
      </title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


      <!-- jQuery library -->
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- Popper JS -->
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      
        <!-- jQuery UI library -->
    

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <!-- jQuery UI library -->
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

      <!-- js notify  -->
      <script type="text/javascript" src="js/notify.min.js"></script>
      <script type="text/javascript" src="js/notify.js"></script>

   </head>
   <body>

<br>
      <div class="col-md-12">
          <h2 class="text-center">All Uploaded Images</h2>
      </div>
      <div class="container">
        <div class="col-md-6 float-right">
        <a href="index.php"  class="btn btn-primary float-right">Click here For add Image </a>
      </div>
      <div class="col-md-6">
        <input type="text" name="search" id="search"/>
        <input type="submit" value="Search" class="btn-primary" onclick='search_name()' />
    </div>

      </div>

<br>

      <div class="container">
         <div class="table-responsive">
            <table class="table table-striped table-bordered" id="imageData">
            </table>
         </div>
      </div>
   </body>
</html>
<script>

//Delete Function For Delete Image
function delete_img(id)
{
//    alert("hey");
    var image_id = id;
    //alert(image_id);
    if(confirm("Are you sure you want to delete this?")){
    delete_image(image_id);
    }
}
//call by delete_img
function delete_image(image_id)
{

    $.ajax({
    url: 'delete.php',
    type: 'POST',
    data:{
    delete_image:'delete_image',
    image_id:image_id,
  },
  success:function(response) {
   if(response=="Delete Successfully")
   {
//        $.notify("Hello World");
        
        load_image_list();
        $.notify("Delete Successfully", "success");
        //window.location = "listing.php";
//    document.location.reload();   
   }
  }
 });
}
 function load_image_list()
 {
  var action = "fetch";
  $.ajax({
   url:"displayImages.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
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
    success:function(data)
   {
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
        source: "searchimage.php",
    });
});

</script>
