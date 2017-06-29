<h2><?= $title?></h2>
<?php echo validation_errors();?>

<?php echo form_open('categories/create');?><!--form open multipart makes it possible to have image upload fields in the form-->
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Category Name">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
</form>
