<?php $title = 'Book List'; ?>
<?php include(APPPATH . 'views/templates/header.php'); ?>

<h1 class="mt-5">Books</h1>
<a class="btn btn-primary mb-3" href="<?php echo site_url('books/create'); ?>">Add Book</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Published Date</th>
            <th>Summary</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['published_date']; ?></td>
                <td><?php echo $book['summary']; ?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="<?php echo site_url('books/view/'.$book['id']); ?>">View</a>

                    <a class="btn btn-warning btn-sm" href="<?php echo site_url('books/edit/'.$book['id']); ?>">Edit</a>
                    
                    <a href="<?php echo site_url('books/delete/'.$book['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include(APPPATH . 'views/templates/footer.php'); ?>
