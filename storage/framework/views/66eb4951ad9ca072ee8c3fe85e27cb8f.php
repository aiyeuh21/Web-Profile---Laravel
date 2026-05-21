

<?php $__env->startSection('title', 'Daftar Jasa'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2>Daftar Jasa</h2>
        </div>
        <div class="col-md-4 text-end">
            <?php if(auth()->user() && auth()->user()->role === 'admin'): ?>
            <a href="<?php echo e(route('services.create')); ?>" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Jasa
            </a>
            <?php endif; ?>
        </div>
    </div>

    <?php if($services->count() > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($service->id); ?></td>
                            <td><?php echo e($service->name); ?></td>
                            <td>Rp <?php echo e(number_format($service->price, 0, ',', '.')); ?></td>
                            <td><?php echo e($service->quantity); ?></td>
                            <td>
                                <a href="<?php echo e(route('services.show', $service)); ?>" class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <?php if(auth()->user() && auth()->user()->role === 'admin'): ?>
                                    <a href="<?php echo e(route('services.edit', $service)); ?>" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="<?php echo e(route('services.destroy', $service)); ?>" style="display:inline;" 
                                          onsubmit="return confirm('Yakin ingin menghapus?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                <?php else: ?>
                                    
                                    <a href="https://wa.me/6289660329648?text=<?php echo e(urlencode("saya tertarik menggunakan jasa {$service->name}")); ?>" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="bi bi-whatsapp"></i> Pesan
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            <?php echo e($services->links()); ?>

        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> Belum ada jasa. <a href="<?php echo e(route('services.create')); ?>">Buat jasa baru</a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\lat_laravel1\resources\views/services/index.blade.php ENDPATH**/ ?>