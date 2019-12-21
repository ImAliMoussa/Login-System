<?php 
    require("inc/header.php");
    $_POST = array();
?>

<div class="container d-flex h-100">
    <div class=" align-self-center w-100">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header bg-warning text-dark text-center">
                    Login
                </div>

                <div class="card-body bg-light text-dark">

                    <form method="post" action="welcome.php">
                        <div id="error_div" class="alert alert-danger" style="display : none;"></div>

                        <div class="form-group">
                            <label>Username</label>
                            <input id="username_input" type="text" name="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input id="password_input" type="password" name="password" class="form-control">
                        </div>

                        <input class="form-group btn btn-lg btn-dark btn-block" type="submit" name="signin"
                            value="Sign in" onclick="return validateLogIn();">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    require("inc/footer.php");
?>