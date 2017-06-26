<h2><?= $title?></h2>

<ul>
        <?php  if (is_array($categories)){
                    foreach ($categories as $category):?>
                        <li><?php echo $category['id'];?>  <?php echo $category['name'];?></li>
                    <?php endforeach?>
       <?php  }?>
</ul>

<?php echo validation_errors();?>
<?php echo form_open('posts/edit_categories');?>
<form>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="name" placeholder="Add Name">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
