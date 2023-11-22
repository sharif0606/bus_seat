@extends('layout.app')
@section('pageTitle',trans('About Page'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <div>
                    <a class="btn btn-sm btn-primary float-end" href="{{route(currentUser().'.about_setting.create')}}"><i class="bi bi-plus"></i></a>
                </div>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Header_image')}}</th>
                                <th scope="col">{{__('About_title')}}</th>
                                <th scope="col">{{__('About_description')}}</th>
                                <th scope="col">{{__('Mission_title')}}</th>
                                <th scope="col">{{__('Mission_description')}}</th>
                                <th scope="col">{{__('Mission_image_1')}}</th>
                                <th scope="col">{{__('Mission_image_2')}}</th>
                                <th scope="col">{{__('Mission_image_3')}}</th>
                                <th scope="col">{{__('status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($setting as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                 <td><img width="50px" src="{{asset('uploads/about_setting/about_image/'.$p->about_image)}}" alt="image"></td>
                                <td>{{$p->about_title_en}}</td>
                                <td>{{$p->about_description_en}}</td>
                                <td>{{$p->mission_title_en}}</td>
                                <td>{{$p->mission_description_en}}</td>
                                <td><img width="50px" src="{{asset('uploads/about_setting/mission_image/'.$p->mission_image_1)}}" alt="image"></td>
                                <td><img width="50px" src="{{asset('uploads/about_setting/mission_image/'.$p->mission_image_2)}}" alt="image"></td>
                                <td><img width="50px" src="{{asset('uploads/about_setting/mission_image/'.$p->mission_image_3)}}" alt="image"></td>
                                <td>@if($p->status == 1) {{__('Active') }} @else {{__('Inactive') }} @endif</td>
                                <!-- or <td>{{ $p->status == 1?"Active":"Inactive" }}</td>-->
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.about_setting.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route(currentUser().'.about_setting.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">No Pruduct Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection