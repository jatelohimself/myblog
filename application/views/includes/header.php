<html>
<head>
    <title>myBlog</title>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootsrap.min.css ">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css">
    <script src="<?php echo base_url();?>/assets/plugins/ckeditor/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url();?>">Our Blog</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li ><a href="<?php echo base_url();?>">Home </a></li>
                <li ><a href="<?php echo base_url();?>about">About</a></li>
                <li ><a href="<?php echo base_url();?>posts">Blog </a></li>
                <li ><a href="<?php echo base_url();?>categories/get_categories">Categories</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-right navbar-nav">

                <?php if(!$this->session->userdata('logged_in')):?>
                    <li ><a href="<?php echo base_url();?>users/register">Register</a></li>
                    <li ><a href="<?php echo base_url();?>users/login">Login</a></li>
                <?php endif; ?>
                <?php if($this->session->userdata('logged_in')):?>
                    <li ><a href="<?php echo base_url();?>users/logout">Logout</a></li>
                    <li ><a href="<?php echo base_url();?>posts/create">Create Post</a></li>
                    <li ><a href="<?php echo base_url();?>categories/create">Create Categories</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</nav>
<div  class="container">
    <!-- FLASH MESSAGES-->
    <?php if($this->session->flashdata('user_registered')):?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('post_created')):?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('post_deleted_success')):?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted_success').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('failed_login')):?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('failed_login').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('post_deleted_success')):?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted_success').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('user_logged_in')):?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_in').'</p>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('logout_success')):?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('logout_success').'</p>';?>
    <?php endif;?>
