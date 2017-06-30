
<?php validation_errors();?>

<?php echo form_open('/users/login');?>
<div class="form-group">
    <h2 class="text-center"><?= $title;?></h2>
    <label>Username</label>
    <input type="text" class="form-control" name="name" placeholder="Enter name" required autofocus>
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter Password" required autofocus>
</div>
<button type="submit" class="btn-block btn">Login</button>
<?php echo form_close();?>
