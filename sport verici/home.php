
<script src='jquery.min.js'></script>
<script>
var i=0;
$(document).ready(function () {
 $('.slidertitle, #slider img').hide();
 showNextImage();
  setInterval('showNextImage()', 3000);
    });
    function showNextImage() {
  i++;
              $('#sliderImage' + i).appendTo('#slider').fadeIn(1100).delay(1100).fadeOut(1100);
     $('#title' + i).appendTo('#slider').fadeIn(1100).delay(1100).fadeOut(1100);
  if(i==3){
   i=0;
  }
    };
</script>
<style type="text/css">
#slider {
 padding:10px 0 10px;
 position:center;
 width:500px;
 height:250px;
}
#slider img{
 width:500px;
 height:275px;
 position:absolute;
 -webkit-border-radius:5px 5px 5px 5px;
 border-radius:5px;
 -moz-border-radius:5px 5px 5px 5px;
}
.slidertitle{
 width:600px;
 margin-top:265px;
 text-align:center;
 position:absolute;
 padding:10px;
 -webkit-border-radius:0px 0px 5px 5px;
 border-radius:0px 0px 5px 5px;
 -moz-border-radius:5px 5px 5px 5px;
 color:#FFF;
 background-color:rgba(12, 22, 23, 0.50);
}
</style>

<center>
<div id="slider">
 
<img id="sliderImage1"
src="images/01.jpg">  
    
<img id="sliderImage2"
src="images/02.jpg">
           
<img id="sliderImage3"
src="images/03.jpg">
        <img id="sliderImage3"
src="images/04.jpg">
</div>