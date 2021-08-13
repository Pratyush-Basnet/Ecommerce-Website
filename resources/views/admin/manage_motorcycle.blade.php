@extends('layouts.dashboard')
@section('page_title','Manage Motorcycle')
@section('product_select','active')
@section('container')

    @if($id>0)
        {{$image_required=""}}
    @else
        {{$image_required="required"}}
    @endif

    <h1 class="mb10">Manage Motorcycle</h1>
    <a href="{{url('admin/motorcycle')}}">
        <button type="button" class="btn btn-success">
            Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('motercylce.manage_motorcycle_process')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1"> Name</label>
                                    <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="motorcycle_slug" class="control-label mb-1"> Slug</label>
                                    <input id="motorcycle_slug" value="{{$motorcycle_slug}}" name="motorcycle_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('motorcycle_slug')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1"> Image</label>
                                    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{$image_required}}>
                                    @error('image')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="brand" class="control-label mb-1"> Brand</label>
                                    <input id="brand" value="{{$brand}}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label mb-1"> Description</label>
                                    <textarea id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$description}}</textarea>
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit
                                    </button>
                                </div>
                                <input type="hidden" name="id" value="{{$id}}"/>
                            </form>
                        </div>
                    </div>
                </div>






            </div>

        </div>
    </div>

@endsection
