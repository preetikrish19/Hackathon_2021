<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot PWD - User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Forgot Password</h1>
</div>

<div class="container">
    <h2 class="text-center"> </h2>
    <p id="error" class="text-white text-center bg-danger"></p>
    <p id="success" class="text-white text-center bg-success"></p>
    <div class="container">
        <div class="col-md-6 mx-auto card p-4" id="emaildiv">
            <form>
                <div class="form-group">
                    <label for="email">User email:</label>
                    <input type="email" class="form-control" placeholder="Enter email address." id="email" name="email">
                </div>

                <button type="button" class="btn btn-primary submit" name="login" onclick="verifyEmail()">Search Email</button>
                <a type="button" class="btn btn-success submit" href="signup.php" >Sign Up</a>
                <a type="button" class="btn btn-danger submit" href="login.php">Login</a>
            </form>
        </div>
        <div class="col-md-6 mx-auto card p-4" id="pwddiv" style="display: none">
            <form>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="pwd">Reenter Password</label>
                    <input type="password" class="form-control" placeholder="Reenter password" id="repass" name="repass">
                </div>

                <button type="button" class="btn btn-primary submit" name="login" onclick="changePwd()">Change Password</button>
                <a type="button" class="btn btn-success submit" href="signup.php" >Sign Up</a>
                <a type="button" class="btn btn-danger submit" href="login.php">Login</a>
            </form>
        </div>
    </div>
</div>

</body>
<script>
    var error = $('#error');
    var success = $('#success');
    var email= $('#email');

    function verifyEmail(){

        if(!(email.val())){
            error.html("Enter an email.");
        }else{
            $.post('checkmail.php', {
                email: email.val()
            }, function (result){
                if(result==='EXIST'){
                    success.html("Email Exists, enter new pwd.");
                    $("#emaildiv").hide();
                    $('#pwddiv').show();
                }else{
                    error.html(result);
                }
            })
        }
    }


    function changePwd(){
        var pwd = $('#password');
        var repwd = $('#repass');

        if(!(pwd.val() && repwd.val())){
            error.html("Please fill all the data");
        }else{
            if(pwd.val()!==repwd.val()){
                error.html("Password do not match");
            }else{
                $.post('changepwd.php', {
                    email: email.val(),
                    pwd: pwd.val()
                }, function (result){
                    if(result==='SUCCESS'){
                        error.empty();
                        success.html("Password Changed");
                        alert("You can now go to login page.");
                    }
                })
            }
        }
    }
    function verifyLogin(){
        var email = $('#email');
        var pwd = $('#password');

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
