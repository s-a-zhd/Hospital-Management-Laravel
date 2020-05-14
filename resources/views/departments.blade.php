@extends('Admin.sidebar')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Departments List</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="{{ url('department/create') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Course</a>
            </div>
        </div>
        <form action="" method="POST">
        <div class="row filter-row">
           
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label">Course Name / Id </label>
                    <input type="text" class="form-control floating" name="search">
                </div>
            </div>
           
            <div class="col-sm-6 col-md-3">
               <button formaction="/employee/search" class="btn btn-success btn-block">Search</button>
            </div>
        </div>
        </form>
    
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th style="min-width:100px;">Department  Code</th>
                                
                                <th>Department Name</th>
                                <th>Department Description</th>
                               
                               
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach($list  as $department) 
                                
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->department_name }}</td>
                                <td>{{ $department->department_desc }}</td>
                               
                               
                               
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('department.edit',$department->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                           <form action="{{url('department/'.$department->id) }}" method="POST" id="del">
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


    
@endsection

