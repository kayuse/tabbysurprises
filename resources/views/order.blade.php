@extends('layouts.app')
@section('content')
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#pablo">Upgrade to PRO</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <form class="navbar-form">
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <i class="material-icons">dashboard</i>
                                <p class="d-lg-none d-md-block">
                                    Stats
                                </p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="d-lg-none d-md-block">
                                    Some Actions
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                <a class="dropdown-item" href="#">Another Notification</a>
                                <a class="dropdown-item" href="#">Another One</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="card">
                            <div class="card-header card-header">
                                <h4 class="card-title">Order Details</h4>
                                <p class="card-category">
                                    Full job request information.
                                </p>
                                @if($order->is_confirmed == 1)
                                    <div class="alert alert-info">This Order has been accepted</div>
                                @endif
                                @if($order->is_confirmed == 2)
                                    <div class="alert alert-danger">This Order has been canceled</div>
                                @endif
                                @if($order->is_confirmed == 1 && $order->payment_status > 0)
                                    <div class="alert alert-success">This Order has been paid for</div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-upgrade">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="2" align="center" style="font-size:24px;">
                                                Client Details
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td align="left">{{$order->client->firstname}} {{$order->client->lastname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$order->client->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td align="left">{{$order->client->phonenumber}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center" style="font-size:24px;">
                                                Order Details
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Celebrant Name</td>
                                            <td>{{$order->celebrant_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Day of Surprise</td>
                                            <td>{{date('g:i A; d F, Y',strtotime($order->celebration_time))}}</td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons">my_location</i> Location</td>
                                            <td>{{$order->celebration_address}}</td>
                                        </tr>
                                        @if($order->is_confirmed)
                                            <tr>
                                                <td>Amount</td>
                                                <td>₦{{number_format($order->amount)}}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td>Services</td>
                                            <td>
                                                @foreach($order->services as $service)
                                                    <h6 class="card-description">Service: {{$service->name}}</h6>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Payment Status</td>
                                            <td>
                                                @foreach($order->services as $service)
                                                    <h6 class="card-description">Service: {{$service->name}}</h6>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-primary">Supporting Files</div>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" colspan="2">
                                                @if($order->is_confirmed != 1)
                                                    <a href="#pablo" class="btn btn-success btn-round"
                                                       id="confirm-order"> <i
                                                            class="material-icons">done</i>
                                                        Confirm Order</a>
                                                @endif
                                                @if($order->is_confirmed != 2)
                                                    <a href="" class="btn btn-danger btn-round" id="cancel-order"> <i
                                                            class="material-icons">cancel</i>
                                                        Cancel Order</a>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                        <form id="confirm-order-form" action="{{route('order.confirm')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="order" value="{{$order->id}}"/>
                                            <input type="hidden" name="amount" id="amount"/>
                                        </form>
                                        <form id="cancel-order-form" action="{{route('order.cancel')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="order" value="{{$order->id}}"/>
                                        </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
            });
            $("#cancel-order").click(function () {
                cancelOrder = confirm('Are you sure you want to cancel this order...');
                if (cancelOrder) {
                    $("#cancel-order-form").submit();
                }
            });
        })
    </script>
@endsection

