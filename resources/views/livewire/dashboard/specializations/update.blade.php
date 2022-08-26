<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark">Appointments</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item active"><a href="">التخصصات</a></li>
                        <li class="breadcrumb-item active">تعديل تخصص</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form wire:submit.prevent="update" autocomplete="off">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">تعديل بيانات تخصص</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_ar">الاسم (العربية):</label>
                                            <input type="text" wire:model.defer="specialization.name_ar"  id="name_ar" class="form-control @error('specialization.name_ar') is-invalid @enderror">
                                            @error('specialization.name_ar')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_en">الاسم (الإنجليزية):</label>
                                            <input type="text" wire:model.defer="specialization.name_en"  id="name_en" class="form-control @error('specialization.name_en') is-invalid @enderror">
                                            @error('specialization.name_en')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="active">الحالة:</label>
                                            <select wire:model.defer="specialization.active" id="active" class="form-control @error('specialization.active') is-invalid @enderror">
                                                <option value="">اختر الحالة</option>
                                                <option value="1">مفعل</option>
                                                <option value="0">معطل</option>
                                            </select>
                                            @error('specialization.active')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button id="submit" type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i> حفظ</button>
                                <a href="{{ route('admin.specializations.index') }}" class="btn btn-secondary"><i class="fa fa-undo mr-1"></i> عودة</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
