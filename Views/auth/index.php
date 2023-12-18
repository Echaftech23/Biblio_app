<!-- end of body -->

<?php include("../../includes/header.php"); ?>

<div class="container">
  <div class="forms-container">
    <div class="signin-signup">

      <?php include("login.php"); ?>

      <?php include("register.php"); ?>

    </div>
  </div>

  <div class="panels-container">
    <div class="panel left-panel">
      <div class="content">
        <h3>New here ?</h3>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
          ex ratione. Aliquid!
        </p>
        <button class="btn transparent" id="sign-up-btn">
          Sign up
        </button>
      </div>
      <img src="../../Public/img/log.svg" class="image" alt="" />
    </div>
    <div class="panel right-panel">
      <div class="content">
        <h3>One of us ?</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
          laboriosam ad deleniti.
        </p>
        <button class="btn transparent" id="sign-in-btn">
          Sign in
        </button>
      </div>
      <img src="../../Public/img/register.svg" class="image" alt="" />
    </div>
  </div>
</div>
<?php include("../../includes/footer.php"); ?>