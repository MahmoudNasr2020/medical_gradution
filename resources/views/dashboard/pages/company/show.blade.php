@extends('dashboard.layouts.index')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> عرض الشركة
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    اسم الشركة : <span style="font-weight: bold">{{ $data->name }}</span>
                </div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    الايميل : <span style="font-weight: bold">{{ $data->email }}</span>
                </div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    رقم الهاتف: <span style="font-weight: bold">{{ $data->phone_number }}</span>
                </div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    العنوان : <span style="font-weight: bold">{{ $data->location }}</span>
                </div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    @php
                        $products = \App\Models\BestSeller::all();
                            $total_price = 0;
                            foreach ($products as $product)
                            {
                                $item = \App\Models\Product::where(['id'=>$product->product_id,'company_id'=>$data->id])->first();
                                if($item)
                                {
                                    $total_price = $total_price + ($product->quantity * $item->price);
                                }
                            }
                    @endphp
                    ارباحنا : <span style="font-weight: bold"> {{ $total_price * (settings()->commission / 100) }} جنيه</span>
                </div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    المنتجات الخاصة بالشركة : <br><br>
                    <a href="{{ route('dashboard.user.orders',['id'=>$data->id]) }}"><button class="btn btn-outline-success"> المنتجات</button></a>
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

