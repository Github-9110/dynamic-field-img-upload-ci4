<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
 <div class="col-lg-8 m-auto mt-4">
    <h4>Dynamic ajax slider</h4>
 <div class="row p-1" id="sliders">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" id="a" src="" height="400" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" id="b" src="" height="400" alt="Second slide">
        </div>
    </div>
    </div>  
    </div>
 </div>


    <input type="hidden" id="u" value="<?= base_url('uploads/') ?>">
<script>  
$(document).ready(function(){
$.ajax({
    url: "ajax-slider",
    success: function(data){
        $.each(data.footers,function(key,value){
           if(key == 0){
          $('#a').attr('src',$('#u').val()+value['image']);
           }else{
            $('#b').attr('src',$('#u').val()+value['image']);
           }
           
          });
    
    }
});
});
</script>
</body>
</html>