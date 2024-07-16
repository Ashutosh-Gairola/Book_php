<?php $title = 'View Book'; ?>
<?php include(APPPATH . 'views/templates/header.php'); ?>

<h1 class="mt-5"><?php echo $book['title']; ?></h1>
<p>Author: <?php echo $book['author']; ?></p>
<p>Published Date: <?php echo $book['published_date']; ?></p>
<p>Summary: <?php echo $book['summary']; ?></p>
<a class="btn btn-primary" href="<?php echo site_url('books'); ?>">Back to List</a>

<?php include(APPPATH . 'views/templates/footer.php'); ?>
