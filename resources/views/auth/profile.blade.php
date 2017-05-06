@extends('layouts.default')
@section('content')

 <section>
    <div class="second-page-container">
      <div class="block">
        <div class="container">

          

          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form method="POST" action="{{ route("profiles.update",$user->id ) }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" role="form">
            <input name="_method" type="hidden" value="PATCH">
            <!-- left column -->
            <div class="col-md-3">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="text-center">

                <!-- <div class="image-upload"> -->
                <input style="display:none;" id="file-input" name="photourl" type='file' onchange="readURL(this);" />                    
                <label for="file-input">
                 <!--  --><i class="glyphicon glyphicon-upload">...Browse Photo</i><br>
                 @if($user->photourl!="")
                 <img id="blah" src= "{{ $user->photourl }}" width="100" height="100">
                 @else
                 <img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
                 @endif
               </label>
               
               
             </div>
           </div>

           <!-- edit form column -->
           <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-coffee"></i>
              This is an <strong>.alert</strong>. Use this to show important messages to the user.
            </div>
            

            <div class="form-group">
              <label class="col-lg-3 control-label">Name:<span class="text-error">*</span></label>
              <div class="col-lg-8">
                <input class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter Your Name" type="text" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">mName:</label>
              <div class="col-lg-8">
               <input class="form-control" name="mname" value="{{ $user->mname }}" placeholder="Enter Your mName" type="text">
             </div>
           </div>
           
           <div class="form-group">
            <label class="col-lg-3 control-label">Email:<span class="text-error">*</span></label>
            <div class="col-lg-8">
             <input class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Your email" type="text" required>

           </div>
         </div>
         
         <div class="form-group">
          <label class="col-md-3 control-label">Phone1:<span class="text-error">*</span></label>
          <div class="col-md-8">
            <input class="form-control" name="ph1" value="{{ $user->ph1 }}" placeholder="Enter Your phone1" type="text" required>
            
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Phone2:</label>
          <div class="col-md-8">
            <input class="form-control" name="ph2" value="{{ $user->ph2 }}" placeholder="Enter Your phone2" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Address:</label>
          <div class="col-md-8">
            
            <textarea name="address" placeholder="Enter your address" class="form-control" rows="3">{{ $user->address }}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" id="password1" name="password" value="{{ $user->password }}" type="password" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" id="password2" name="password_confirmation" value="{{ $user->password }}" type="password" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <!-- <input class="btn btn-primary" value="Save Changes" type="button"> -->
            <input class="btn btn-primary" type="submit" value="Save Changes"> 
            <span></span>
            <!-- <input class="btn btn-default" value="Cancel" type="reset"> -->
          </div>
        </div>
      </form>
      
    </div>
  </div>
</div>

</section>

<script type="text/javascript">
  window.onload = function () {
    document.getElementById("password1").onchange = validatePassword;
    document.getElementById("password2").onchange = validatePassword;
  }
  function validatePassword(){
    var pass2=document.getElementById("password2").value;
    var pass1=document.getElementById("password1").value;
    if(pass1!=pass2)
      document.getElementById("password2").setCustomValidity("Passwords Don't Match");
    else
      document.getElementById("password2").setCustomValidity('');  
//empty string means no validation error
}
</script><script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#blah')
      .attr('src', e.target.result)
      .width(150)
      .height(150);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

</script>



@stop

