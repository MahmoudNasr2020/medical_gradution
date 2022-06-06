@extends('dashboard.layouts.index')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">
            <form id="validate-form" class="row"  method="POST" action="{{route('dashboard.category.update',$data->id)}}">
                @csrf
                @method('PUT')
                <div class="col-12 col-lg-12 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle" style="padding-left: 5px;"></span>تعديل القسم
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>
                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                اسم القسم
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="category_name" required  maxlength="190" class="form-control" value="{{ $data->category_name }}" >
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $data->id }}">

                </div>

                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">تعديل</button>
                </div>
            </form>
        </div>
    </div>
@stop

