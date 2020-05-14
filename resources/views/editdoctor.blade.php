@extends('Admin.sidebar')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Salary</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{ route('doctor.update',$list->id)}} " enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="f_name" value="{{ $list->first_name }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="l_name" value="{{ $list->last_name }}">
                            </div>
                        </div>


                       
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" value="{{ $list->email }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name="dob" value="{{ $list->dob }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <label class="gen-label">Gender:</label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input" value="male" >Male
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input" value="female">Female
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address <span class="text-danger">*</span></label>
                                <input class="form-control"  name="address"value="{{ $list->address }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input class="form-control" name="phone" value="{{ $list->phone }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="profile-upload">
                                    <div class="upload-img">
                                        <img alt="" src="/assets/img/user.jpg">
                                    </div>
                                    <div class="upload-input">
                                        <input type="file" class="form-control" name="image"value="{{ $list->image }}">
                                    </div>
                                </div>
                            </div>
                        </div>


                       
                        
                       
                       
                       
                       
                        

                     

                        <div class="col-sm-12 m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Update Doctor</button>
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