<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   @include('dashboard.layouts.fronts.style')
</head>

<body style="background: #f7f7f7" class="dash">
@yield('after-body')
@if(flash()->message)
    @php
        $background = '';
        if(flash()->class == 'alert alert-danger')
        {
             $background = '#FF5751';
        }
        elseif(flash()->class == 'alert alert-success')
        {
             $background = '#219680';
        }
        else
        {
            $background = '#2196f3';
        }
    @endphp
    <div class="{{ flash()->class }}"
         style="position: absolute;z-index: 4444444444444;left: 35px;top: 80px;max-width: calc(100% - 70px);padding: 16px 22px;
         border-radius: 7px;overflow: hidden;width: 273px;border-right: 8px solid #374b52;background:{{ $background }};color: #fff;cursor: pointer;"
         onclick="$(this).slideUp();">
        <span class="fas fa-info-circle"></span> {{ flash()->message }}
    </div>
@endif
<div class="col-12 justify-content-end d-flex">
    @if($errors->any())
        <div class="col-12" style="position: absolute;top: 80px;left: 10px;">
            {!! implode('', $errors->all('<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1"
            style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>')) !!}
        </div>
    @endif
</div>
{{--<div class="modal fade" data-bs-backdrop="static" id="open-image-selector-modal" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog modal-xl  modal-fullscreen-sm-down ">
        <div class="modal-content overflow-hidden">
        <div class="col-12 px-0 d-flex row">

            <div class="col-10 px-3 py-3">
                <span class="fal fa-info-circle"></span>    إختر من الملفات
            </div>
            <div class="col-2 px-3 align-items-center d-flex justify-content-end">
                <span class="far fa-times font-2 cursor-pointer mx-2" data-bs-dismiss="modal"></span>
            </div>

            <div class="col-12 divider" style="min-height: 2px;"></div>

        </div>
          <div class="modal-body p-0">
            <div class="col-12">
                <livewire:files-viewer />
            </div>
          </div>

        </div>
      </div>
    </div>
 --}}
<div class="col-12 d-flex">
    @include('dashboard.layouts.parts.sidebar')
    <div class="main-content in-active" style="overflow: hidden;">
        @include('dashboard.layouts.parts.header')
        <div class="col-12 px-0 py-2" style="margin-top: 60px;">
            @yield('content')
        </div>
    </div>
</div>
<input type="hidden" id="current_selected_editor">
@include('dashboard.layouts.fronts.script')
</body>
</html>
