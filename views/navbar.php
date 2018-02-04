<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Kite</a>
    </div>

    <?php if( isset($_SESSION['id']) ): ?>
	     <ul class="nav navbar-nav navbar-right">
	      <li><a href="../session/logout.php">Logout <span class="glyphicon glyphicon-arrow-right"></span></a></li>
	    </ul>   
    <?php endif; ?>

  </div>
</nav>