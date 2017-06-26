<h2><?= $title?></h2>
<?php foreach($posts as $post):?>

    <h3><?php echo $post['title'];?><br>
        <div class="row" >
            <div class="col-md-3">
                <img src="<?php echo site_url();?>assets/images/post/<?php echo $post['post_image'];?> ">
            </div>
            <div class="col-md-9">
                <div class="post-date">
                    <small>Posted On <?php echo $post['datecreated'];?> in <?php echo $post['name'];?></small><br>
                </div>
                <?php echo word_limiter($post['body'], 50); ?><br>
                <p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['slug']);?>">Read More</a></p>
            </div>

        </div>

<?php endforeach;?>
