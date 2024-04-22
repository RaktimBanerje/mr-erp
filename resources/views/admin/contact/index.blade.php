@extends('layouts.crm')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  pt-6 pb-2 ">

            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container"
                class="app-container  container-fluid d-flex align-items-stretch ">
                <!--begin::Toolbar wrapper-->
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <!--begin::Title-->
                        <h1
                            class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                            Contacts
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">

            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-fluid ">
                
                <!--begin::Row-->
                <div class="row gy-5 gx-xl-10 my-5">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills" style="padding-left: 25px; padding-right: 25px;">
                        @foreach($records as $record)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if($loop->iteration == 1) { echo 'active'; } ?>" data-bs-toggle="tab" href="#source{{$loop->iteration}}">{{$record->source->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        @foreach($records as $record) 
                        @php
                            $fields = json_decode($record->source->fields);

                            $keys = [];

                            foreach($fields as $field) {
                                $keys[] = $field->key;
                            }
                        @endphp
                            <div class="tab-pane container <?php if($loop->iteration == 1) { echo 'active'; } ?>" id="source{{$loop->iteration }}">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered border-1 border-black" style="border-right: 1px solid black;">
                                        <thead>
                                            <tr>
                                                @foreach($fields as $field)
                                                    <th>{{$field->label}}</th>
                                                @endforeach
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($record->contacts as $contact) @php $data = json_decode($contact->data); @endphp
                                                <tr>
                                                    @foreach($keys as $key)
                                                        <td>{{$data->$key}}</td>
                                                    @endforeach
                                                    <td>
                                                        <select class="form-select form-sm">
                                                        @foreach($statuses as $status)
                                                            <option value={{$status->id}} style="background-color: {{$status->color}}; padding: 5px 10px;  font-size: 20px; color: white;">{{$status->title}}</option>
                                                        @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!--end::Row-->
                
            </div>
            <!--end::Content container-->

        </div>
        <!--end::Content-->

    </div>
@stop