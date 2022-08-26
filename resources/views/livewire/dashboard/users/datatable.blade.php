<div>
    <x-loading-indicator />

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
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-2 d-flex justify-content-between">
                        <x-search-input wire:model.lazy="searchTerm" searchTerm="{{ $searchTerm }}" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">البريد الالكتروني</th>
                                        <th scope="col">رقم الهاتف</th>
                                        <th scope="col">التخصص</th>
                                        <th scope="col">النوع</th>
                                        <th scope="col">الحالة</th>
                                        <th scop="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            {{ optional($user->doctor)->mobile }}
                                        </td>
                                        <td>
                                            {{ ($user->doctor()->exists()) ? $user->doctor->specialization->name : '' }}
                                        </td>
                                        <td>
                                            {{ ($user->doctor()->exists()) ? $user->doctor->gender_label : '' }}
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $user->status_badge }}">{{ $user->status_label }}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.users.show',$user)}}">
                                                <i class="mr-2 fa fa-edit"></i>
                                            </a>

                                            <a href=""
                                                wire:click.prevent="confirmAppointmentRemoval({{ $user->id }})">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="7">
                                        <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="لا توجد سجلات">
                                        <p class="mt-2">لا توجد سجلات</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <x-confirmation-alert />
</div>
