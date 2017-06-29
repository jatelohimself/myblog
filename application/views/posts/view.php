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
<hr>
<h3>Comments</h3>
<?php if($comments): ?>
    <?php foreach ($comments as $comment):?>
        <div class="well">
             <h5><?php echo $comment['body'];?> [by <strong><?php echo $comment['name']?></strong>]</h5>
        </div>
    <?php endforeach;?>
    <?php else:?>
    <p>No comments to display</p>
    <?php endif?>

<hr>
<h3>Add Comments</h3>
<?php echo validation_errors()?>
<?php echo form_open('comments/create/'.$post['id']);?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
        <label>Email</label>
        <input type="text" name="email" class="form-control">
        <label>Body</label>
        <textarea name="body" class="form-control"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post['slug'];?>">
    <button type="submit" class="btn btn-default">Submit</button>
</form>
