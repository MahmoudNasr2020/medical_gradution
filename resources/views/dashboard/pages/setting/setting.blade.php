@extends('dashboard.layouts.index')
@section('content')
    <div class="col-12 py-3">
        <div class="container">
            <div class=" d-flex row m-0">
                <div class="col-12 col-lg-6 my-2" style="width: 100%;">
                    <form id="validate-form" class="row" method="POST"
                          action="{{ route('dashboard.setting.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-lg-12 p-0 main-box">
                            <div class="col-12 px-0">
                                <div class="col-12 px-3 py-3">
                                    <span class="fas fa-info-circle" style="padding-left: 5px;"></span>الاعدادات
                                </div>
                                <div class="col-12 divider" style="min-height: 2px;"></div>
                            </div>

                            <div class="col-12 p-3 row">
                                <div class="col-12 col-lg-12 p-2">
                                    <div class="col-12">
                                        اسم الموقع
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="text" name="site_name" required  class="form-control"
                                               value="{{ settings()->site_name }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 p-3 row">
                                <div class="col-12 col-lg-12 p-2">
                                    <div class="col-12">
                                        اللوجو
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="file" name="logo"  class="form-control"  accept="image/*" >
                                    </div>
                                    <div class="col-12 pt-3">
                                        <img src="{{ settings()->logo }}" style="width: 200px; height: 200px;">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 p-3">
                            <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
