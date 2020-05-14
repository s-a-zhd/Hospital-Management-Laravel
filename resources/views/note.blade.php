@extends('Admin.sidebar')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Note Upload</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{ route('note') }}" enctype="multipart/form-data">
                    @csrf
                  
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Note Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="name" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                           
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Note Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="title" value="">
                            </div>
                        </div>

                        <div class="col-sm-6">
                           
                        </div>
                       
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Details</label>
                                <div class="">
                                    <input type="text" class="form-control" name="details" value="">
                                </div>
                            </div>
                        </div>
                       
                        
                        <div class="col-sm-6">
                           
                        </div>
                        

                  
                        
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" id="update">Upload Note</button>
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
    
