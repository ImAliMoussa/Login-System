<?php 
    require("inc/header.php"); 
    $_POST = array();
?>

<div class="container d-flex h-100">
    <div class=" align-self-center w-100">
        <div class="col-6 mx-auto">
            <div class="card">

                <div class="card-header bg-warning text-dark text-center">
                    Sign Up
                </div>

                <div class="card-body bg-light text-dark">

                    <form method="post" action="welcome.php">
                        <div id="error_div" class="form-group alert alert-danger" style="display : none;"></div>

                        <div class="form-group">
                            <label>Username</label>
                            <input id="username_input" type="text" name="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input id="email_input" type="text" name="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input id="password_input" type="password" name="password1" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Re-enter password</label>
                            <input id="password2_input" type="password" name="password2" class="form-control">
                        </div>

                        <input class="form-group btn btn-dark btn-lg btn-block" type="submit" name="signup" value="Submit" onclick="return validateSignUp();">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require("inc/footer.php") ?>