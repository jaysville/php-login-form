<?php
 require_once 'includes/header.php';
?>

<div>
 <h1>Login</h1>
 <p>No account? <a href="register.php">Register Here!</a></p>

  <form action="includes/login-inc.php" method="post">
   <div>
   <input type="text" name="password" placeholder="Password">
   </div> 
   
   <div>
   <input type="text" name="username" placeholder="Username">
   </div>
   
    <button type="submit" name="submit">Login</button>
</form>
</div>



<?php
require_once 'includes/footer.php'

?>