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
      <a class="navbar-brand" href="index.php?action=about">Blue&apos;s Daycare</a>
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
            >Jobs<span class="caret"></span
          ></a>
          <ul class="dropdown-menu">
            
            <li><a href="index.php?action=viewJobs">View Jobs</a></li>
            
            
          </ul>
        </li>
        <li><a href='index.php?action=viewChildcareOpenings'>Childcare Openings</a></li>
        <li><a href='index.php?action=viewCompanies'>All Companies</a></li>
        <?php if(isset($_SESSION['company'])) { ?>
        <li class="dropdown">
          <a
            href="#"
            class="dropdown-toggle"
            data-toggle="dropdown"
            role="button"
            aria-haspopup="true"
            aria-expanded="false"
            ><?php echo $_SESSION['company']['companyName'] ;?><span class="caret"></span
        ></a>
          <ul class="dropdown-menu">
              <li><a href="index.php?action=viewCompanyProfile&amp;id=<?php echo $_SESSION['company']['companyID']; ?>">Company Profile</a></li>
            <li><a href="index.php?action=addJob">Add Job</a></li>
            <li><a href="index.php?action=editCompany">Edit Company</a></li>
            <li><a href="index.php?action=ourJobs">Our Jobs</a></li>
            <li><a href="index.php?action=viewChildApps">Childcare Apps</a></li>
            
          </ul>
        </li>
        <?php } ?>
        
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
