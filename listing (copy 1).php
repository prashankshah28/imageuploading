<html>
   <head>
      <title>
      </title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- js notify  -->
      <script type="text/javascript" src="js/notify.min.js"></script>
      <script type="text/javascript" src="js/notify.js"></script>
   </head>
   <body>

     <div class = "ui-widget">
         <p>Type "a" or "s"</p>
         <label for = "automplete-1">Tags: </label>
         <input id = "automplete-1">
      </div>
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
 
function delete_img(id)
{
//    alert("hey");
    var image_id = id;
    //alert(image_id);
    if(confirm("Are you sure you want to delete this?")){
    delete_image(image_id);
    }
}
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
            var availableTutorials  =  [
               "ActionScript",
               "Bootstrap",
               "C",
               "C++",
            ];
            $( "#automplete-1" ).autocomplete({
               source: availableTutorials
            });
         });
      </script>