<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button
        type="button"
        class="navbar-toggle collapsed"
        data-toggle="collapse"
        data-target="#bs-example-navbar-collapse-1"
        aria-expanded="false"
      >
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Balance Web Development</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href='index.php?action=about'>About</a></li>
        <li class="dropdown">
          <a
            href="#"
            class="dropdown-toggle"
            data-toggle="dropdown"
            role="button"
            aria-haspopup="true"
            aria-expanded="false"
            >Services<span class="caret"></span
          ></a>
          <ul class="dropdown-menu">
            <li><a href="#">Design</a></li>
            <li><a href="#">Development</a></li>
            <li><a href="#">Consulting</a></li>
          </ul>
        </li>
        <li><a href="#">Contact</a></li>
        <li class="dropdown">
          <a
            href="#"
            class="dropdown-toggle"
            data-toggle="dropdown"
            role="button"
            aria-haspopup="true"
            aria-expanded="false"
            >Jobs<span class="caret"></span
          ></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?action=addJob">Add Job</a></li>
            <li><a href="index.php?action=viewJobs">View Jobs</a></li>
            <li><a href="index.php?action=ourJobs">Our Jobs</a></li>
            
          </ul>
        </li>
        <li><a href='index.php?action=displayAllUsers'>All Users</a></li>
        <li><a href='index.php?action=viewCompanies'>All Companies</a></li>
        
        <?php if (isset($_SESSION['currentUser'])):?>
        <li><a href='index.php?action=displayProfile'>Profile</a></li>
        <li><a href='index.php?action=logout'>Logout</a></li>
        <?php else: ?>
        <li><a href='index.php?action=viewLogin'>Login</a></li>
        <li><a href='index.php?action=registration'>Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>