@extends('layout.app')
@section('pageTitle',trans('Booking List'))
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
                    <a class="btn btn-sm btn-primary float-end" href="{{route(currentUser().'.booking.create')}}"><i class="bi bi-plus"></i></a>
                </div>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Contact_no')}}</th>
                                <th scope="col">{{__('Tour_date')}}</th>
                                <th scope="col">{{__('Booking_date')}}</th>
                                <th scope="col">{{__('Number_of_seat')}}</th>
                                <th scope="col">{{__('Price')}}</th>
                                <th scope="col">{{__('Total_price')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($booking as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->name}}</td>
                                <td>{{$p->contact_no}}</td>
                                <td>{{$p->tour_date}}</td>
                                <td>{{$p->booking_date}}</td>
                                <td>{{$p->number_of_seat}}</td>
                                <td>{{$p->price}}</td>
                                <td>{{$p->total_price}}</td>
                                <td>{{ $p->status == 1?"Active":"Inactive" }}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.booking.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route(currentUser().'.booking.destroy',encryptor('encrypt',$p->id))}}" method="post">
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