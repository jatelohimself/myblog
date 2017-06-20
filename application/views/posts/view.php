<h2><?php echo $post['title']?></h2>
<div class="post-body">
    <div class="post-date">
        <small>Posted On <?php echo $post['datecreated'];?></small><br>
    </div>
    <?php echo $post['body']?>
</div>

<hr>
<a class="btn btn-default" href="<?php echo base_url()?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
<?php echo form_open('/posts/delete/'.$post['id']);?>
    <input type="submit" value="delete" class="btn-danger">
</form>
