@extends('layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection

@section('content')
    <div class="container">
            @extends('layout')

            @section('title','ward2')
            
            @section('css')
                <link rel="stylesheet" href="css/test.css">
            @endsection
            
            @section('content')
                <div class="container">
                    <a href="{{action('BedController@fetching')}}" class="btn btn-primary">Refresh</a>
                    <div class="row">
                    @foreach ($beds as $bed)
                        @if ($bed->status == "Available")
                            <div class="card" id="Available">
                                <div class="card-header">
                                    {{$bed->room_number}}
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{$bed->bed_number}}</p>
                                    <a href="{{ URL('/bed/'.$bed->bed_number.'/edit' )}}" class="btn btn-secondary">Detail</a>
                                </div>
                            </div>
                        @elseif($bed->status == "Prepare")
                            <div class="card" id="Prepare">
                                <div class="card-header">
                                    {{$bed->room_number}}
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{$bed->bed_number}}</p>
                                    <a href="{{ URL('/bed/'.$bed->bed_number.'/edit' )}}" class="btn btn-secondary">Detail</a>
                                </div>
                            </div>
                        @elseif($bed->status == "Maintenance")
                            <div class="card" id="Maintenance">
                                <div class="card-header">
                                    {{$bed->room_number}}
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{$bed->bed_number}}</p>
                                    <a href="{{ URL('/bed/'.$bed->bed_number.'/edit' )}}" class="btn btn-secondary">Detail</a>
                                </div>
                            </div>
                        @else
                            <div class="card" id="Notavailable">
                                <div class="card-header">
                                    {{$bed->room_number}}
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{$bed->bed_number}}</p>
                                    <a href="{{ URL('/bed/'.$bed->bed_number.'/edit' )}}" class="btn btn-secondary">Detail</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="available"></div> Available
                        </div>
                        <div class="col-lg-3">
                            <div class="prepare"></div> Prepare
                        </div>
                        <div class="col-lg-3">
                            <div class="maintenance"></div> Maintenance
                        </div>
                        <div class="col-lg-3">
                            <div class="notavailable"></div> Not available
                        </div>
                    </div>
            
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Room No.</th>
                            <th scope="col">Bed No.</th>
                            <th scope="col">Status</th>
                            <th scope="col">Move Date</th>
                            <th scope="col">Estimate discharge</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($beds as $bed)
                                @if ($bed->status == "Available")
                                    <tr id="Available">
                                @elseif($bed->status == "Prepare")
                                    <tr id="Prepare">
                                @elseif($bed->status == "Maintenance")
                                    <tr id="Maintenance">
                                @else
                                    <tr id="Notavailable">
                                @endif
                                    <th scope="row">{{$bed->room_number}}</th>
                                    <td>{{$bed->bed_number}}</td                                                                                                                     >
                                    <td>{{$bed->status}}</td>
                                    <td>{{$bed->move_date}}</td>
                                    <td>{{$bed->est_dischr_date}}</td>
                                    <td><a href="{{ URL('/bed/'.$bed->bed_number.'/edit' )}}" class="btn btn-secondary">Detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endsection
            
    </div>
@endsection