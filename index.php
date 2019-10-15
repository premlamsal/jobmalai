<?php
include('includes/top.php');
include('includes/header.php');
?>



<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Welcome to Job Malai</h1> 
    <p>Job is waiting for you !</p> 
  </div>
</div>

<!-- jumbotron ends -->


<!-- cards container -->
 <div class="container">
    <div class="row">
	 		<div class="col-md-12">
	 		<h4>Recent Jobs</h4>
				 </div>
	 		</div>
	 



 	<div class="row">
 		<div class=""></div>
 	</div>
 	<div class="row" id="divToShowRecentJobs">
 			<!-- loads the recents jobs here with AJAX-->

</div>
<!-- cards end -->
</div>
<!-- cards ends -->
<hr>

<!-- most view or featured jobs part here. is kept on featuredback.php -->

			
<div style="margin-top: 20px;"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h6>Find Jobs by Cat</h6>
		</div>
	</div>
</div>
<div class="container">
	<div class="row mt-4" id="divToShowCat">
			<!-- cat will load here by AJAX-->
			
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
		<h3>Employers</h3>
	</div>
	</div>
		
				<div class="row mt-4" id="divToShowEmployer">
						
					<!-- employers will load here with ajax -->
			</div>
		</div>
	</div>
</div>
 

<?php
include('includes/footer.php');
?>
<script type="text/javascript">

loadRecentJobs();
loadCat();
loadEmployers();
      
       function loadCat()
            {
              $.ajax({
                url:"includes/homeFetch/fetchCats.php",
                method:"POST",
                success:function(data)
                {
                  $('#divToShowCat').html(data);
                }
              });
      } 
    function loadRecentJobs()
            {
              $.ajax({
                url:"includes/homeFetch/fetchRecentJobs.php",
                method:"POST",
                success:function(data)
                {
                  $('#divToShowRecentJobs').html(data);
                }
              });
      } 
      function loadEmployers()
            {
              $.ajax({
                url:"includes/homeFetch/fetchEmployers.php",
                method:"POST",
                success:function(data)
                {
                  $('#divToShowEmployer').html(data);
                }
              });
      } 
  


      </script>

</body>
</html>