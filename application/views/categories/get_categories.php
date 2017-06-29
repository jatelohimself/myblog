<h2><?= $title ?></h2>

<?php foreach ($categories as $category):?>
   <?php echo $category['id'];?> <a href="<?php echo site_url('/categories/posts/'.$category['id']);?>" ><?php echo $category['name'];?></a><br>
<?php endforeach;?>

