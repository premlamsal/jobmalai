function showErrorNoti(){
     btnType = 'error';
  Lobibox.notify(btnType, {
      
        pauseDelayOnHover: true,
        // msg: 'This is ' + btnType +' message'
        title:'Opps!!!',
        msg: 'Invalid Username or Password'
    });
  }
   function showSuccessNoti(){
  $("#formDiv").css("visibility", "hidden")
     btnType = 'success';
  Lobibox.notify(btnType, {

        pauseDelayOnHover: true,
        // msg: 'This is ' + btnType +' message'
        title:'Hurray!!!',
        msg: 'Login Success. Please Wait'
    });
  }

function callDash(){
         window.setTimeout(function() {
    window.location = 'index.php';
  }, 5000);
}
  function hasEmail(){

     btnType = 'error';
  Lobibox.notify(btnType, {

        pauseDelayOnHover: true,
        // msg: 'This is ' + btnType +' message'
        title:'Opps!!!',
        msg: 'Email exits Already.'
    });
  }

 function hasPhone(){
 
     btnType = 'error';
  Lobibox.notify(btnType, {

        pauseDelayOnHover: true,
        // msg: 'This is ' + btnType +' message'
        title:'Opps!!!',
        msg: 'Phone exits Already.'
    });
  }
   function hasRecords(){
 
     btnType = 'error';
  Lobibox.notify(btnType, {

        pauseDelayOnHover: true,
        // msg: 'This is ' + btnType +' message'
        title:'Opps!!!',
        msg: 'Records exits Already. Please Login'
    });
  }
 function appliedJob(){
 
     btnType = 'success';
  Lobibox.notify(btnType, {

        pauseDelayOnHover: true,
        // msg: 'This is ' + btnType +' message'
        title:'Hurray!!!',
        msg: 'Job Aplication Sent. Please Check Status from Application Menu'
    });
  }