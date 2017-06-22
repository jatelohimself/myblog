<h2><?= $title?></h2>
<?php foreach($posts as $post):?>
    <h3><?php echo $post['title'];?><br>
    </h3>Slug: <i><?php echo $post['slug']?></i>
    <div class="post-date">
        <small>Posted On <?php echo $post['datecreated'];?> in <?php echo $post['name'];?></small><br>
    </div>
    <?php echo word_limiter($post['body'], 50); ?><br>
    <p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['slug']);?>">Read More</a></p>
<?php endforeach;?>
