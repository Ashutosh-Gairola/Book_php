<?php $title = 'Edit Book'; ?>
<?php include(APPPATH . 'views/templates/header.php'); ?>

<h1 class="mt-5">Edit Book</h1>
<form action="<?php echo site_url('books/edit/'.$book['id']); ?>" method="post">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="<?php echo $book['title']; ?>" required>
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" id="author" value="<?php echo $book['author']; ?>" required>
    </div>
    <div class="form-group">
        <label for="published_date">Published Date</label>
        <input type="date" class="form-control" name="published_date" id="published_date" value="<?php echo $book['published_date']; ?>" required>
    </div>
    <div class="form-group">
        <label for="summary">Summary</label>
        <textarea class="form-control" name="summary" id="summary" rows="3" required><?php echo $book['summary']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a class="btn btn-primary" href="<?php echo site_url('books'); ?>">Back to List</a>
</form>

<?php include(APPPATH . 'views/templates/footer.php'); ?>
