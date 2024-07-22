@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
اضافة منتج
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{trans('category_trans.categories')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('category_trans.add_category')}}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


    <div class="col-lg-12 col-md-12">

         
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">

                        <a class="btn btn-primary btn-sm" href="{{ route('category.index') }}">{{trans('category_trans.back')}}</a>
                    </div>
                </div><br>
                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                  enctype="multipart/form-data" action="{{route('product.store')}}" method="post">
                    {{csrf_field()}}
                    </div>
                    <div class="row row-sm mg-b-20">
                        <div class="col-lg-6">
                            
                       <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{trans('product_trans.category_name')}}</label>
                            <select name="category_id" id="category_id" class="form-control" required >
                                <option value="" selected disabled> --حدد القسم--</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>                     
                         </div>
                    </div>
                  
                    <div class="">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label> {{trans('product_trans.product_name')}}<span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"data-parsley-class-handler="#lnWrapper" name="product_name" type="text">
                            </div>
                   
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> {{trans('product_trans.description')}}</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">  {{trans('product_trans.image')}} </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper" name="image" required="" type="file">
                            </div>
                           <div class="form-group">
                                <label class="form-label">  {{trans('product_trans.purchase_price')}} </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper" name="purchase_price" required="" type="number">
                            </div>
                          <div  class="form-group">
                                <label class="form-label">  {{trans('product_trans.sale_price')}} </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper" name="sale_price" required="" type="number">
                            </div>
                            <div  class="form-group">
                                <label class="form-label">  {{trans('product_trans.stock')}} </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper" name="stock" required="" type="number">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">{{trans('product_trans.confirm')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')


<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection