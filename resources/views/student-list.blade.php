@extends('layouts.main')

@section('content')
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Student List</h4>
                    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                    <div class="add-product">
                        <a data-toggle="modal" data-target="#addstudent">Add Student</a>
                    </div>
                    @endif
                    <table>
                        <tr>
                            <th>Image</th>
                            <th>Student Name</th> 
                            <th>Class</th> 
                            <th>Contact No</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($studentlist as $student)
                        <tr>
                            <td><img src="{{ asset('file/'.$student->image)}}" alt="" /></td>
                            <td>{{ $student->studentInfo->name}}</td>
                            <td>{{ $student->whichClass->class_name}}</td>
                            <td>{{ $student->contact_no}}</td>
                            <td>{{ $student->address}}</td>
                            <td style="display:flex">
                                <a href="{{ route('student.edit',$student->id ) }}" class="pd-setting-ed col-5 btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                <form action="{{ route('student.destroy',$student->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="col-5 btn btn-danger ml-2" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr> 
                        @endforeach   
                    </table>
                    <div class="custom-pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="addstudent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content sparkline9-list">
        <div class="modal-header">
          <h5 class="modal-title" id="addstudent" style="color:white">Student Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color:white;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}"/>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}"/>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="contact" class="form-control" placeholder="contact" value="{{old('contact')}}"/>
                    @if ($errors->has('contact'))
                        <span class="text-danger">{{ $errors->first('contact')}}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <select id="class" class="form-control @error('states') error  @enderror" name="class">
                        <option value="{{old('class')}}">Choose Classes...</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->class_name}}</option>
                        @endforeach
                      </select>
                    @if ($errors->has('class'))
                        <span class="text-danger">{{ $errors->first('class')}}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <select id="teacher" class="form-control @error('teacher') error  @enderror" name="teacher">
                        <option value="{{old('teacher')}}">Choose teachers...</option>
                        @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->id}}</option>
                        @endforeach
                      </select>
                      {{-- @foreach($teachers as $teacher)
                      <input type="text" name="teacher" class="form-control" value=""disabled/>
                      @endforeach --}}
                    @if ($errors->has('teacher'))
                        <span class="text-danger">{{ $errors->first('teacher')}}</span>
                    @endif
                </div>
                  <div class="form-group">
                    <textarea class="form-control" id="address" rows="3" name="address" placeholder="Address" style="color:white" value="{{old('address')}}" ></textarea>
                    @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address')}}</span>
                    @endif
                  </div>
                <div class="form-group mb-3">
                    <label for="profile" style="color:white">Profile Picture</label>
                    <input type="file" class="form-control-file" id="profile" name="file">
                    @if ($errors->has('file'))
                        <span class="text-danger">{{ $errors->first('file')}}</span>
                    @endif
                  </div>
            
        </div>
        <div class="modal-footer" style="border-top:none !important">
            <button type="submit" class="btn btn-primary btn-block">ADD</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  @if (count($errors) > 0)
    <script>
        $( document ).ready(function() {
            $('#addteacher').modal('show');
        });
    </script>
@endif
@endsection