@extends('company.layouts.index')
@section('styles')
    <style type="text/css">
        .croppie-container .cr-viewport{
            box-shadow: 0 0 2000px 2000px rgba(0,0,0,0.5)!important;
        }
        .cr-image{
            opacity: 1; transform: translate3d(-26.8762px, -9.88808px, 0px) scale(1.0007); transform-origin: 176.876px 159.888px;
        }
        .ltr , .ltr *{
            direction: ltr!important;
            text-align: unset;
        }
    </style>
@endsection

@section('content')
    <div class="col-12 py-3">
        <div class="container">
            <div class=" d-flex row m-0">
                <div class="col-12 col-lg-6 my-2" style="width: 100%;">
                    <form id="validate-form" class="row" method="POST"
                          action="{{route('company.profile.update',['id'=>\Illuminate\Support\Facades\Auth::guard('company')->user()->id])}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-lg-12 p-0 main-box">
                            <div class="col-12 px-0">
                                <div class="col-12 px-3 py-3">
                                    <span class="fas fa-info-circle" style="padding-left: 5px;"></span>تعديل البيانات
                                </div>
                                <div class="col-12 divider" style="min-height: 2px;"></div>
                            </div>

                            <div class="col-12 p-3 row">
                                <div class="col-12 col-lg-12 p-2">
                                    <div class="col-12">
                                        اسم الشركة
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="text" name="name" required  class="form-control"
                                               value="{{ \Illuminate\Support\Facades\Auth::guard('company')->user()->name }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 p-3 row">
                                <div class="col-12 col-lg-12 p-2">
                                    <div class="col-12">
                                        البريد الالكتروني
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="email" name="email" required  class="form-control"
                                               value="{{ \Illuminate\Support\Facades\Auth::guard('company')->user()->email }}" >
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 p-3 row">
                                <div class="col-12 col-lg-12 p-2">
                                    <div class="col-12">
                                        رقم الهاتف
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="text" name="phone_number" required  class="form-control"
                                               value="{{ \Illuminate\Support\Facades\Auth::guard('company')->user()->phone_number }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 p-3 row">
                                <div class="col-12 col-lg-12 p-2">
                                    <div class="col-12">
                                        العنوان
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="text" name="location" required  class="form-control"
                                               value="{{ \Illuminate\Support\Facades\Auth::guard('company')->user()->location }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 p-3 row">
                                <div class="col-12 col-lg-12 p-2">
                                    <div class="col-12">
                                        كلمة السر
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="password" name="password"  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 p-3 row">
                                <div class="col-12 col-lg-12 p-2">
                                    <div class="col-12">
                                         تاكيد كلمة السر
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="password" name="password_confirmation"  class="form-control">
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
                                    <div class="col-12 pt-3">
                                        <img src="{{ \Illuminate\Support\Facades\Auth::guard('company')->user()->image }}" style="width: 200px; height: 200px;">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id" value="{{ \Illuminate\Support\Facades\Auth::guard('company')->user()->id }}">

                        </div>

                        <div class="col-12 p-3">
                            <button class="btn btn-success" id="submitEvaluation">تعديل</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var $uploadCrop = $('#avatar-image-selector').croppie({
                aspectRatio:1,
                viewport: {
                    width: 300,
                    height: 300,
                    type: 'square'
                },
                boundary: {
                    width: 350,
                    height: 350
                },
                enableExif: true
            });

            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#changeAvatarBtn').click();
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        }).then(function(){

                        });
                    }
                    reader.readAsDataURL(input.files[0]);
                    $('.cr-image').css(
                        {
                            'transform':'translate3d(0px, 0px, 0px) scale(0.9787)',
                            'transform-origin':'0px 0px'
                        }
                    );
                    $('.cr-overlay').css(
                        {
                            'width':'667.8px',
                            'height':'667.8px',
                            'top':'-26.2914px',
                            'left':'-129.291px',
                            'cr-overlay':'5'
                        }
                    );
                    $('.cr-slider').attr({'min':0.1, 'max':1.5});
                }
                else {
                }
            }
            function popupResult(result) {
                $('#getUserAvatar').attr('src',result.src);
                $('#changeAvatar .btn-close').click();
                $('#encoded_image').val(result.src);

            }

            $('#avatar-image').on('change', function () {
                readFile(this);
            });
            $('.save-image').on('click', function (ev) {
                $uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (resp) {
                    popupResult({
                        src: resp
                    });
                });
            });
        });
    </script>
@endsection
