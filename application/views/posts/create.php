<h2><?= $title?></h2>
<?php echo validation_errors();?>
<?php echo form_open('posts/create');?>
<form>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Add Title">
    </div>
    <div class="form-group">
        <label >Body</label>
        <textarea class="form-control" id="editor1"  name="body" placeholder="Body Text"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>