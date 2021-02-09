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
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-hotel"></i>
                <span>Promo/Add</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-images"></i>
                <span>Tour Travel</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.html">
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
    <h2 style="margin-top: 12px;" class="text-center">Add Content</a></h2>
    <br>
    <form action="{{ route('promo.store') }}" method="POST" name="add_content" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
    <div class="col-md-12">
    <div class="form-group">
    <strong>Title</strong>
    <input type="text" name="title" class="form-control" placeholder="Enter Title">
    <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>
    </div>
    <div class="col-md-12">
    <div class="form-group">
    <strong>Content Code</strong>
    <input type="text" name="promo_code" class="form-control" placeholder="Enter Content Code">
    <span class="text-danger">{{ $errors->first('promo_code') }}</span>
    </div>
    </div>
    <div class="col-md-12">
    <div class="form-group">
    <strong>Description</strong>
    <textarea class="form-control" col="4" name="description" placeholder="Enter Description"></textarea>
    <span class="text-danger">{{ $errors->first('description') }}</span>
    </div>
    </div>
    <div class="col-md-12">
    <div class="form-group">
    <strong>Expired</strong>
    <input type="date" name="expired" class="form-control">
    <span class="text-danger">{{ $errors->first('expired') }}</span>
    </div>
    </div>
    <div class="col-md-12">
    <div class="form-group">
    <strong>Content Image</strong>
    <input type="file" name="image" class="form-control" placeholder="">
    <span class="text-danger">{{ $errors->first('image') }}</span>
    </div>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    </form>
</div>
@endsection
