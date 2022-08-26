<div>
    <x-loading-indicator />
    <!-- Content Wrapper. Contains page content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">العملاء</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item active">العملاء</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset($user->avatar)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->doctor->full_name}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>التخصص </b> <a class="float-right">{{$user->doctor->specialization->name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>الموبايل</b> <a class="float-right">{{$user->doctor->mobile}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>الجنس</b> <a class="float-right">{{$user->doctor->gender}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>العمر</b> <a class="float-right">{{age($user->doctor->birthday)}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
           
              
                <div class="card card-primary card-outline">
                    <div class="card-body">
                      <h5 class="card-title">{{$user->doctor->clinic->first()->name}}</h5>
      
                      <p class="card-text">
                        {{$user->doctor->clinic->first()->describe_specialize}}
                      </p>
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>بريد الكتروني </b> <a class="float-right">{{$user->doctor->clinic->first()->email}}</a>
                        </li>
                        <li class="list-group-item">
                          <b>الموبايل</b> <a class="float-right">{{$user->doctor->clinic->first()->mobile}}</a>
                        </li>
                        <li class="list-group-item">
                          <b>رقم تلفون </b> <a class="float-right">{{$user->doctor->clinic->first()->another_mobile}}</a>
                        </li>
                        <li class="list-group-item">
                          <b>واتس اب</b> <a class="float-right">{{$user->doctor->clinic->first()->whatsapp_number}}</a>
                        </li>
                      </ul>
                    </div>
                  </div>
             
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
