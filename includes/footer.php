


<!-- Footer -->
    <footer class="py-5 bg-dark" style="margin-top: 5em;">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; JobMalai. All rights Reserved</p>
      </div>
      <!-- /.container -->
    </footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
	recentJobsWidget();
  JobsCatWidget();
  var navCatSet=0;
  $('#navbarDropdown').on('click',showNavCat);
	function recentJobsWidget()
            {
              $.ajax({
                url:"includes/widgets/fetchRecentJobsWidget.php",
                method:"POST",
                success:function(data)
                {
                  $('#ulToShowRecentJobsWidget').html(data);
                }
              });
      } 
      
      function JobsCatWidget()
            {
              $.ajax({
                url:"includes/widgets/fetchJobCatWidget.php",
                method:"POST",
                success:function(data)
                {
                  $('#ulToShowJobCatWidget').html(data);
                }
              });
      } 

      function showNavCat()
            {
              if (navCatSet==0) {
                navCatSet=1;
              $.ajax({
                url:"includes/homeFetch/fetchNavCat.php",
                method:"POST",
                success:function(data)
                {
                  $('#divToShowNavCat').html(data);
                }
              });
              
            }
      } 
</script>


<!-- Logout Modal-->
    <div class="modal fade" id="loginBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Just a Sec</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">          
           <a  href="jobseeker/" class="btn btn-outline-success" style="margin-left: 95px;">I am JobSeeker</a>

            <a href="employer/" class="btn btn-primary">I am Employer</a>
 
          </div>
         <!--  <div class="modal-footer">
           <a href="#">JobMalai</a>
          </div> -->
        </div>
      </div>
    </div>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c17428f7a79fc1bddf135a9/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


