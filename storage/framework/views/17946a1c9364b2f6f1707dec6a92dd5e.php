<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark p-1" style="background-color: rgba(0, 0, 0, 0.7); backdrop-filter: blur(4px);">
        <div class="container-fluid">
          <a class="navbar-brand p-3 " href="#">
            <img src="./images/logo.png">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0 p-3">
              <li class="nav-item mr-4 mt-md-2 mt-lg-0 ">
                <a class="nav-link active" aria-current="page" href="<?php echo e(route('donor.index')); ?>">Home</a>
              </li>
              <li class="nav-item mr-4 mt-md-2 mt-lg-0">
                <a class="nav-link" href="<?php echo e(route('donor.index')); ?>">About</a>
              </li>
              <li class="nav-item  mr-4 mt-md-2 mt-lg-0">
                <a class="nav-link" href="<?php echo e(route('donor.create')); ?>">Want to Donate Blood</a>
              </li>
              <li class="nav-item mr-4 mt-md-2 mt-lg-0">
                <a class="nav-link " href="<?php echo e(route('donor.search')); ?>" >Looking for Blood</a>
              </li>
              <li class="nav-item mr-4 mt-md-2 mt-lg-0">

                <a class="nav-link text-primary " href="<?php echo e(route('donor.login')); ?>" >Logout</a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>

      <?php if(session()->has('updateSuccess')): ?>
<div class="alert alert-success">
     <?php echo e(session()->get('updateSuccess')); ?>

</div>
<?php endif; ?>


      <div class="container outer" style="margin-top:70px;">
  <div class="container-fluid">
    <form action="<?php echo e(route('donor.profile.update',$donor->id)); ?>" method="POST">
        <?php echo method_field('PUT'); ?>    
        <?php echo csrf_field(); ?>
      <h3 class="text-center">Edit Details</h3>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control <?php echo e($errors->has('name')?'is-invalid':''); ?>" name="name" id="name" placeholder="Name"  required value="<?php echo e($donor->name); ?>">
            <?php if($errors->has('name')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('name')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control <?php echo e($errors->has('email')?'is-invalid':''); ?>" name="email" id="email" placeholder="Email"  required value="<?php echo e($donor->email); ?>">
            <?php if($errors->has('email')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
        </div>
        <!-- <div class="form-row">
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
        </div> -->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="mobile">Phone Number</label>
            <input type="text" class="form-control <?php echo e($errors->has('phone')?'is-invalid':''); ?>" name="phone" id="mobile" placeholder="Phone No."  required value="<?php echo e($donor->phone); ?>">
            <?php if($errors->has('phone')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('phone')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-8">
            <label for="inputAddress">Address</label>
           <input type="text" class="form-control <?php echo e($errors->has('address')?'is-invalid':''); ?>" name="address" id="inputAddress" placeholder="Address.."  required value="<?php echo e($donor->address); ?>">
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
            <select id="country-dd" name="country" class="form-control <?php echo e($errors->has('country')?'is-invalid':''); ?>"  required value="<?php echo e($donor->country); ?>">
              <option value="<?php echo e($donor->country); ?>"><?php echo e($donor->country); ?></option>
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
            <select id="state-dd" name="state" class="form-control <?php echo e($errors->has('state')?'is-invalid':''); ?>"  required value="<?php echo e(old('state')); ?>">
                <option value="<?php echo e($donor->state); ?>"><?php echo e($donor->state); ?></option>
            </select>
            <?php if($errors->has('state')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('state')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">City</label>
            <select id="city-dd" name="city" class="form-control <?php echo e($errors->has('state')?'is-invalid':''); ?>"  required value="<?php echo e(old('city')); ?>">
            <option value="<?php echo e($donor->city); ?>"><?php echo e($donor->city); ?></option>
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
            <option value="<?php echo e($donor->bgroup); ?>"><?php echo e($donor->bgroup); ?></option>
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
                <?php if($donor->is_avail == 'Available'): ?>
                    <option><?php echo e($donor->is_avail); ?></option>
                    <option>Unavailable</option>
                <?php else: ?>
                 <option><?php echo e($donor->is_avail); ?></option>
                  <option>Available</option>
                <?php endif; ?>
              </select>
              <?php if($errors->has('is_avail')): ?>
            <span class="invalid-feedback" >
                <strong><?php echo e($errors->first('is_avail')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-4">
              <label for="last_don">Last Donated</label>
            
           <input type="date" class="form-control <?php echo e($errors->has('last_donated')?'is-invalid':''); ?>" name="last_donated" id="last_don" placeholder="Address.." value="<?php echo e($donor->last_donated); ?>">
           
          </div>
        </div>
         <p class="text-center"><button type="submit" class="btn btn-primary ">Update</button></p>
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
      </body>
</html><?php /**PATH D:\BNS\BloodUnity\resources\views/edit.blade.php ENDPATH**/ ?>