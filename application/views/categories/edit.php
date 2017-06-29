<h2><?= $title?></h2>

<?php echo validation_errors();?>
<?php echo form_open('categories/edit_categories');?>
<form>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="name" placeholder="Add Name">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>