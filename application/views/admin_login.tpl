<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>药房网-积分商城</title>
    <!-- Bootstrap core CSS -->
    <link href="{$smarty.const.CSS_ADMIN_URL}css/bootstrap.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{$smarty.const.CSS_ADMIN_URL}css/signin.css" rel="stylesheet" />

</head>

<body>
<div class="container" style="margin-top: 50px">

    <form class="form-signin" role="form" action="" method="post">
        <h2 class="form-signin-heading text-center">药房网积分商城</h2><br>
        <input type="text" name="name" class="form-control" placeholder="请填写用户名" required><br>
        <input type="password" name="password" class="form-control" placeholder="请填写密码" required>

        <div class=" form-group">
            <div class="col-sm-4"  >
                <img src="{base_url()}index.php/admin_login/get_code" class="control-label" onclick='this.src="{base_url()}index.php/admin_login/get_code?"+Math.random()'>
            </div>
            <div class="col-sm-4" style="margin-left: 35px">
                <input type="text" name="code" class="control-label" style="height: 40px;" placeholder="请填写验证码" required>
            </div>
        </div>

        <br><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit"> 登 录 </button>
    </form>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>
