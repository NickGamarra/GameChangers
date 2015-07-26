$(document).ready(function() {
    $("#loginLink").click(function( event ){
           event.preventDefault();
           $(".overlay").fadeToggle("fast");
     });
    
    $(".overlayLink").click(function(event){
        event.preventDefault();
        var action = $(this).attr('data-action');
        
        $("#loginTarget").load("ajax/" + action);
        
        $(".overlay").fadeToggle("fast");
    });
    
    $(".close").click(function(){
        $(".overlay").fadeToggle("fast");
    });
    
    $(document).keyup(function(e) {
        if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) { 
            event.preventDefault();
            $(".overlay").fadeToggle("fast");
        }
    });
});
function checkUserLength(user)
{
    if(user.value.length>2)
    {
       checkUser(user);
    }
}
    function checkUser(user)
    {
        //alert("i hate u");
      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "chkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
        {
            if (this.status == 200)
          {
            if (this.responseText != null)
            {
                if(this.responseText=='bad')
                {
                     document.getElementById('userinfo').innerHTML = "username taken &#10008";
                }
                if(this.responseText=='good')
                {
                     document.getElementById('userinfo').innerHTML = "username available &#9989";
                }
                //document.getElementById("userinfo").innerHTML=xmlhttp.responseText ;
                O('userinfo').innerHTML = this.responseText;
                //document.getElementById('userinfo').innerHTML = "meep"
            }
             //document.getElementById('userinfo').innerHTML = this.responseText
          }
        }
          
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }

function checkPassLength(pass)
{
   if(pass.value.length>4)
    {
       confirmPass(pass);
    }
}
function GetElementInsideContainer(containerID, childID) {
    var elm = document.getElementById(childID);
    var parent = elm ? elm.parentNode : {};
    return (parent.id && parent.id === containerID) ? elm : {};
}
 function confirmPass(pass)
    {
      var password = document.getElementById("password");
      if(password.value == pass.value)
      {
          params= "confirmBool=1";
          $('#register-submit').removeAttr('disabled');
      }else{
          params="confirmBool=0";
          $('#register-submit').attr('disabled','disabled');
      }
      request = new ajaxRequest()
      request.open("POST", "chkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
        {
            if (this.status == 200)
          {
            if (this.responseText != null)
            {
                if(this.responseText=='bad')
                {
                    //alert("dsfs");
                     document.getElementById('passinfo').innerHTML = "Passwords do Not Match &#10008";
                }
                if(this.responseText=='good')
                {
                     document.getElementById('passinfo').innerHTML = "Passwords Match &#9989";
                }
                //O('passinfo').innerHTML = this.responseText
                //document.getElementById('userinfo').innerHTML = this.responseText
            }
             //document.getElementById('userinfo').innerHTML = this.responseText
          }
        }
          
      }
      request.send(params)
    }

    
