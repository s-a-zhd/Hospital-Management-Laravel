@extends('Admin.sidebar')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Edit User</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{ URL::to('edit/user/'.$user->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                           
                        </div>

                       
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" value="{{ $user->email }}">
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
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control " name="address" value="{{ $user->address }}">
                                    </div>
                                </div>
                                
                                
                                
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone </label>
                                <input class="form-control" type="text" name="phone" value="{{ $user->phone }}">
                            </div>
                        </div>
                        

                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label>Role</label>
                                
                                <select class="form-control" name="role">
                                  
                                    <option value="Teacher">Teacher</option>
                                    <option value="Student">Student</option>
                                   
                                </select>
                                
                               
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Edit User</button>
                        </div>
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
                   
           
                    
                </form>

             
            </div>
        </div>
    </div>
   
</div>
    
@endsection