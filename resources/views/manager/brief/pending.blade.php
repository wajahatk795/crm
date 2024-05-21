@extends('layouts.app-manager')
@push('style')
@endpush
@section('content')
<div class="breadcrumb">
    <h1 class="mr-2">Brief Pending</h1>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Clients with briefs pending</h4>

                <div class="table-responsive">
                    <table class="display table table-striped table-bordered datatable-init" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Brand</th>
                            <th>Status</th>
                            <th>Briefs pending</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($client_users_with_brief_pendings as $user)
                            @if($user->client)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}} {{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <span class="btn btn-info btn-sm">{{$user->client->brand->name}}</span>
                                    </td>
                                    <td>
                                        @if($user->status == 1)
                                            <span class="btn btn-success btn-sm">Active</span><br>
                                        @else
                                            <span class="btn btn-danger btn-sm">Deactive</span><br>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach(get_briefs_pending($user->id) as $brief_pending)
                                            <span class="btn btn-info btn-sm">{{$brief_pending}}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Brand</th>
                            <th>Status</th>
                            <th>Briefs pending</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="row mb-4">--}}
{{--    <div class="col-md-12 mb-4">--}}
{{--        <div class="card text-left">--}}
{{--            <div class="card-body">--}}
{{--                <h4 class="card-title mb-3">Brief Pending Info</h4>--}}
{{--                <ul class="nav nav-tabs" id="myTab" role="tablist">--}}
{{--                    <li class="nav-item"><a class="nav-link active" id="logo-brief-tab" data-toggle="tab" href="#logo-brief" role="tab" aria-controls="logo-brief" aria-selected="true">Logo Brief</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" id="website-brief-tab" data-toggle="tab" href="#website-brief" role="tab" aria-controls="website-brief" aria-selected="false">Website Brief</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" id="smm-brief-tab" data-toggle="tab" href="#smm-brief" role="tab" aria-controls="smm-brief" aria-selected="false">SMM Brief</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" id="content-brief-tab" data-toggle="tab" href="#content-brief" role="tab" aria-controls="content-brief" aria-selected="false">Content Writing Brief</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" id="seo-brief-tab" data-toggle="tab" href="#seo-brief" role="tab" aria-controls="seo-brief" aria-selected="false">SEO Brief</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" id="book-formatting-brief-tab" data-toggle="tab" href="#book-formatting-brief" role="tab" aria-controls="book-formatting-brief" aria-selected="false">Book Formatting & Publishing Brief</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" id="book-writing-brief-tab" data-toggle="tab" href="#book-writing-brief" role="tab" aria-controls="book-writing-brief" aria-selected="false">Book Writing</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" id="author_website-brief-tab" data-toggle="tab" href="#author_website-brief" role="tab" aria-controls="author_website-brief" aria-selected="false">Author Website</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" id="editing-proofreading-brief-tab" data-toggle="tab" href="#editing-proofreading-brief" role="tab" aria-controls="editing-proofreading-brief" aria-selected="false">Editing & Proofreading</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" id="cover-design-brief-tab" data-toggle="tab" href="#cover-design-brief" role="tab" aria-controls="cover-design-brief" aria-selected="false">Cover Design</a></li>--}}

{{--                    <li class="nav-item"><a class="nav-link" id="isbn-form-brief-tab" data-toggle="tab" href="#isbn-form-brief" role="tab" aria-controls="isbn-form-brief" aria-selected="false">ISBN Form</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" id="book-printing-brief-tab" data-toggle="tab" href="#book-printing-brief" role="tab" aria-controls="book-printing-brief" aria-selected="false">Book Printing</a></li>--}}


{{--                    <li class="nav-item"><a class="nav-link" id="no-brief-tab" data-toggle="tab" href="#no-brief" role="tab" aria-controls="seo-brief" aria-selected="false">No Brief</a></li>--}}
{{--                </ul>--}}

{{--                <div class="tab-content pr-0 pl-0" id="myTabContent">--}}
{{--                    <div class="tab-pane fade show active" id="logo-brief" role="tabpanel" aria-labelledby="logo-brief-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice Number</th>--}}
{{--                                        <th>Logo Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($logo_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>#{{ $datas->invoice->invoice_number }}</td>--}}
{{--                                        <td>{{ ( $datas->logo_name == null ? 'Not Given' : $datas->logo_name ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>{{ $datas->invoice->brands->name }}</td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}
{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice Number</th>--}}
{{--                                        <th>Logo Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="website-brief" role="tabpanel" aria-labelledby="website-brief-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice Number</th>--}}
{{--                                        <th>Business Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($web_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>#{{ $datas->invoice->invoice_number }}</td>--}}
{{--                                        <td>{{ ( $datas->business_name == null ? 'Not Given' : $datas->business_name ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>{{ $datas->invoice->brands->name }}</td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice Number</th>--}}
{{--                                        <th>Logo Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="smm-brief" role="tabpanel" aria-labelledby="smm-brief-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Business Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($smm_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-dark">#{{ $datas->invoice->invoice_number }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ ( $datas->business_name == null ? 'Not Given' : $datas->business_name ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-primary">{{ $datas->invoice->brands->name }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Logo Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="content-brief" role="tabpanel" aria-labelledby="content-brief-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Business Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($content_writing_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-dark">#{{ $datas->invoice->invoice_number }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ ( $datas->business_name == null ? 'Not Given' : $datas->business_name ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-primary">{{ $datas->invoice->brands->name }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Logo Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="seo-brief" role="tabpanel" aria-labelledby="seo-brief-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Business Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($seo_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-dark">#{{ $datas->invoice->invoice_number }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ ( $datas->business_name == null ? 'Not Given' : $datas->business_name ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-primary">{{ $datas->invoice->brands->name }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Logo Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="book-formatting-brief" role="tabpanel" aria-labelledby="book-formatting-brief-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Book Title</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($book_formatting_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-dark">#{{ $datas->invoice->invoice_number }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ ( $datas->book_title == null ? 'Not Given' : $datas->book_title ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-primary">{{ $datas->invoice->brands->name }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Logo Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="book-writing-brief" role="tabpanel" aria-labelledby="book-writing-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Book Title</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($book_writing_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-dark">#{{ $datas->invoice->invoice_number }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ ( $datas->book_title == null ? 'Not Given' : $datas->book_title ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-primary">{{ $datas->invoice->brands->name }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Logo Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="editing-proofreading-brief" role="tabpanel" aria-labelledby="editing-proofreading-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Description</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($proofreading_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-dark">#{{ $datas->invoice->invoice_number }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ ( $datas->description == null ? 'Not Given' : $datas->description ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-primary">{{ $datas->invoice->brands->name }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Description</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="author_website-brief" role="tabpanel" aria-labelledby="author_website-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Author Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($author_website_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-dark">#{{ $datas->invoice->invoice_number }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ ( $datas->author_name == null ? 'Not Given' : $datas->book_title ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-primary">{{ $datas->invoice->brands->name }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Author Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="tab-pane fade" id="cover-design-brief" role="tabpanel" aria-labelledby="cover-design-brief-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Author Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($bookcover_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-dark">#{{ $datas->invoice->invoice_number }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ ( $datas->title == null ? 'Not Given' : $datas->title ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-primary">{{ $datas->invoice->brands->name }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Author Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="tab-pane fade" id="isbn-form-brief" role="tabpanel" aria-labelledby="isbn-form-brief-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Author Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($isbn_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-dark">#{{ $datas->invoice->invoice_number }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ ( $datas->title == null ? 'Not Given' : $datas->title ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-primary">{{ $datas->invoice->brands->name }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Author Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="tab-pane fade" id="book-printing-brief" role="tabpanel" aria-labelledby="book-printing-brief-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Author Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($bookprinting_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-dark">#{{ $datas->invoice->invoice_number }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ ( $datas->title == null ? 'Not Given' : $datas->title ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-sm btn-primary">{{ $datas->invoice->brands->name }}</button>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice#</th>--}}
{{--                                        <th>Author Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}



{{--                    <div class="tab-pane fade" id="no-brief" role="tabpanel" aria-labelledby="no-brief-tab">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="display table table-striped table-bordered datatable-init" style="width:100%">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice Number</th>--}}
{{--                                        <th>Logo Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @foreach($no_form as $datas)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $datas->id }}</td>--}}
{{--                                        <td>#{{ $datas->invoice->invoice_number }}</td>--}}
{{--                                        <td>{{ ( $datas->name == null ? 'Not Given' : $datas->name ) }}</td>--}}
{{--                                        @if($datas->user != null)--}}
{{--                                        <td>{{ $datas->user->name }} {{ $datas->user->last_name }} <br>{{ $datas->user->email }} </td>--}}
{{--                                        @else--}}
{{--                                        <td>{{ $datas->client->name }} {{ $datas->client->last_name }} <br>{{ $datas->client->email }} </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{ $datas->invoice->sale->name }} {{ $datas->invoice->sale->last_name }}<br>{{ $datas->invoice->sale->email }}</td>--}}
{{--                                        <td>{{ $datas->invoice->brands->name }}</td>--}}
{{--                                        <td>{{ $datas->invoice->currency_show->sign }} {{ $datas->invoice->amount }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}
{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>ID</th>--}}
{{--                                        <th>Invoice Number</th>--}}
{{--                                        <th>Logo Name</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Agent Name</th>--}}
{{--                                        <th>Brand</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        if($('.datatable-init').length != 0){
            $('.datatable-init').DataTable({
                order: [[0, "desc"]],
                responsive: true,
            });
        }
    });
</script>
@endpush