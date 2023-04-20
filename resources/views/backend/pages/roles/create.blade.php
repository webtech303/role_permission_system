@extends('backend.layouts.master')

@section('title')
    Role Create - Admin Panel
@endsection

@section('styles')

@endsection

@section('admin-content')
<div>
        <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Role Create</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                    <li><span>All Roles</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix">
                            @include('backend.layouts.partials.logout')
                        </div>
                </div>
            </div>
            <!-- page title area end -->

            <div class="main-content-inner">

            <div class="row">
                    <!-- data table start -->
                    <div class="col-md-12 mt-5">
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                        <h3>Create New Roles</h3>
                        <form action="{{ route('admin.roles.store') }}" method="POST">
                            @csrf
                        <div class="form-group mt-4">
                            <label for="exampleInputEmail1">Role Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter a role name">
                        </div>
                    
                        <div class="form-group mt-2">
                            <label for="name">Permissions</label>
                            @foreach($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->name }}">
                                <label class="form-check-label" for="{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Save Role</button>
                        </form>
                    
                    </div>
                    <!-- data table end -->
                </div>
            </div>
</div>
@endsection


@section('scripts')
   
@endsection