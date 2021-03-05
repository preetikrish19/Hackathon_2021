<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Login into the Site</h1>
    <a type="button" class="btn btn-warning submit" href="index.php" >Home</a>
</div>

<div class="container">
    <h2 class="text-center">User Login</h2>
    <p id="error" class="text-white text-center bg-danger"></p>
    <p id="success" class="text-white text-center bg-success"></p>
    <div class="container">
        <div class="col-md-6 mx-auto card p-4">
            <form>
                <div class="form-group">
                    <label for="email">User email:</label>
                    <input type="email" class="form-control" placeholder="Enter email address." id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="password" name="password">
                </div>

                <button type="button" class="btn btn-primary submit" name="login" onclick="verifyLogin()">Login</button>
                <a type="button" class="btn btn-success submit" href="signup.php" >Sign Up</a>
                <a type="button" class="btn btn-danger submit" href="forgot.php">Forgot Password</a>
            </form>
        </div>
    </div>
</div>

</body>
<script>
    function verifyLogin(){
        var email = $('#email');
        var pwd = $('#password');
        var error = $('#error');
        var success = $('#success');
        if(!(pwd.val() && email.val())){
            error.html("Please fill all the data");
        }else{
            $.post('loginuser.php', {
                email: email.val(),
                pwd: pwd.val()
            }, function (result){
                if(result==='SUCCESS'){
                    error.empty();
                    success.html("User Logged in");
                    alert(result);
                    window.location.href='index.php'
                }else{
                    error.html(result);
                }
            })
        }
            }
</script>
</html>
