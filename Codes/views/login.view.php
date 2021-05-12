<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div style="text-align:center;box-shadow:rgba(0,0,0,0.25) 0px 8px 16px;padding:32px; border-radius:15px; background-color:#eee;width:50%;margin:auto;margin-top:50vh;transform:translateY(-50%)">
        <h1><u>Login</u></h1>
        <!-- Error alert -->
        <?php if(isset($error)){?>
            <div style="padding:10px 15px; background-color:#ffba51;color:#fff;border-radius:5px;margin-bottom:16px;">
                <?php echo $error; ?>
            </div>
        <?php } ?>
        <form style="text-align:left;" action="./login" method="post">
            <label for="email">Email:(*)</label>
            <input value="abby@email.com" required placeholder="Enter your email adress" style="padding:10px 15px;border-radius:5px;border:1px solid grey;width:calc(100% - 30px);" type="email" name="email" id="email"><br><br>
            <label for="password">Password:(*)</label>
            <input value="1234" required placeholder="Enter your password" style="padding:10px 15px;border-radius:5px;border:1px solid grey;width:calc(100% - 30px);"  type="password" name="password" id="password"><br><br>
            <input type="checkbox" name="rememberme" id="rememberme"> <label for="rememberme">Remember me</label><br><br>
            <button style="display:block;width:100%;padding:10px 15px;border:1px solid rgb(100,100,100);background:blue;color:#fff;border-radius:5px;" type="submit" name="submit">Login</button>
        </form>
   </div>
</body>
</html>