@extends('dashboard.layouts.index')
@section('content')
    <div class="col-12 py-3">
        <div class="container">
            <div class="p-3 main-box mx-auto" style="width:600px;max-width: 100%;">
                <div class="d-flex align-items-center justify-content-center py-4">
                    <div class="col-12 d-flex justify-content-center align-items-center mx-auto " style="width:100%">
                        <div class="col-12 p-0 text-center">
                            <img src="{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->image }}" style="width:120px;max-width: 100%;border-radius: 50%;" class="d-inline-block">
                            <div class="col-12 font-3 text-center py-2">
                                {{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-12 p-0">
                    <table class="table table-bordered table-striped rounded table-hover">
                        <tbody>
                        <tr>
                            <td>البريد الإلكتروني</td>
                            <td>{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->email}}</td>
                        </tr>

                        <tr>
                            <td>تحكم</td>
                            <td><a href="{{ route('dashboard.profile.edit') }}" class="btn btn-light btn-sm border"><span class="fal fa-wrench"></span> تعديل</a></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
