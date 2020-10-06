<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/style.css'); ?>">
    <title>Document</title>
</head>
<body>
  <?php 
    $uri = service('uri'); // service module

  ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">CI4 Login</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <?php if(session()->get('isLoggedIn')): ?>

    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo ($uri->getSegment(1) === 'dashboard' ? 'active' : null); ?>">
        <a class="nav-link" href="<?php echo base_url('/dashboard'); ?>">Dashboard</a>
      </li>
      <li class="nav-item <?php echo ($uri->getSegment(1) === 'profile' ? 'active' : null); ?>">
        <a class="nav-link" href="<?php echo base_url('/users/profile'); ?>">プロフィール</a>
      </li>
    </ul>
    
    <ul class="navbar-nav my-2 my-1g-0">
      <li class="nav-item">
        <a href="<?php echo base_url('/users/logout'); ?>" class="nav-link">ログアウト</a>
      </li>
    </ul>

  <?php else: ?>

    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo ($uri->getSegment(1) === '' ? 'active' : null); ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>">Login<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php echo ($uri->getSegment(1) === 'register' ? 'active' : null); ?>">
        <a class="nav-link" href="<?php echo base_url('/users/register'); ?>">登録</a>
      </li>
    </ul>

  <?php endif; ?>
  </div>

  </div>
</nav>
    
