<?php include('header.php');?>

<div class='login'>

<form class='form-signin' action='loginLogic.php' method='post'>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username" name="username">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="Password">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Sigm In</button>
  <small>Don't have an account?<a href="signup.php"></small>
</form>
</div>
<?php include('footer.php');?>