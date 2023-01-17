@extends('layouts.main')

@section('content')
<div class="section-admin container-fluid">
    <div class="row admin text-center">
        <div class="col-md-12">
            <form action="{{ route('attendancestore') }}" method="post">
                @csrf
            <div class="row">
                {{-- {{ $studentlist = DB::table('students')->where('teacher_id',Auth::user()->id)->get()}} --}}
                @foreach($studentlist as $s)
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 admin-content analysis-attendance-ctn res-mg-t-15">
                        <h4 class="text-center">
                            <img src="{{ asset('file/'.$s->image)}}" alt="" width="74%">
                            <p class="name" style="color:white">{{$s->studentInfo->name}}</p>
                        </h4>
                        <div class="vertical-center-box vertical-center-box-tablet">
                            <div class="mar-bot-15 text-left" style="display:flex;justify-content: space-around;">
                                {{-- <p class="present">P</p>
                                <p class="abscent">A</p> --}}
                                <input type="hidden" name="student_id[]" value="{{$s->id}}">
                                <input type="hidden" name="teacher_id" value="{{$s->teacher_id}}">
                                <input type="hidden" name="class_id" value="{{$s->class_id}}">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios[{{$s->id}}]" id="exampleRadios1" value="1">
                                    <label class="form-check-label" for="exampleRadios1" style="color:white">
                                      P
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios[{{$s->id}}]" id="exampleRadios2" value="2">
                                    <label class="form-check-label" for="exampleRadios2" style="color:white">
                                      A
                                    </label>
                                  </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
                </form>
        </div>
    </div>  
</div>
@endsection