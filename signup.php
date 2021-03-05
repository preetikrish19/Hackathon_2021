<!DOCTYPE html>
<html lang="en">
<head>
    <title>New User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Enter the details of the new user: </h1>
</div>

<div class="container">
    <p id="error" class="text-white text-center bg-danger"></p>
    <p id="success" class="text-white text-center bg-success"></p>
    <div class="container">
        <div class="col-md-6 mx-auto card p-4">
            <form>
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" placeholder="Enter your name" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">User Email ID:</label>
                    <input type="text" class="form-control" placeholder="Enter your email id" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="pwd">Reenter Password</label>
                    <input type="password" class="form-control" placeholder="Reenter password" id="repass" name="repass">
                </div>

                <button type="button" class="btn btn-primary submit" name="submit" onclick="addUser()">Sign Up</button>
                <a type="button" class="btn btn-success submit" href="login.php" >Login Existing Customer</a>
            </form>
        </div>
    </div>
</div>

<script>
    function addUser(){
        var user= $('#name');
        var email = $('#email');
        var pwd = $('#password');
        var repwd = $('#repass');
        var error = $('#error');
        var success = $('#success')

        if(!(user.val() && email.val() && pwd.val() && repwd.val())){
            error.html("Please fill all the data");
        } else {
            if(pwd.val() !== repwd.val()){
                error.html("Passwords do not match.");
            }else{
                $.post('adduser.php', {
                    name: user.val(),
                    email: email.val(),
                    pwd: pwd.val()
                }, function (result){
                    if(result==='SUCCESS'){
                        error.empty();
                        success.html("User Added, Proceed to login.");
                        alert(result);
                        window.location.href='login.php'
                    }else{
                        error.html(result);
                    }
                })
            }
        }
    }
</script>

</body>
</html>
