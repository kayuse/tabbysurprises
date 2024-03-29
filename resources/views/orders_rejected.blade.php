@extends('layouts.app')
@section('content')
    <div class="main-panel">
        <!-- Navbar -->
    @include('layouts.navbar')
    <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-danger">
                                <h4 class="card-title ">Rejected Orders</h4>
                                <p class="card-category"> Here are orders that have been rejected</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-black-50">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone Number
                                        </th>
                                        <th>
                                            Celebration Type
                                        </th>
                                        <th>
                                            Action
                                        </th>

                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>
                                                    {{$order->id}}
                                                </td>
                                                <td>
                                                    {{$order->client->firstname}}  {{$order->client->lastname}}
                                                </td>
                                                <td>
                                                    {{$order->client->email}}
                                                </td>
                                                <td>
                                                    {{$order->client->phonenumber}}
                                                </td>
                                                <td class="text-primary">
                                                    {{$order->celebration_type}}
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-facebook btn-sm">More... > </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
