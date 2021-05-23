
 
<?php $__env->startSection('content'); ?>
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Mahasiswa</h2>
            </div>
            <div class="float-right">
                
            </div>
        </div>
    </div>
 
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
 
    <table class="table table-bordered">
        <tr>
        
            <th width="20px" class="text-center">Id</th>
            <th>Nama Mahasiswa</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        <?php $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="text-center"><?php echo e(++$i); ?></td>
            <td><?php echo e($post->nama_mahasiswa); ?></td>
            <td><?php echo e($post->alamat); ?></td>
            <td><?php echo e($post->no_tlp); ?></td>
            <td><?php echo e($post->email); ?></td>
            <td class="text-center">
                
 
                    
 
                    
 
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
 
    <?php echo $mahasiswas->links(); ?>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Downloads\Quiz-PIL-Nabilah-Narjis\resources\views/mahasiswas/index.blade.php ENDPATH**/ ?>