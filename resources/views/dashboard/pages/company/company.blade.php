@extends('dashboard.layouts.index')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> المستخدمين
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >

                    @if($companies->count() > 0)
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">الاسم</th>
                                <th style="text-align: center">البريد</th>
                                <th style="text-align: center">رقم الموبايل</th>
                                <th style="text-align: center">تم الانشاء</th>
                                <th style="text-align: center">تم التعديل</th>
                                <th style="text-align: center">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $k=>$company)
                                <tr>
                                    <td style="text-align: center">{{ $k+1 }}</td>
                                    <td style="text-align: center">{{$company->name}}</td>
                                    <td style="text-align: center">{{ $company->email }}</td>
                                    <td style="text-align: center">{{ $company->phone_number }}</td>
                                    <td style="text-align: center">{{$company->created_at}}</td>
                                    <td style="text-align: center">{{$company->updated_at}}</td>

                                    <td style="width: 180px;text-align: center">

                                        <a href="{{ route('dashboard.company.products',$company->id) }}">
                                            <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                                <span class="fas fa-folders "></span> المنتجات
                                            </span>
                                        </a>
                                        <br>
                                        <br>
                                        <a href="{{ route('dashboard.company.show',$company->id) }}">
                                            <span class="btn  btn-outline-primary btn-sm font-1 mx-1">
                                                <span class="fas fa-eye "></span> عرض
                                            </span>
                                        </a>
                                        <form method="POST" action="{{ route('dashboard.company.destroy',$company->id) }}" class="d-inline-block">
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

