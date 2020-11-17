<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title> LOGIN </title>

    <style>

    .navbar {
    display: inline-block; 
    text-align: center;
    font-family: Sans-Serif;
    letter-spacing: 5px;
    margin-top: 10px;
    }

    .form-login{
    position: static;
    margin: auto;
    margin-top: 100px;
    max-width: 350px;
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 5px 0px #000;
    box-sizing: border-box;
    }

    .btn {
    margin-top: 25px;
    }   
    
    </style>

</head>
<body>
    <div class="login"> 
        
        <nav class="navbar fixed-top navbar-light">
            <a class="navbar-brand" href="#">LOG-IN</a>
        </nav>

        <form id="form" class="form-login center" action="result" method="post">

            <div class="login-group">
                <label for="username">Username</label>
                <input type="username" name=username class="form-control" id="username">
            </div>

            <div class="login-group">
                <label for="password">Password</label>
                <input type="password" name=password class="form-control" id="password">
            </div>

            <button type="submit" class="btn btn-primary btn-block" id="submit">Sign In</button>

        </form>
    </div> 

</body>
</html>