<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <title>Contact - My Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" />
  </head>
  <body>
    <?php echo $__env->make('partial.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <section class="section contact-section">
      <div class="container">
        <h1>Contact Me</h1>
        <p class="corporate-text">Feel free to reach out for professional inquiries, collaborations, or just to say hello!</p>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea id="message" class="form-control" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
      </div>
    </section>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="successModalLabel">Message Sent Successfully!</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Thank you for your message. I will get back to you soon!</p>
            <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem"></i>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <footer class="text-center py-3 bg-dark text-light">© 2026 MyProfile</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      debugger;
      document.querySelector("form").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent actual form submission
        const modal = new bootstrap.Modal(document.getElementById("successModal"));
        modal.show();
        // Optionally reset the form
        this.reset();
      });
    </script>
  </body>
</html>
<?php /**PATH D:\laragon\www\lat_laravel\resources\views/contact.blade.php ENDPATH**/ ?>