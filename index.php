<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="login-form">
    <div class="cover">
        <form action="dashboard.php"  class="form">
            <div class="email form-input">
                <label for="email" class="text"> Email</label>
                <input type="email" id="email" name="email" class="style-box" required>
            </div>
            <div class="password form-input">
                <label for="password form-input" class="text">Password</label>
                <input type="password" class="style-box" required>    
               
            </div>
            <div class="login form-input">
                <button type="submit" class="style-box-login">Login</button>
            </div>

        </form>

    </div>

</body>