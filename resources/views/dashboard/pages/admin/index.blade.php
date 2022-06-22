@extends('dashboard.layouts.index')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> المسؤولين
                    </div>

                    <div class="col-12 col-lg-4 p-2">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-end">
                        <a href="{{ route('dashboard.admin.create') }}">
                            <span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
                        </a>
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >

                    @if($admins->count() > 0)
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">الاسم</th>
                                <th style="text-align: center">البريد</th>
                                <th style="text-align: center">تم الانشاء</th>
                                <th style="text-align: center">تم التعديل</th>
                                <th style="text-align: center">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $k=>$admin)
                                <tr>
                                    <td style="text-align: center">{{ $k+1 }}</td>
                                    <td style="text-align: center">{{$admin->name}}</td>
                                    <td style="text-align: center">{{ $admin->email }}</td>
                                    <td style="text-align: center">{{$admin->created_at}}</td>
                                    <td style="text-align: center">{{$admin->updated_at}}</td>

                                    <td style="width: 180px;text-align: center">

                                        <a href="{{ route('dashboard.admin.show',$admin->id) }}">
                                            <span class="btn  btn-outline-primary btn-sm font-1 mx-1">
                                                <span class="fas fa-eye "></span> عرض
                                            </span>
                                        </a>

                                        <a href="{{ route('dashboard.admin.edit',$admin->id) }}">
                                            <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                                <span class="fas fa-pen "></span> تعديل
                                            </span>
                                        </a>
                                        <form method="POST" action="{{ route('dashboard.admin.destroy',$admin->id) }}" class="d-inline-block mt-2">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn  btn-outline-danger btn-sm font-1 mx-1" type="submit"
                                                    onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');
                                                    if(result){}
                                                    else{event.preventDefault()}">
                                                <span class="fas fa-trash "></span> حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else

                        <div class="font-3" style="text-align: center">
                            لا توجد بيانات متاحة
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@stop

