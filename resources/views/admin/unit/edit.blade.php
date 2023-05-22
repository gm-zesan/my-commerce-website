@extends('admin.master')

@section('body')
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Unit Form</h4>
                    <hr>
                    <h5 class="text-center text-success">{{ session('message') }}</h5>
                    <form class="form-horizontal p-t-20" action="{{ route('unit.update', ['id' => $unit->id]) }}"
                        method="Post">
                        @csrf

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Unit Name <span class="text-danger">
                                    *</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" name="name"
                                    value="{{ $unit->name }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Unit Code <span class="text-danger">
                                    *</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" name="code"
                                    value="{{ $unit->code }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Brand Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="" name="description" rows="5">{{ $unit->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3">
                                    <input type="radio" name="status" {{ $unit->status == 1 ? 'checked' : '' }}
                                        value="1"> Published
                                </label>
                                <label>
                                    <input type="radio" name="status" value="2"
                                        {{ $unit->status == 2 ? 'checked' : '' }}> Unpublished
                                </label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update
                                    Unit Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
