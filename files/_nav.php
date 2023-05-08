

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/encro">Home</a>
        </li>
        <?php
        if(!isset($_SESSION['userid']))
        {
        ?>
         <li class="nav-item">
          <a class="nav-link" href="/encro/1-login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/encro/1-signup.php">Signup</a>
        </li>
        
        <?php
        }
        ?>
       
        <?php
        if(isset($_SESSION['userid']))
        {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="/encro/1-welcome.php">Welcome</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="/encro/1-category.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/encro/1-sub-category.php">Sub Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/encro/1-sub-sub-category.php">Sub Sub Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/encro/1-product.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/encro/1-logout.php">Logout</a>
        </li>
        <?php
        }
        ?>

        
        
    </div>
  </div>
</nav>