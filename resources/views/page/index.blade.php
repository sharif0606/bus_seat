@extends('layout.app')
@section('pageTitle',trans('Pages'))
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
                    <a class="btn btn-sm btn-primary float-end" href="{{route(currentUser().'.page.create')}}"><i class="bi bi-plus"></i></a>
                </div>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Page Title')}}</th>
                                <th scope="col">{{__('Publshed')}}</th>
                                <th scope="col">{{__('Language')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($page as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->page_title}}</td>
                                <td>{{$p->published?"Yes":"No"}}</td>
                                <td>{{$p->language=="en"?"English":"Bangla"}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.page.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route(currentUser().'.page.destroy',encryptor('encrypt',$p->id))}}" method="post">
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