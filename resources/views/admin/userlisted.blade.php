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
    <h1 class="mb10">User listed products</h1>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>UserID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                        <tr>
                            <td>{{$list->user_id}}</td>
                            <td>{{$list->name}}</td>
                            <td>
                                @if($list->image!='')
                                    <img width="100px" src="{{asset('storage/media/'.$list->image)}}"/>
                                @endif
                            </td>
                            <td>{{$list->Price}}</td>
                            <td>{{$list->slug}}</td>
                            <td>
                                <a href="{{url('admin/listed/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
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
