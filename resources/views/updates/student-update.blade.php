@extends('layouts.main')

@section('content')
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Student Update</h4>
                    <div class="add-product">
                        <a href="{{ route('student.index') }}">Back</a>
                    </div>
                    <form action="{{ route('student.update',$updatestudent->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @foreach ($studentlist as $t)
                        <input type="hidden" name="userid" value="{{$t->studentInfo->id}}">
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$t->studentInfo->name}}"/>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{$t->studentInfo->email}}"/>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email')}}</span>
                            @endif
                        </div>
                        @endforeach
                        <div class="form-group mb-3">
                            <input type="text" name="contact" class="form-control" placeholder="contact" value="{{$updatestudent->contact_no}}"/>
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
                            <textarea class="form-control" id="address" rows="3" name="address" placeholder="Address" style="color:white">{{ $updatestudent->address }}</textarea>
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
                            <img src="{{ asset('file/'.$updatestudent->image)}}" alt="">
                          </div>
                          <button type="submit" class="btn btn-primary btn-block">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  
@endsection