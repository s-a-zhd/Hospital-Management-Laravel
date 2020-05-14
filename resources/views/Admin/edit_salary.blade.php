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
                <form method="POST" action="{{ URL::to('edit_salary/'.$user->id) }}">
                    @csrf
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Id <span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="id" value="{{ $user->id }}" readonly>
                            </div>

                           
                        </div>

                        <div class="col-sm-6">
                           
                        </div>
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
                                <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                       
                        
                       
                       
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input type="text" class="form-control " name="salary" value="{{ $user->salary }}">
                                    </div>
                                </div>
                                
                                
                                
                                
                            </div>
                        </div>
                       
                        

                     

                        <div class="col-sm-6 m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Edit Salary</button>
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