@extends('layouts.main')

@section('content')
<div class="section-admin container-fluid">
    <div class="row admin text-center">
        <div class="col-md-12">
            <div class="row">
                @foreach($class as $c)
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:10px" id="classdiv">
                    <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                        <h4 class="text-left text-uppercase"><b>{{$c->class_name}}</b></h4>
                        <div class="row vertical-center-box vertical-center-box-tablet">
                            <div class="col-xs-6 mar-bot-15 text-left">
                                <p style="color:aqua"><strong>Total Students</strong></p>
                            </div>
                            <div class="col-xs-6 cus-gh-hd-pro">
                                <h2 class="text-right no-margin">{{count(DB::table('students')->where('class_id',$c->id)->get())}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>  
</div>
@endsection