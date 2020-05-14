
 @extends('Admin.sidebar')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Doctor List</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="{{ url('doctor/create') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Doctor</a>
            </div>
        </div>
        <form action="" method="">
        <div class="row filter-row">
           
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label">User Name / Id </label>
                    <input type="text" class="form-control floating" name="search" id="search">
                </div>
            </div>
           
            <div class="col-sm-6 col-md-3">
               <button formaction="" class="btn btn-success btn-block">Search</button>
            </div>
        </div>
        </form>
    
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th style="min-width:100px;">Image</th>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>

                                <th>Email</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Phone</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach($list  as $user) 
                                
                            <tr>
                                <td><img width="50" height="50" src={{asset('assets/images/upload_images/' . $user->image)}} class="rounded-circle" alt=""></td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->dob }} </td>
                                <td>{{ $user->gender }}</td>
                               
                                <td> {{ $user->address }}</td>
                                <td> {{ $user->phone }}</td>
                               
                                  
                               
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('doctor.edit',$user->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                           <form action="{{url('doctor/'.$user->id) }}" method="POST" id="del">
                                           @csrf
                                           @method('DELETE')
                                        <!--   <a class="dropdown-item" id=""><i class="fa fa-trash-o m-r-5"></i> Delete</a> !--> 
                                        <button type="submit" class="dropdown-item" id=""><i class="fa fa-trash m-r-5"></i>Delete</button>
                                        
                                       
                                        </form>
                                        </div>
                                    </div>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
    $('#search').on('keyup',function(){
    $value=$(this).val();
    console.log($value);
    $.ajax({
    type : 'get',
    url : '{{route('search')}}',
    data:{'search':$value},
    success:function(data){
      console.log(data);
    $('tbody').html(data);
    }
    });
    })
    </script>
    <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
    
    
@endsection
                          