
<?php $__env->startSection('content'); ?>
  <div class="container outer" style="margin-top:70px;">
  <div class="container-fluid">
    <form action="<?php echo e(route('donor.store')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <h3 class="text-center">DONOR REGISTER FORM</h3>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control <?php echo e($errors->has('name')?'is-invalid':''); ?>" name="name" id="name" placeholder="Name"  required value="<?php echo e(old('name')); ?>">
            <?php if($errors->has('name')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('name')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control <?php echo e($errors->has('email')?'is-invalid':''); ?>" name="email" id="email" placeholder="Email"  required value="<?php echo e(old('email')); ?>">
            <?php if($errors->has('email')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control <?php echo e($errors->has('password')?'is-invalid':''); ?>" name="password" id="password" placeholder="Password" />
              <?php if($errors->has('password')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
            <?php endif; ?>
            </div>
            <div class="form-group col-md-6">
              <label for="password2">Re-Type Password</label>
              <input type="password" class="form-control <?php echo e($errors->has('password')?'is-invalid':''); ?>" name="password_confirmation" id="password2" placeholder="Password">
              <?php if($errors->has('password')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
            <?php endif; ?>
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="mobile">Phone Number</label>
            <input type="text" class="form-control <?php echo e($errors->has('phone')?'is-invalid':''); ?>" name="phone" id="mobile" placeholder="Phone No."  required value="<?php echo e(old('phone')); ?>">
            <?php if($errors->has('phone')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('phone')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-8">
            <label for="inputAddress">Address</label>
           <input type="text" class="form-control <?php echo e($errors->has('address')?'is-invalid':''); ?>" name="address" id="inputAddress" placeholder="Address.."  required value="<?php echo e(old('address')); ?>">
           <?php if($errors->has('address')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('address')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
       </div>
        <div class="form-row">
          <div class="form-group col-md-4">
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
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="state-dd" name="state" class="form-control <?php echo e($errors->has('state')?'is-invalid':''); ?>"  required value="<?php echo e(old('state')); ?>"></select>
            <?php if($errors->has('state')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('state')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-4">
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
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="btStatus">Blood Group</label>
            <select id="bStatus" name="bgroup" class="form-control <?php echo e($errors->has('bgroup')?'is-invalid':''); ?>"  required value="<?php echo e(old('bgroup')); ?>">
              <option>Select BloodGroup</option>
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
          <div class="form-group col-md-4">
              <label for="inputStatus">Confirm your availability to donate blood</label>
              <select id="inputStatus" name="is_avail" class="form-control <?php echo e($errors->has('is_avail')?'is-invalid':''); ?>"  required value="<?php echo e(old('is_avail')); ?>">
                <option>Available</option>
                <option>Unavailable</option>
              </select>
              <?php if($errors->has('is_avail')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('is_avail')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-4">
            <label for="last_don">Last Donated</label>
           <input type="date" class="form-control <?php echo e($errors->has('last_donated')?'is-invalid':''); ?>" name="last_donated" id="last_don" placeholder="Address.." value="<?php echo e(old('last_donated')); ?>">
           
          </div>
        </div>
         <p class="text-center"><button type="submit" class="btn btn-primary ">Register</button></p>
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
                $('#city-dd').html('<option value="">Select State</option>');
                $.each(response.cities,function(index, val){
                $('#city-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                });
            }
            })
        });
        });
    </script>
    </script>
    <?php $__env->stopSection(); ?>
<!-- </body>
</html> -->

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BNS\BloodUnity\resources\views/create.blade.php ENDPATH**/ ?>