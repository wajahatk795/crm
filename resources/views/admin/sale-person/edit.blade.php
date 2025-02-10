@extends('layouts.app-admin')

@section('content')
<div class="breadcrumb">
    <h1>Edit Sale Agent (ID: {{$data->id}})</h1>
    <ul>
        <li><a href="#">Sale Agent</a></li>
        <li>Edit Sale Agent</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Sales / Support Agent Form</div>

                <form class="form" action="{{route('admin.user.sales.update', $data->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="name">First Name <span>*</span></label>
                            <input type="text" id="name" class="form-control" value="{{old('name', $data->name)}}" placeholder="First Name" name="name" required="required">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="last_name">Last Name <span>*</span></label>
                            <input type="text" id="last_name" class="form-control" value="{{old('last_name', $data->last_name)}}" placeholder="Last Name" name="last_name" required="required">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="email">Email Address <span>*</span></label>
                            <input type="email" id="email" class="form-control" value="{{old('email', $data->email)}}" placeholder="Email Address" name="email" required="required">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="brand">Brand Name <span>*</span></label>
                            <select name="brand[]" id="brand" class="form-control select2" required multiple="multiple">
                                @foreach ($brand as $brands)
                                <option value="{{ $brands->id }}" {{ isset($data) && in_array($brands->id, $data->brands()->pluck('id')->toArray()) ? 'selected' : '' }}> {{ $brands->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="contact">Contact Number</label>
                            <input type="text" id="contact" class="form-control" value="{{old('contact', $data->contact)}}" placeholder="Contact Number" name="contact">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="status">Select Status <span>*</span></label>
                            <select name="status" id="status" class="form-control" >
                                <option value="1" {{$data->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$data->status == 0 ? 'selected' : ''}}>Deactive</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="role">Role <span>*</span></label>
                            <select name="is_employee" id="role" class="form-control">
                                <option value="4" {{ ($data->is_employee == 4 && $data->is_support_head == false) ? 'selected' : '' }}>Customer Support (PROJECT MANAGER)</option>
                                <option value="0" {{ $data->is_employee == 0 ? 'selected' : '' }}>Sale Agent (FRONT SALES)</option>
                                <option value="6" {{ $data->is_employee == 6 ? 'selected' : '' }}>Sales Manager (BUH)</option>
                                <option value="8" {{ ($data->is_employee == 4 && $data->is_support_head == true) ? 'selected' : '' }}>Support Head (PM HEAD)</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="daily_target">Target</label>
                            <input class="form-control" type="number" name="daily_target" id="" min="0" value="{{$data->finances->daily_target ?? 1000.00}}">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="daily_printing_costs">Printing costs</label>
                            <input class="form-control" type="number" name="daily_printing_costs" id="" min="0" value="{{$data->finances->daily_printing_costs ?? 0.00}}">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="pseudo_name">Alternative name</label>
                            <input type="text" id="pseudo_name" class="form-control" value="{{old('pseudo_name', $data->pseudo_name)}}" placeholder="Pseudo name" name="pseudo_name">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="is_upsell">Is upsell?</label>
                            <select name="is_upsell" id="role" class="form-control">
                                <option value="1" {{ ($data->is_upsell == 1) ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ ($data->is_upsell == 0) ? 'selected' : '' }}>No</option>
                            </select>
                        </div>


                        <!--<div class="col-md-6 form-group mb-3">-->
                        <!--    <label for="name"> Verification Code <span>*</span></label>-->
                        <!--    <input type="text" class="form-control" value="{{ $data->verfication_code}}" readonly>-->
                        <!--</div>-->


                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Update Sale Agent</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $('#contact').keypress(function(event){
            if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
                event.preventDefault(); //stop character from entering input
            }
        });
    </script>
@endpush
