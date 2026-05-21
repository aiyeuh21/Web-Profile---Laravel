

<?php $__env->startSection('title', $service->name); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h3 class="card-title mb-4"><?php echo e($service->name); ?></h3>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <p class="form-control-plaintext"><?php echo e($service->description ?? '-'); ?></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga</label>
                        <p class="form-control-plaintext">Rp <?php echo e(number_format($service->price, 0, ',', '.')); ?></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Stok</label>
                        <p class="form-control-plaintext"><?php echo e($service->quantity); ?> unit</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Dibuat</label>
                        <p class="form-control-plaintext"><?php echo e($service->created_at->format('d M Y H:i')); ?></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Diperbarui</label>
                        <p class="form-control-plaintext"><?php echo e($service->updated_at->format('d M Y H:i')); ?></p>
                    </div>

                    <div class="d-flex gap-2">
                        <?php if(auth()->user() && auth()->user()->role === 'admin'): ?>
                            <a href="<?php echo e(route('services.edit', $service)); ?>" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form method="POST" action="<?php echo e(route('services.destroy', $service)); ?>" style="display:inline;" 
                                  onsubmit="return confirm('Yakin ingin menghapus?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        <?php else: ?>
                            <a href="https://wa.me/6289660329648?text=<?php echo e(urlencode("saya tertarik menggunakan jasa {$service->name}")); ?>" target="_blank" class="btn btn-primary">
                                <i class="bi bi-whatsapp"></i> Pesan via WA
                            </a>
                        <?php endif; ?>

                        <a href="<?php echo e(route('services.index')); ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\lat_laravel1\resources\views/services/show.blade.php ENDPATH**/ ?>