@extends('layout')

@section('title','ward4')

@section('css')
    <link rel="stylesheet" href="css/test.css">
@endsection

@section('content')
    
    <div class="container">
            {{-- <div class="alert alert-success" role="alert" id="alert">
                <strong>Well done!</strong> You successfully read this important alert message.
            </div> --}}
        <a href="{{action('Ward4Controller@fetching')}}" class="btn btn-primary">Refresh</a>
        {{-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#ShowTable" aria-expanded="false" aria-controls="ShowTable">
            Table
        </button> --}}

        <div class="row">
        @foreach ($beds as $bed)
            @if ($bed->status == "Available")
                <div class="card" id="Available">
                    <div class="card-header">
                        {{$bed->room_number}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$bed->bed_number}}</p>
                        <a href="{{ URL('/w4/'.$bed->bed_number.'/edit' )}}" class="btn btn-secondary">Detail</a>
                    </div>
                </div>
            @elseif($bed->status == "Prepare")
                <div class="card" id="Prepare">
                    <div class="card-header">
                        {{$bed->room_number}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$bed->bed_number}}</p>
                        <a href="{{ URL('/w4/'.$bed->bed_number.'/edit' )}}" class="btn btn-secondary">Detail</a>
                    </div>
                </div>
            @elseif($bed->status == "Maintenance")
                <div class="card" id="Maintenance">
                    <div class="card-header">
                        {{$bed->room_number}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$bed->bed_number}}</p>
                        <a href="{{ URL('/w4/'.$bed->bed_number.'/edit' )}}" class="btn btn-secondary">Detail</a>
                    </div>
                </div>
            @else
                <div class="card" id="Notavailable">
                    <div class="card-header">
                        {{$bed->room_number}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$bed->bed_number}}</p>
                        <a href="{{ URL('/w4/'.$bed->bed_number.'/edit' )}}" class="btn btn-secondary">Detail</a>
                    </div>
                </div>
            @endif
        @endforeach
        </div>

        <br>
        <div class="row">
            <div class="col-lg-3" id="advisor">
                <div class="available"></div> Available
            </div>
            <div class="col-lg-3" id="advisor">
                <div class="prepare"></div> Prepare
            </div>
            <div class="col-lg-3" id="advisor">
                <div class="maintenance"></div> Maintenance
            </div>
            <div class="col-lg-3" id="advisor">
                <div class="notavailable"></div> Not available
            </div>
        </div>
    </div>
@endsection
