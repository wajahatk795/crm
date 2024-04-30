
@extends('layouts.app-support')
@section('content')
<div class="breadcrumb">
    <h1 class="mr-2">Projects</h1>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="row mb-4">
    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-body">
                <form action="{{ route('support.project') }}" method="GET" id="search-form">
                    <div class="row">
                        <div class="col-md-3 form-group mb-3">
                            <label for="package">Search Project</label>
                            <input type="text" class="form-control" id="project" name="project" value="{{ Request::get('project') }}">
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="invoice">Search Project#</label>
                            <input type="text" class="form-control" id="project_id" name="project_id" value="{{ Request::get('project_id') }}">
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="user">Search Name or Email</label>
                            <input type="text" class="form-control" id="user" name="user" value="{{ Request::get('user') }}">
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <button class="btn btn-primary">Search Result</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Project Details</h4>
                <div class="table-responsive">
                    <table class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Client</th>
                                <th>Brand</th>
                                <th>Status</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $datas)
                            <tr>
                                <td>{{$datas->id}}</td>
                                <td>
                                    @if(count($datas->tasks) == 0)
                                    {{$datas->name}}
                                    @else
                                    <a href="#">{{$datas->name}}</a>
                                    @endif
                                </td>
                                <td>
                                    {{$datas->client->name}} {{$datas->client->last_name}}<br>
                                    {{$datas->client->email}}  <br>
                                    {{$datas->client->contact}}
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm">{{$datas->brand->name}}</button>
                                </td>
                                <td>
                                    @if($datas->status == 1)
                                        <button class="btn btn-success btn-sm">Active</button>
                                    @else
                                        <button class="btn btn-danger btn-sm">Deactive</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('support.message.show.id', ['id' => $datas->client->id ,'name' => $datas->client->name]) }}" class="btn btn-secondary btn-sm">
                                        Message
                                    </a>
                                    @if($datas->form_checker != 0)
                                    <a href="{{ route('support.form', [ 'form_id' => $datas->form_id , 'check' => $datas->form_checker, 'id' => $datas->id]) }}" class="btn btn-primary btn-icon btn-sm">
                                        View Form
                                    </a>
                                    @endif
                                    <a href="{{ route('create.task.by.project.id', ['id' => $datas->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $datas->name))) ]) }}" class="btn btn-dark btn-icon btn-sm">
                                        Create Task
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Client</th>
                                <th>Brand</th>
                                <th>Status</th>
                                <th>Active</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $data->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    
@endpush