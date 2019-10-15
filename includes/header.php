
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./">Job Malai</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Jobs Cat
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="divToShowNavCat">
         
      
        </div>
      </li>

      <li class="nav-item">
   <a class="nav-link" href="" data-toggle="modal" data-target="#loginBox">Login</a>
       
      </li>
       <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0" method="Post" action="jobs.php">
    	<a href="employer/" class="btn btn-primary" style="margin-right: 20px;">Post a Job</a>
      <input class="form-control mr-sm-2" type="search" placeholder="Search Jobs" aria-label="Search" name="query">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>