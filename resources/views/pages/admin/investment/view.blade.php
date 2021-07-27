@extends('layouts.admin')
@section('sidebar')
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-text mx-3">SyariahRooms Adm</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/promo">
                <i class="fas fa-fw fa-hotel"></i>
                <span>Promo</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/travel">
                <i class="fas fa-fw fa-images"></i>
                <span>Tour Travel</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/property">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Property</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/admin/investment">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Investment</span></a>
        </li>


        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
@endsection
@section('content')
<div class="container">
    <h1>Contents Manager (Investment)</h1>
        <a href="{{ route('investment.create') }}" class="btn btn-success mb-2">Add</a>
        <br>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered" id="laravel_crud">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Investment Code</th>
                            <th>Description</th>
                            <th>Gambar</th>
                            <th>Created at</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($investments as $investment)
                        <tr>
                            <td>{{ $investment->id }}</td>
                            <td>{{ $investment->title }}</td>
                            <td>{{ $investment->travel_code }}</td>
                            <td>{{ $investment->description }}</td>
                            <td><img src="{{ url('asset/img/', $investment->image) }}" alt="" width="200rem"></td>
                            <td>{{ date('Y-m-d', strtotime($investment->created_at)) }}</td>
                            <td><a href="{{ route('investment.edit',$investment->id)}}" class="btn btn-primary">Edit</a></td>
                            <td>
                            <form action="{{ route('investment.destroy', $investment->id)}}" method="post">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            {!! $investments->links() !!}
            </div>
        </div>
    </div>
@endsection
