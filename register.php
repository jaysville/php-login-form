<?php
 require_once 'includes/header.php';
?>

<div>
 <h1>Register</h1>
 <p>Already have an account? <a href="login.php">Sign In!</a></p>

  <form action="includes/register-inc.php" method="post">
    
   <div>
   <input type="password" name="username" placeholder="Username">
   </div>
   <div>
   <input type="text" name="password" placeholder="Password">
   </div> 
   
   <div>
    <input type="password" name="confirmPassword" id="" placeholder="Confirm password">
   </div>
    <button type="submit" name="submit">Register</button>
</form>
</div>



<?php
require_once 'includes/footer.php'

?>