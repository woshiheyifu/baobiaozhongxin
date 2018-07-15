@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{{ URL::asset('js/index/detail.js') }}"></script>
<div class="container">
    <div class="row">
        <h1 class="text-center">{{$report->title}}</h1>
    </div>

    <div class="row">

        <div class="col-md-12">
            <a class="thumbnail big">
                <img src="{{ 'upload/'.$report['img_url'][0] }}" style="height: 650px">
            </a>
        </div>

    </div>
    <div class="row">
        @foreach($report['img_url'] as $img_url)
        <div class="col-xs-4 col-md-1">
            <a class="thumbnail small">
                <img src="{{ 'upload/'.$img_url }}" style="height: 60px">
            </a>
        </div>
        @endforeach

    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">描述</h2>
            </div>
            <div class="panel-body" style="font-size: 22px">
                <p>
                    {{$report->description}}
                </p>
                <p>
                    <a href="/downloadReport?id={{$report->id}}" class="btn btn-primary" style="float: right">下载</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection