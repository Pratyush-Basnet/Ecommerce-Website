@extends('layouts.dashboard')
@section('page_title','Category')
@section('category_select','active')
@section('container')
    @if(session()->has('message'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <h1 class="mb10">Review</h1>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Review</th>
                        <th>ProductId</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->name}}</td>
                                <td>{{$list->email}}</td>
                                <td>{{$list->review}}</td>
                                <td>{{$list->product_id}}</td>
                                <td>
                                    <a href="{{url('admin/review/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>

@endsection
