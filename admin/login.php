<?php
include_once("./includes/header.php");
?>
<!-- Content -->
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <h4 class="mb-2">The Live Entertainment Group</h4>
          <p class="mb-4">Please sign-in to your account</p>

          <form id="formAuthentication" class="mb-3" action="login.php" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email or Username</label>
              <input type="text" class="form-control" id="email" name="email-username" placeholder="Enter your email or username" autofocus />
              <p id="email-error" class="error"></p>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="forgot-password.php">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              <div class="mb-1">
                <p id="password-error" class="error"></p>
              </div>
            </div>
            <!-- <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
            </div> -->
            <div class="mb-1">
              <p id="global-error" class="error"></p>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

<!-- / Content -->
<?php
include_once("./includes/footer.php");
?>
<script>
  $("#formAuthentication").submit((e)=>{
    e.preventDefault();
    $("#email-error").hide();
    $("#password-error").hide();
    $("#global-error").hide();
    if($("#email").val() == ""){
      $("#email-error").show();
      $("#email-error").text("Username or Email can't be empty");
    }
    else if($("#password").val() == ""){
      $("#password-error").show();
      $("#password-error").text("Password can't be empty");
    }
    else{
      username = $("#email").val();
      password = $("#password").val();
      // remember = $("#remember-me").is(":checked");
      jQuery.ajax({
        url:"<?php echo SITE_PATH?>backend/middleware/adminLogin.php",
        type:"POST",
        data:{
          action:"adminLogin",
          username:username,
          password:password,
          // remember:remember
        },
        success:(res)=>{
          if(res == "success"){
            window.location.href = "<?php echo SITE_PATH?>admin/dashboard.php";
          }
          else{
            $("#global-error").show();
            $("#global-error").text(res);
          }
        },
        error:(e)=>{
          $("#global-error").show();
          $("#global-error").text(e);
        }
      });
    }
  })
</script>