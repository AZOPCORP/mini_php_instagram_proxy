<!DOCTYPE html>

<html>

<head>
<script type="text/javascript"   src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.js"></script>


<style>
body{

color:#000;
background: #030;
padding:auto;
}
#output{
display:block;
	border: :3px solid #000;
	float:left;
}
#wrapper{

	padding:2em;
}
</style>

</head>

<body>
<div id="wrapper">
<div id="container"></div>
<canvas id="output"  >
Your browser do not support canvas!
</canvas>

<br>
<br>
<input type="text" id="instagram_url" name="instagram_url">
<button id="ok">send</button>
<script>
 $("#ok").click(function(){
                                        
var dataString = $("#instagram_url").val();
$.ajax({
    type: "POST",
    url: 'getisimg.php',
    data: {uri : dataString},
    success: function (data) {
       
$('#container').html(data);


}
});




                                    });



</script>


<br>
</div>


</body>

</html>
