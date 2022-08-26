<div>
    <x-loading-indicator />

    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">التخصصات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item active">التخصصات</li>
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
                        <a href="{{ route('admin.specializations.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i> إضافة جديد</a>
                        <x-search-input wire:model.lazy="searchTerm" searchTerm="{{ $searchTerm }}" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الاسم (العربية)</th>
                                        <th scope="col">الاسم (الإنجليزية)</th>
                                        <th scope="col">الحالة</th>
                                        <th scop="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($specializations as $specialization)
                                    <tr>
                                        <th scope="row">{{ $specialization->iteration }}</th>
                                        <td>{{ $specialization->name_ar }}</td>
                                        <td>{{ $specialization->name_en }}</td>
                                        <td>
                                            <span class="badge badge-{{ $specialization->status_badge }}">{{ $specialization->status_label }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.specializations.edit', $specialization) }}">
                                                <i class="mr-2 fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="5">
                                        <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="لا توجد سجلات">
                                        <p class="mt-2">لا توجد سجلات</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            {!! $specializations->links() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
