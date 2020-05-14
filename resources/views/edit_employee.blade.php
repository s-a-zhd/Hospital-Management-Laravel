@extends('Admin.sidebar')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Update Employee</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{ route('employee.update',$list->id)}} " enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{ $list->name }}">
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
                                <label>Phone <span class="text-danger">*</span></label>
                                <input class="form-control" name="phone" value="{{ $list->contact }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Admission date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name="date" value="{{ $list->join_date }}">
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control select" name="role">
                                    <option value="Nurse">Nurse</option>
                                    <option value="Pharmacist">Pharmacist</option>
                                    <option value="Receptionist">Receptionist</option>
                                </select>
                            </div>
                        </div>


                       
                        
                      

                      

                        


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Salary <span class="text-danger">*</span></label>
                                <input class="form-control"  name="salary" value="{{ $list->salary }}">
                            </div>
                        </div>

                        
                      


                       
                        
                       
                       
                       
                       
                        

                     

                        <div class="col-sm-12 m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Update Employee</button>
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