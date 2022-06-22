@extends('dashboard.layouts.index')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">
            <form id="validate-form" class="row" method="POST" action="{{route('dashboard.admin.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-lg-12 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle" style="padding-left: 5px;"></span>إضافة مسؤول جديد
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>

                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                الاسم
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="name" required  class="form-control" value="" >
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                البريد
                            </div>
                            <div class="col-12 pt-3">
                                <input type="email" name="email" required  class="form-control" value="" >
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                كلمة السر
                            </div>
                            <div class="col-12 pt-3">
                                <input type="password" name="password" required  class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                تاكيد كلمة السر
                            </div>
                            <div class="col-12 pt-3">
                                <input type="password" name="password_confirmation" required  class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                الصورة
                            </div>
                            <div class="col-12 pt-3">
                                <input type="file" name="image"  class="form-control"  accept="image/*" >
                            </div>
                        </div>
                    </div>
                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                </div>
            </form>
        </div>
    </div>
@stop

