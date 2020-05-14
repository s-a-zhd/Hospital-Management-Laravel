@extends('Admin.sidebar')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Update Patient</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{ route('patient.update',$list->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{ $list->name }}" >
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Age <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="age" value="{{ $list->age }}" >
                            </div>
                        </div>


                       
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" value="{{ $list->email }}" >
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Admission date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name="date" value="{{ $list->date }}" >
                                </div>
                            </div>
                        </div>

                        


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address <span class="text-danger">*</span></label>
                                <input class="form-control"  name="address" value="{{ $list->address }}" >
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input class="form-control" name="phone" value="{{ $list->phone }}" >
                            </div>
                        </div>

                      


                       
                        
                       
                       
                       
                       
                        

                     

                        <div class="col-sm-12 m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Update Patient</button>
                        </div>
                    </div>
                   
           
                    
                </form>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif
            </div>
        </div>
    </div>
   
</div>
    
@endsection