@extends('Admin.sidebar')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Department</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{ url('department') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Department Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                           
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Department Description <span class="text-danger">*</span></label>
                                <textarea rows="5" cols="50" class="form-control" type="text" name="desc"> </textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                           
                        </div>
                       
                     
                       
                        
                        
                        

                        
                        
                        <div class="col-sm-6 m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Create Department</button>
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