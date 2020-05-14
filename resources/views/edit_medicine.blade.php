@extends('Admin.sidebar')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Update Medicine</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{ route('store.update',$list->id)}}" enctype="multipart/form-data">
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
                                <label>Purchase date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name="p_date" value="{{ $list->p_date }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Expire date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name="e_date" value="{{ $list->expire_end }}">
                                </div>
                            </div>
                        </div>


                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Price <span class="text-danger">*</span></label>
                                <input class="form-control" name="price" value="{{ $list->price }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Quantity <span class="text-danger">*</span></label>
                                <input class="form-control"  name="quantity" value="{{ $list->quantity }}">
                            </div>
                        </div>

                        


                       
                        
                      

                      

                        


                        

                        
                      


                       
                        
                       
                       
                       
                       
                        

                     

                        <div class="col-sm-12 m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Update Medicine</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
   
</div>
    
@endsection