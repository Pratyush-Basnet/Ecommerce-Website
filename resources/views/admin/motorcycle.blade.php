@extends('layouts.dashboard')
@section('page_title','Motorcycle')
@section('Motorcycle_select','active')
@section('container')
    @if(session()->has('message'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <h1 class="mb10">Motorcycle</h1>
    <a href="{{url('admin/motorcycle/manage_motorcycle')}}">
        <button type="button" class="btn btn-success">
            Add Motorcycle
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->name}}</td>
                            <td>
                                @if($list->image!='')
                                    <img width="100px" src="{{asset('storage/media/'.$list->image)}}"/>
                                @endif
                            </td>
                            <td>{{$list->motorcycle_slug}}</td>



                            <td>
                                <a href="{{url('admin/motorcycle/manage_motorcycle/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>

                                @if($list->status==1)
                                    <a href="{{url('admin/motorcycle/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>
                                @elseif($list->status==0)
                                    <a href="{{url('admin/motorcycle/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
                                @endif

                                <a href="{{url('admin/motorcycle/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
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
