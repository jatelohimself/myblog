<h2><?= $title?></h2>
<?php echo validation_errors();?>
<?php echo form_open_multipart('posts/create');?><!--form open multipart makes it possible to have image upload fields in the form-->
<form>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Add Title">
    </div>
    <div class="form-group">
        <label >Body</label>
        <textarea class="form-control" id="editor1"  name="body" placeholder="Body Text"></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <?php foreach ($categories as $category):?>
                <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group">
        <label>Upload Image</label>
        <input type="file" name="post-image">
    </div>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>