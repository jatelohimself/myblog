<h2><?= $title?></h2>

<?php echo validation_errors();?>
<?php echo form_open_multipart('users/register');?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Enter Name">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Name">
        <label>Zip Code</label>
        <input type="text" class="form-control" name="zip" placeholder="Enter Name">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter Name">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="password2" placeholder="Enter Name">
    </div>
    <button type="submit" class="Button btn-block">Submit</button>

<?php echo form_close()?>

