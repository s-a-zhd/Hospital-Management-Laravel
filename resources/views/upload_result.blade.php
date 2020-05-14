@extends('Admin.sidebar')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Notice </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{URL::to('/result/upload/student/'.$user->id) }}">
                    @csrf
                  
                    <div class="row">
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Student Id  <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="id" readonly value="{{ $user->id }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                           
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Student Score  <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="score" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                           
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Grade</label>
                                <input class="form-control" id="" name="grade"></textarea>
                              </div>
                        </div>

                        <div class="col-sm-6">
                           
                        </div>


                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" id="update">Upload Result</button>
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