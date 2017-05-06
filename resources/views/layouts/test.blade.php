 <html>
<head>

 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
       <link rel="stylesheet" type="text/css" href="<?php echo url(); ?>/css/notify-metro.css">

    @include('includes.head')


      <script>
         function getMessage(id){
             var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/";
            
               document.getElementById("demo").innerHTML = id;
         

            $.ajax({
               type:'POST',
                url: baseUrl + 'tryajax',
              data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                    },
                datatype: "json",
               success:function(data){
                  $("#msg").html(data.msg);
               }
            });
         }
      </script>




        <script>
        function displayDate() {

            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/";
             // + getUrl.pathname.split('/')[1];
            
            // document.getElementById("demo").innerHTML = baseUrl;
            var elem = document.getElementById('hello');
            elem.style.display = 'none';

        }

        function notify(style) {

             var elem = document.getElementById('hello');
        $(elem).notify({
            title: 'Email Notification',
            text: 'You received an e-mail from your boss. You should read it right now!',
            image: "<img src='images/Mail.png'/>"
        }, {
            style: 'metro',
            className: style,
            autoHide: false,
            clickToHide: true
        });

//         $(elem).notify(
//   "I'm to the right of this box", 
//   { position:"right" }
// );

    }
        </script>
</head>
<body>


<div id = 'msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>
          <button onclick="getMessage(6)">Replace Message</button>
    <!--   <?php
         // echo Form::button('Replace Message',['onClick'=>'getMessage()']);
          // echo Form::button('Replace Message',['onClick'=>'getMessage()']);

      ?> -->


        <p>Click the button to display the date.</p>
        <button onclick="displayDate()">The time is?</button>
        <p id="demo"></p>

        <div id="hello" style="display:block"> hello world</div>
<a href="javascript:getMessage(2)">hello</a>


<button onclick="notify('white')">White</button>
<button onclick="notify('black')">Black</button>
<button onclick="notify('error')">Err</button>
<button onclick="notify('success')">Success</button>
<button onclick="notify('warning')">Warning</button>
<button onclick="notify('info')">Info</button>


<button onclick="notify1('info')">Info</button>

<div id="hello">world</div>

</body>
</html>