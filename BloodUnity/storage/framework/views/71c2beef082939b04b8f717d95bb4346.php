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
<div class="alert alert-success mb-0">
    <?php echo e($loginSuccess); ?>

</div>
<?php if(session()->has('updateSuccess')): ?>
<div class="alert alert-success">
     <?php echo e(session()->get('updateSuccess')); ?>

</div>
<?php endif; ?>
<div class="alert alert-warning">
Note: Please Update your Blood Availabilty Status and Last Donated Date when you Donate Blood
 
     
</div>




<div class="container outer" style="margin-top:70px;">
  <div class="container-fluid">
      <h3 class="text-center">Profile Details</h3>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name"  readonly value="<?php echo e($donor->name); ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" readonly   value="<?php echo e($donor->email); ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="mobile">Phone Number</label>
            <input type="text" class="form-control" name="phone" id="mobile" readonly   value="<?php echo e($donor->phone); ?>">
          
          </div>
          <div class="form-group col-md-8">
            <label for="inputAddress">Address</label>
           <input type="text" class="form-control" name="address" id="inputAddress" readonly  value="<?php echo e($donor->address); ?>">
           
          </div>
       </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCountry">Country</label>
            <input id="country-dd" name="country" class="form-control" readonly value="<?php echo e($donor->country); ?>">
              
            
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <input id="state-dd" name="state" class="form-control" readonly value="<?php echo e($donor->state); ?>">
            
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">City</label>
            <input id="city-dd" name="city" class="form-control" readonly value="<?php echo e($donor->city); ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="btStatus">Blood Group</label>
            <input id="bStatus" name="bgroup" readonly class="form-control" value="<?php echo e($donor->bgroup); ?>">
           
        </div>
          <div class="form-group col-md-4">
              <label for="inputStatus">Confirm your availability to donate blood</label>
              <input id="inputStatus" name="is_avail" class="form-control" readonly value="<?php echo e($donor->is_avail); ?>">
             
          </div>
          <div class="form-group col-md-4">
            <label for="last_don">Last Donated</label>
           <input type="text" class="form-control" name="last_donated" id="last_don" readonly value="<?php echo e($donor->last_donated); ?>">
           
          </div>
        </div>
         <a class="text-center" href="<?php echo e(route('donor.profile.edit',$donor->id)); ?>">
            <button type="" class="btn btn-primary ">Edit Details</button>
        </a>
      </div>
    </div>
</body>
</html>
<?php /**PATH D:\BNS\BloodUnity\resources\views/show.blade.php ENDPATH**/ ?>