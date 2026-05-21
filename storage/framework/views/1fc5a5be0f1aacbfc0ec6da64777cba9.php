

<?php $__env->startSection('title', 'Contact'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">Hubungi Kami</h2>
            <p class="mb-4">Kirimkan pesan kepada kami, kami akan merespons secepat mungkin.</p>

            <?php if(auth()->guard()->guest()): ?>
            <div class="mb-3">
                <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-primary me-2">Login</a>
                <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-secondary">Register</a>
                <p class="mt-3 text-muted">Silakan login atau daftar sebelum mengisi form.</p>
            </div>
            <?php endif; ?>

            <form id="contactForm">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" id="name" name="name" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>

            <!-- Success Modal -->
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">Pesan Terkirim!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Terima kasih, pesan Anda telah terkirim. Kami akan menghubungi Anda segera.</p>
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem"></i>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('contactForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const modal = new bootstrap.Modal(document.getElementById('successModal'));
    modal.show();
    this.reset();
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\lat_laravel1\resources\views/contact.blade.php ENDPATH**/ ?>