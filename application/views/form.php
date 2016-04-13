<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear usuarios</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css");?>">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <?php echo form_open(base_url("home/create"))?>
            <!--<form action="" method="post">-->
                <div class="form-group">
                    <?php echo form_label("Username","exampleInputUsername")?>
                    <!--<label for="exampleInputUsername">Username</label>-->
                    <?php echo form_input(array('type'=>'text','name'=>'username','class'=>"form-control"))?>
                    <!--<input type="text" class="form-control" id="username">-->
                </div>
                <div class="form-group">
                    <?php echo form_label("Email","exampleInputEmail")?>
                    <!--<label for="exampleInputEmail">Email address</label>-->
                    <?php echo form_input(array('type'=>'email','name'=>'email','class'=>'form-control'))?>
                    <!--<input type="email" class="form-control" id="email">-->
                </div>
                <div class="form-group">
                    <?php echo form_label("Password","exampleInputpassword")?>
                    <!--<label for="exampleInputPassword">Password</label>-->
                    <?php echo form_input(array('type'=>'password','name'=>'password','class'=>'form-control'));?>
                    <!--<input type="password" class="form-control" id="password">-->
                </div>
                <div class="checkbox">
                    <label for="">
                        <input type="checkbox">Check me out
                    </label>
                </div>
                <?php echo form_submit('','Add user',array('class'=>'btn btn-default'))?>
                <!--<button type="submit" class="btn btn-default">Add user</button>-->
            </form>
        </div>
    </div>
</div>
</body>
</html>