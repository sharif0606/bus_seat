@extends('frontend.app')
@section('content')
    <div class="container-fluid  mb-5">
        <div class="row mx-1">
            <div class="col-sm-2 col-md-2 col-lg-2 box ">
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8 ">
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12  ">
                        <div class=" poem_title">

                            <h4 class="mt-2 fw-bold">{{$page->page_title }}</h4>
                            <hr>
                            {!!$page->details !!}
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-sm-2 col-md-2 col-lg-2 box "></div>
        </div>
    </div>

@endsection