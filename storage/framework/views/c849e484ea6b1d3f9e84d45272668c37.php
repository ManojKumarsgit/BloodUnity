
<?php $__env->startSection('content'); ?>

<table class="table table-striped text-center" style="margin-top:70px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Donor Status</th>
      <th scope="col">Last Donated</th>
      <th scope="col">City</th>
    </tr>
  </thead>
  <tbody>
  <?php if($search->isNotEmpty()): ?>
    <?php $__currentLoopData = $search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($result->name); ?></td>
      <td><?php echo e($result->phone); ?></td>
      <td><?php echo e($result->is_avail); ?></td>
      <td><?php echo e($result->last_donated); ?></td>
      <td><?php echo e($result->city); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>
  <tr>
      <td></td>
      <td></td>
      <td>No Donors Available in this City.</td>
      <td></td>
      <td></td>
    </tr>  
  <?php endif; ?>
  </tbody>
  </table>
<?php echo e($search->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BNS\BloodUnity\resources\views/Searchshow.blade.php ENDPATH**/ ?>