@extends('layout.app')
@section('pageTitle',trans('Category'))
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
                    <a class="btn btn-sm btn-primary float-end" href="{{route(currentUser().'.category.create')}}"><i class="bi bi-plus"></i></a>
                </div>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('image')}}</th>
                                <th scope="col">{{__('Category_EN')}}</th>
                                <th scope="col">{{__('Category_BN')}}</th>
                                <th scope="col">{{__('Slug')}}</th>
                                <th scope="col">{{__('Top Menu')}}</th>
                                <th scope="col">{{__('Bottom Menu')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($category as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td><img width="50px" src="{{asset('uploads/category/image/'.$p->image)}}" alt="image"></td>
                                <td>{{$p->category_en}}</td>
                                <td>{{$p->category_bn}}</td>
                                <td>{{$p->slug}}</td>
                                <td>{{$p->top_menu?"Yes":"No"}}</td>
                                <td>{{$p->front_bottom?"Yes":"No"}}</td>
                                <td>@if($p->status == 1) {{__('Active') }} @else {{__('Inactive') }} @endif</td>
                                <!-- or <td>{{ $p->status == 1?"Active":"Inactive" }}</td>-->
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.category.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    {{-- <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a> --}}
                                    <form id="form{{$p->id}}" action="{{route(currentUser().'.category.destroy',encryptor('encrypt',$p->id))}}" method="post">
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