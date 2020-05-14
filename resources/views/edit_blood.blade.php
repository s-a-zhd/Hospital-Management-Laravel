@extends('Admin.sidebar')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Update blood</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{ route('blood.update',$list->id)}} " enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Id <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="id" value="{{ $list->id }}" readonly>
                            </div>
                        </div>

                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Group <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="group" value="{{ $list->group }}" readonly>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Quantity <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="quantity" value="{{ $list->quantity }}">
                            </div>
                        </div>

                        

                        


                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select" name="status">
                                    <option value="Available">Available</option>
                                    <option value="Not Available">Not Available</option>
                                
                                </select>
                            </div>
                        </div>


                       
                        
                      

                      

                        



                        
                      


                       
                        
                       
                       
                       
                       
                        

                     

                        <div class="col-sm-12 m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Update Blood Bank</button>
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