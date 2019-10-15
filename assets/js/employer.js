$(document).ready(function(){
var count=0;

 $("#btnEmpJob").on("click",loadEmpJobs);
          function loadEmpJobs()
                       {
                 if(count==0){
                                  var id=$("#btnEmpJob").attr("data-id");
                                    $.ajax({
                                   type: 'get',
                                   url: 'includes/homeFetch/fetchJobEmployer.php',
                                   data: {id:id},
                                   dataType: 'html',
                                   success: function (data) {
                                 
                                   $('#divToShowEmpJobs').html(data);
                                  
                               }
                          });

                                      count=1;
                                      $('#divToShowEmpJobs').show();

                                     }
                         else{
                              
                              count=0;
                                $('#divToShowEmpJobs').hide();
                         }
                 
         
       
            } 



});