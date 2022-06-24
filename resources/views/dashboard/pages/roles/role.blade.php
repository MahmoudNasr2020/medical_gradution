@extends('dashboard.layouts.index')


@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> الادوار والصلاحيات </span>
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 col-lg-4 p-2">
            </div>
            <div class="col-12 col-lg-12 p-2 text-lg-end">
                <a href="{{ route('dashboard.roles.create') }}">
                    <span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
                </a>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    @if($roles->count() > 0)
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th width="280px">التحكم</th>
                            </tr>
                            @php
                             $i=0;
                            @endphp
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-outline-primary" href="{{ route('dashboard.roles.show',$role->id) }}">عرض</a>
                                            <a class="btn btn-outline-success" href="{{ route('dashboard.roles.edit',$role->id) }}">تعديل</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['dashboard.roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('حذف', ['class' => 'btn btn-outline-danger']) !!}
                                            {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
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


@endsection
