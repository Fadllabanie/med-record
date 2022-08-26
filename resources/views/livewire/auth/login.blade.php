@section('title', __('Login'))

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="text-center card-header">
        <span class="h1"><b>السجلات الطبية</b></span>
      </div>
      <div class="card-body">
        <p class="login-box-msg">تسجيل الدخول</p>

        <form wire:submit.prevent="login">
          <div class="input-group">
            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" wire:model.defer="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror

          <div class="mt-3 input-group">
            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" wire:model.defer="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
                <span class="text-danger">{{ $message }}</span>
         @enderror

          <div class="mt-3 row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" wire:model.defer="remember">
                <label for="remember">
                  تذكرني
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">دخول</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>