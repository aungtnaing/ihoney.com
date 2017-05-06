<html lang="en" class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">``
        <![endif]-->
        <title>iHoney   |   fashion</title>
        <meta name="description" content="Effect, premium HTML5&amp;CSS3 template">
        <meta name="author" content="MosaicDesign">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="<?php echo url(); ?>/css/theme-style.css">
        <link rel="stylesheet" href="<?php echo url(); ?>/css/ie.style.css">
  
        <script src="<?php echo url(); ?>/js/vendor/modernizr.js"></script>
        <script src="<?php echo url(); ?>/js/vendor/less.js"></script><!--<![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo url(); ?>/css/logotype.css">

         <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
        <link rel="stylesheet" type="text/css" href="<?php echo url(); ?>/css/notify-metro.css">

      
        <script src="<?php echo url(); ?>/js/notify.js"></script>
        <script src="<?php echo url(); ?>/js/notify-metro.js"></script>

     <script type="text/javascript">
  function wishliststore(id,type){
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/";


              $.ajax({
                type:'POST',
                url: baseUrl + 'wishliststore',
                data: {
                  "_token": "{{ csrf_token() }}",
                  "id": id
                },
                datatype: "json",
                success:function(data){
                    // $("#msg").html(data.msg);
                    var elem = document.getElementById(id+type);
                    elem.style.display = 'block';
                    
                  
                }
              });
          }

    function wishlistcancel(id,type){
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/";


              $.ajax({
                type:'POST',
                url: baseUrl + 'wishlistcancel',
                data: {
                  "_token": "{{ csrf_token() }}",
                  "id": id
                },
                datatype: "json",
                success:function(data){
                    // $("#msg").html(data.msg);
                    var elem = document.getElementById(id+type);
                    elem.style.display = 'none';
                    
                  
                }
              });
          }


    

</script>