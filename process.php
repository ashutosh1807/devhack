<?php    
if(isset($_POST['SubmitButton'])){ //check if form was submitted
  $input = $_POST['myRange']; //get input text
  $message = "Success! You entered: ".$input;
}    
?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 20%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}
</style>

<script type="text/javascript">

// jQuery plugin to prevent double submission of forms
jQuery.fn.preventDoubleSubmission = function() {
    
  $(this).on('submit',function(e){
    var $form = $(this);

    if ($form.data('submitted') === true) {
      // Previously submitted - don't submit again
      e.preventDefault();
    } else {
      // Mark it so that the next submit can be ignored
      $form.data('submitted', true);
    }
  });

  // Keep chainability
  return this;
};

$('#thisform').preventDoubleSubmission();


</script>


</head>
<body>    

<div class="""slidecontainer">

<form action="" method="post" id ="thisform" name="thisform">
<?php echo $message; ?>
<input type="range" min="1" max="10" value="50" class="slider" id="myRange" name="myRange">
  <input type="submit" name="SubmitButton"/>
</form>
</div>





</body>
</html>