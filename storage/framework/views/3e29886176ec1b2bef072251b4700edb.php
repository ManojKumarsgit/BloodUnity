
<?php $__env->startSection('content'); ?>
<div class="container-fluid outer" style="margin-top:70px;">
  <div class="container-fluid">
    <form action="<?php echo e(route('donor.search.show')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <h3 class="text-center">Search for a Donor</h3>
      <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputStatus">Blood Group</label>
            <select id="inputStatus" name="bgroup" class="form-control <?php echo e($errors->has('bgroup')?'is-invalid':''); ?>"  required value="<?php echo e(old('bgroup')); ?>">
              <option>Choose...</option>
              <?php $__currentLoopData = $bloodGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($bloodGroup->id); ?>"> <?php echo e($bloodGroup->group); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('bgroup')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('bgroup')); ?></strong>
            </span>
            <?php endif; ?>
        
            </div>
          <div class="form-group col-md-3">
            <label for="inputCountry">Country</label>
            <select id="country-dd" name="country" class="form-control <?php echo e($errors->has('country')?'is-invalid':''); ?>"  required value="">
              <option value="<?php echo e(old('country')); ?>">Select Country</option>
              <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('country')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('country')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-3">
            <label for="inputState">State</label>
            <select id="state-dd" name="state" class="form-control <?php echo e($errors->has('state')?'is-invalid':''); ?>"  required value="<?php echo e(old('state')); ?>"></select>
            <?php if($errors->has('state')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('state')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-3">
            <label for="inputCity">City</label>
            <select id="city-dd" name="city" class="form-control <?php echo e($errors->has('state')?'is-invalid':''); ?>"  required value="<?php echo e(old('city')); ?>">
              <!-- <option>Choose...</option> -->
            </select>
            <?php if($errors->has('city')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('city')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
        </div>
        
         <p class="text-center"><button type="submit" class="btn btn-primary ">Search</button></p>
      


</form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#country-dd').change(function(event) {
            var idCountry = this.value;
            $('#state-dd').html('');
 
            $.ajax({
            url: "/api/fetch-state",
            type: 'POST',
            dataType: 'json',
            data: {country_id: idCountry,_token:"<?php echo e(csrf_token()); ?>"},
            success:function(response){
                $('#state-dd').html('<option value="">Select State</option>');
                $.each(response.states,function(index, val){
                $('#state-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                });
                $('#city-dd').html('<option value="">Select City</option>');
            }
            })
        });
        $('#state-dd').change(function(event) {
            var idState = this.value;
            $('#city-dd').html('');
            $.ajax({
            url: "/api/fetch-cities",
            type: 'POST',
            dataType: 'json',
            data: {state_id: idState,_token:"<?php echo e(csrf_token()); ?>"},
            success:function(response){
                $('#city-dd').html('<option value="">Select City</option>');
                $.each(response.cities,function(index, val){
                $('#city-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                });
            }
            })
        });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BNS\BloodUnity\resources\views/search.blade.php ENDPATH**/ ?>