<html>
   <head>
      <title>
         Image Uploading
      </title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <!-- Jquery Validator -->     
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
   </head>
   <body>
      <div class="container">
         <h3 class="center">
            Image Upload 
         </h3>
         <form method="post" action="upload.php" enctype="multipart/form-data">
            <div class="form-group">
               <div class="custom-file">
                  <input type="file" name = "fileToUpload" class="custom-file-input" id="customFile" 
                     data-validation="mime size" 
                     data-validation-allowing="jpg, png , jpeg , gif" 
                     data-validation-max-size="300kb" 
                     required>
                  <label class="custom-file-label" for="customFile">Choose file</label>
               </div>
            </div>
            <div class="form-group">
              <input type="text" name="image_title" id="image_title" class="form-control input-sm"
                         placeholder="Image Title*"
                      required>
            </div>
            <div class="form-group">
               <input type="submit" id="btn-submit" name="upload"
                  value="Upload" class="btn btn-primary">
                  <a href="listing.php"  class="btn btn-primary float-right">Click here For List Image </a>
            </div>
         </form>
      </div>
   </body>
</html>
<script>
   $.validate({
     modules : 'file',
   }); 
</script>
<script>
   // Add the following code if you want the name of the file appear on select
   $(".custom-file-input").on("change", function() {
     var fileName = $(this).val().split("\\").pop();
     $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
   });
</script>