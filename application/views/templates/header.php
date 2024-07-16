<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'CodeIgniter App'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Book Library</a>
    <ul class="navbar-nav ml-auto">
        <?php if ($this->session->userdata('user_id')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('books'); ?>">Main Interface</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('auth/logout'); ?>">Logout</a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('auth/login'); ?>">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('auth/signup'); ?>">Sign Up</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<main role="main" class="container">
