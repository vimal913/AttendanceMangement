@extends('layouts.main')

@section('content')
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Student List</h4>
                    <table id="table_id">
                        <tr>
                            <th>Profile-Pic</th>
                            <th>Student Name</th> 
                            <th>Class</th> 
                            <th>Attendance</th>
                            <th>Teacher Name</th>
                            <th>Date</th>
                        </tr>
                        @foreach($attendancelist as $a)
                        <tr>
                            <td><img src="{{ asset('file/'.$a->AstudentInfo->image)}}" alt="" /></td>
                            @php
                                $teacher = DB::table('users')->where('id',$a->AteacherInfo->id)->first();
                                $student = DB::table('users')->where('id',$a->AstudentInfo->student_id)->first();
                          @endphp 
                            <td>{{$student->name}}</td>
                            <td>{{ $a->AwhichClass->class_name}}</td>
                            @if ( $a->session_id == 1)
                                <td><span class="badge" style="background-color:rgb(5, 187, 5);color:white">Present</span></td>
                                @else
                                <td><span class="badge" style="background-color:rgb(187, 5, 5);color:white">Abscent</span></td>
                            @endif
                            {{-- <td>{{ $a->session_id == 1 ? <span class="badge badge-success">Present</span> : <span class="badge badge-danger">Abscent</span>}}</td> --}}
                            <td>{{ $teacher->name}}</td>
                            <td>{{ $a->att_date}}</td>
                        </tr>
                        @endforeach   
                    </table>
                    {{-- <div class="custom-pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endsection