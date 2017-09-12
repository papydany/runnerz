<!DOCTYPE html>
<html lang="en-US">
 <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    @include('partial._header')
                 
    
   </head>
   <body class="style-4" style="background: #fafafa;">

    <!-- LOADER -->
    <div id="loader-wrapper">
        <div class="bubbles">
            <div class="title">loading</div>
            <span></span>
            <span id="bubble2"></span>
            <span id="bubble3"></span>
        </div>
    </div>

  

        <div class="content-center fixed-header-margin">
      <!-- TOP NAV WITH LOGO -->
     
       @include('partial._navigation')
   
 <div class="content-push" style="min-height: 400px;"> 

  @include('partial._message')
 
@yield('content')

      </div>

        </div>
        <div class="clear"></div>

     @include('partial._footer')
     
       
      <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/idangerous.swiper.min.js"></script>
    <script src="js/global.js"></script>

    <!-- custom scrollbar -->
    <script src="js/jquery.mousewheel.js"></script>
    <script src="js/jquery.jscrollpane.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script src="{{URL::to('parsley.min.js')}}"></script>
    <script>
    $(document).ready(function(){


$("#state").change( function() {
 
  $("#myModal").modal();  
var id =$(this).val();

   $.getJSON("/postlga/"+id, function(data, status){
    var $lga = $("#lga");
    $lga.empty();
    $lga.append('<option value="">Select LGA</option>');
   $.each(data, function(index, value) {
   $lga.append('<option value="' +value.id +'">' + value.lga_name + '</option>');
  });
  $("#myModal").modal("hide");
    });


});

});
    </script>
 <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/591035b44ac4446b24a6dc85/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->   
</body>
</html>