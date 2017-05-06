  <!doctype html>
  <html>
  <head>
    @include('includes.head')

    
  </head>
  <body>

    <?php $headerstyle = Config::get('constants.headerstyle') ?>
    @if($headerstyle=='light')
    @include('includes.headerlight')
    @else
    @include('includes.header')
    @endif

    @yield('content')

    @include('includes.footer')
    

  
    
    <script src="<?php echo url(); ?>/js/vendor/jquery.js"></script>
    <script src="<?php echo url(); ?>/js/vendor/jquery.easing.1.3.js"></script>
    <script src="<?php echo url(); ?>/js/vendor/bootstrap.js"></script>

    <script src="<?php echo url(); ?>/js/vendor/jquery.flexisel.js"></script>
    <script src="<?php echo url(); ?>/js/vendor/wow.min.js"></script>
    <script src="<?php echo url(); ?>/js/vendor/jquery.transit.js"></script>
    <script src="<?php echo url(); ?>/js/vendor/jquery.jcountdown.js"></script>
    <script src="<?php echo url(); ?>/js/vendor/jquery.jPages.js"></script>
    <script src="<?php echo url(); ?>/js/vendor/owl.carousel.js"></script>

    <script src="<?php echo url(); ?>/js/vendor/responsiveslides.min.js"></script>
    <script src="<?php echo url(); ?>/js/vendor/jquery.elevateZoom-3.0.8.min.js"></script>

    <!-- jQuery REVOLUTION Slider  -->
    <script type="text/javascript" src="<?php echo url(); ?>/js/vendor/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo url(); ?>/js/vendor/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?php echo url(); ?>/js/vendor/jquery.scrollTo-1.4.2-min.js"></script>

    <!-- Custome Slider  -->
    <script src="<?php echo url(); ?>/js/main.js"></script>

    
    <script type="text/javascript">

      


     $(document).ready(function(){
      $('#subscribe').click(function(e){
             e.preventDefault(); // this prevents the form from submitting
             $.ajax({
              url: '/subscribe',
              type: "post",
              data: {'subscribe_email':$('input[name=subscribe_email]').val(), '_token': $('input[name=_token]').val()},
              dataType: 'JSON',
              success: function (data) {
              console.log(data); // this is good
            }
          });
           });
    });


     
     
     function isNumberKey(evt){
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }

  </script>     
  
</body>


</html>
