<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('index')); ?>">My Profile</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('index')); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('about')); ?>">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('contact')); ?>">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><?php /**PATH C:\xampp\htdocs\lat_laravel1\resources\views/partial/header.blade.php ENDPATH**/ ?>