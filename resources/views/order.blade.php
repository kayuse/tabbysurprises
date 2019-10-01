@extends('layouts.app')
@section('style')
    <style>
        .order-ctn {
            text-align: justify;
            padding-left: 20px;
        }

        .order-details-txt {
            font-weight: 500;
        }

        .amount {
            font-weight: 400 !important;
        }

        .order-description {
            font-weight: 400;
            font-size: 16px;
            color: #000000;
        }
    </style>
@endsection
@section('content')
    <div class="main-panel">
        <!-- Navbar -->
    @include('layouts.navbar')
    <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <a href="#pablo">
                                    <img class="img" src="../assets/img/faces/marc.jpg"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <h3 class="card-category text-gray">{{$order->celebration_type}} Celebration</h3>
                                <h4 class="card-title">
                                    Client {{$order->client->firstname}} {{$order->client->firstname}}</h4>
                                <h6 class="card-title">{{$order->client->email}} {{$order->client->firstname}}</h6>
                                <div class="row">
                                    <div class="col-md-8 order-ctn">
                                        <h4 class="order-details-txt">Order Details</h4>
                                        <h5>Celebrant Name: <span class="text-black">{{$order->celebrant_name}}</span>
                                        </h5>
                                        <h5 class="">Address: {{$order->celebrant_name}}</h5>
                                        <h5>Time: {{date('g:i A; d F, Y',strtotime($order->celebration_time))}}</h5>
                                        <h4 class="text-info amount">Amount ₦{{number_format($order->amount)}}</h4>
                                    </div>

                                    <div class="col-md-4">
                                        <h5>Client Details</h5>
                                        <h6 class="card-description">Client
                                            Phonenumber: {{$order->client->phonenumber}}</h6>
                                        <h6 class="card-description">Client Location: {{$order->client->location}}</h6>
                                        <br/>
                                        <h5>Subscribed Service Details</h5>
                                        @foreach($order->services as $service)
                                            <h6 class="card-description">Service: {{$service->name}}</h6>
                                        @endforeach
                                    </div>
                                </div>
                                <p class="card-description">
                                    {{$order->other}}
                                </p>
                                @if($order->is_confirmed != 1)
                                    <a href="#pablo" class="btn btn-success btn-round" id="confirm-order"> <i
                                            class="material-icons">done</i>
                                        Confirm Order</a>
                                @endif
                                @if($order->is_confirmed != 2)
                                    <a href="" class="btn btn-danger btn-round"> <i
                                            class="material-icons">cancel</i>
                                        Cancel Order</a>
                                @endif
                            </div>
                            <div>
                                <form id="confirm-order-form" action="{{route('order.confirm')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="order" value="{{$order->id}}"/>
                                    <input type="hidden" name="amount" id="amount"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $("#confirm-order").click(function () {
                amount = parseInt(prompt('How much do you want to charge'));
                if (amount > 0) {
                    $("#amount").val(amount);
                    $("#confirm-order-form").submit();
                }
            })
        })
    </script>
@endsection

