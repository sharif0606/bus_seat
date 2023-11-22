@extends('layout.app')
@section('pageTitle',trans('Post'))
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
                    <a class="btn btn-sm btn-primary float-end" href="{{route(currentUser().'.post.create')}}"><i class="bi bi-plus"></i></a>
                </div>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Image')}}</th>
                                <th scope="col">{{__('Category_id')}}</th>
                                <th scope="col">{{__('Title_EN')}}</th>
                                <th scope="col">{{__('Title_BN')}}</th>
                                <th scope="col">{{__('Short Text EN')}}</th>
                                <th scope="col">{{__('Short Text_BN')}}</th>
                                <th scope="col">{{__('Text_EN')}}</th>
                                <th scope="col">{{__('Text_BN')}}</th>
                                <th scope="col">{{__('Publish_date')}}</th>
                                <th scope="col">{{__('Unpublish_date')}}</th>
                                <th scope="col">{{__('Featured')}}</th>
                                <th scope="col">{{__('Front_right')}}</th>
                                <th scope="col">{{__('Front_bottom')}}</th>
                                <th scope="col">{{__('User_id')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($post as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td><img width="50px" src="{{asset('uploads/post/image/'.$p->image)}}" alt="image"></td>
                                <td>{{$p->category_id}}</td>
                                <td>{{$p->title_en}}</td>
                                <td>{{$p->title_bn}}</td>
                                <td>{{$p->short_text_en}}</td>
                                <td>{{$p->short_text_bn}}</td>
                                <td>{{$p->text_en}}</td>
                                <td>{{$p->text_bn}}</td>
                                <td>{{$p->publish_date}}</td>
                                <td>{{$p->unpublish_date}}</td>
                                <td>{{$p->featured}}</td>
                                <td>{{$p->front_right}}</td>
                                <td>{{$p->front_bottom}}</td>
                                <td>{{$p->user_id}}</td>
                                <td>@if($p->status == 1) {{__('Active') }} @else {{__('Inactive') }} @endif</td>
                                <!-- or <td>{{ $p->status == 1?"Active":"Inactive" }}</td>-->
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.post.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route(currentUser().'.post.destroy',encryptor('encrypt',$p->id))}}" method="post">
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