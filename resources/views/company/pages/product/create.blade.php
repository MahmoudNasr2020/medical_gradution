@extends('company.layouts.index')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">
            <form id="validate-form" class="row" method="POST" action="{{route('company.product.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-lg-12 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle" style="padding-left: 5px;"></span>إضافة جديد
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>
                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                القسم
                            </div>
                            <div class="col-12 pt-3">
                                <select class="form-control" name="category_id">
                                    <option value="0">اختار القسم</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                اسم المنتج
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="name" required maxlength="190" class="form-control" value="" >
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                سعر المنتج
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="price" required maxlength="190" class="form-control" value="" >
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                الدولة المنتجة
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="production_country" required maxlength="190" class="form-control" value="" >
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

                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                الوصف
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="description" class="form-control"></textarea>
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
@stop

