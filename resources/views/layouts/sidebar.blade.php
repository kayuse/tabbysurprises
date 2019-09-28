<div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Tabby Surprises
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item {{url()->current() == route('dashboard') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('orders.paid') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('orders.paid')}}">
                        <i class="material-icons">notification_important</i>
                        <p>Paid / Incoming Orders </p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('orders.pending') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('orders.pending')}}">
                        <i class="material-icons">list</i>
                        <p>Pending Orders</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('orders.accepted') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('orders.accepted')}}">
                        <i class="material-icons">list</i>
                        <p>Accepted Orders</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('orders.rejected') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('orders.rejected')}}">
                        <i class="material-icons">warning</i>
                        <p>Rejected Orders</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('orders.completed') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('orders.completed')}}">
                        <i class="material-icons">done</i>
                        <p>Completed Orders</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
