@extends('dashboard.layouts.index')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> عرض المسؤول
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    الاسم : {{ $data->name }}
                </div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    البريد : {{ $data->email }}
                </div>
            </div>e

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    الادوار :
                    @if(!empty($data->getRoleNames()))
                        @foreach($data->getRoleNames() as $v)
                            <label>{{ $v }}</label>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    الصورة : <br><br>
                    <img src="{{ $data->image }}" style="height: 250px;width: 250px">
                </div>
            </div>
        </div>
    </div>
@stop

