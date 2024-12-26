
<?php $__env->startSection('content'); ?>
<?php if(session()->has('success')): ?>
<div class="alert alert-success">
     <?php echo e(session()->get('success')); ?>

</div>
<?php endif; ?>


<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
              style="height:100%; object-fit:cover; object-position:center; border-radius: 1rem 0 0 1rem;" 
              src="https://img.freepik.com/free-vector/red-blood-cells-flowing-background_1017-17842.jpg?size=626&ext=jpg"
               alt="login form"
               class="img-fluid" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="<?php echo e(route('donor.profile')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">BloodUnity</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email address:</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg" required/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                  </div>
                    
                  <p> </p>
                  <?php if(session()->has('errorLogin')): ?>
                    <span style="color:red;">
                        <?php echo e(session()->get('errorLogin')); ?>

                    </span>
                    <?php endif; ?>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>

                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p style="color: #393f81;">Want to donate Blood?
                         <a href="<?php echo e(route('donor.create')); ?>" style="color:red;">Register here</a>
                    </p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BNS\BloodUnity\resources\views/login.blade.php ENDPATH**/ ?>