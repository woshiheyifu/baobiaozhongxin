@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">报表中心</h1>
    <ul class="nav nav-tabs">
        <li role="presentation" class=""><a href="#">Home</a></li>
        <li role="presentation" class="active"><a href="#">Profile</a></li>
        <li role="presentation"><a href="#">Messages</a></li>
        <form class="navbar-form navbar-right" style="margin-bottom: 0px">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="搜索">
            </div>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </form>
    </ul>

    <div class="row">
        @foreach($reports as $report)
        <div class="col-sm-6 col-md-4" style="width: 25%;">
            <div class="thumbnail">
                <img src="{{ 'upload/'.$report->img_url[0] }}" style="height: 260px;">
                <div class="caption">
                    <h3>{{$report->title}}</h3>
                    <p style="font-size: 12px;color: grey;">点击量:{{$report->reportStatistics->views}}&nbsp&nbsp&nbsp&nbsp下载量:{{$report->reportStatistics->download}}</p>
                    <p><a href="/downloadReport?id={{$report->id}}" class="btn btn-primary" role="button">下载</a> <a href="/detail?id={{$report->id}}" class="btn btn-default" role="button">详情</a></p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection