
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Edit Bed</title>
</head>
<body>
    <div class="container">  
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card" style="margin-top:20px;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col text-left"><b>Room NO:</b> {{$beds->room_number}}</div>
                            <div class="col text-center"><b>Bed NO:</b> {{$beds->bed_number}}</div>
                            <div class="col text-right"><b>Type:</b> {{$beds->room_type}}</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/w3/{{ $beds->bed_number }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                
                            <div class="field">
                                <div class="from-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for=""><b>Move Date :</b> </label>
                                            <input type="text" value="{{$beds->move_date}}" disabled>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for=""><b>Move Time :</b> </label>
                                            <input type="text" value="{{$beds->move_time}}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="from-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for=""><b>Duration :</b> </label>
                                            @if ($beds->est_dischr_date == NULL)
                                            <input type="text" value="Unknown" disabled>
                                            @else
                                            <input type="text" value="{{ $start_date->diff($end_date)->format('%d Days') }}" disabled>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <label for=""><b>Employee Admit :</b> </label>
                                            <input type="text" value="{{$beds->employee_admit}}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="from-group">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label for=""><b>Update Time :</b> </label>
                                            <input type="text" value="{{$beds->updated_at}}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{--  Dropdown  --}}
                                    <label for="status"><b>Status</b></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="" disabled selected>Select status</option>
                                        <option>Available</option>
                                        <option>Prepare</option>
                                        <option>Maintenance</option>
                                    </select>
                                </div>
    
                                @if ($beds->status == 'Not Available')
                                <div class="form-group">
                                    <label class="label" for="est_dischr_date"><b>Estimate Discharge Date</b></label>
                                    <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="est_dischr_date" value="{{ $beds->est_dischr_date }}">
                                </div>
                                @else
                                <div class="form-group">
                                    <label class="label" for="est_dischr_date">Estimate Discharge Date</label>
                                    <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="est_dischr_date" value="{{ $beds->est_dischr_date }}" disabled>
                                </div>
                                @endif
                                
                
                                <div class="from-group">
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-danger" style="margin-right: 5px;">Update</button>
                                        <a href="{{ URL::previous() }}" class="btn btn-info">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <label style="margin-top: 3px;"><u>Price</u> : {{ $beds->price_th }} บาท </label><label style="font-size: 0.75em;color:red">(รวมค่าห้อง,ค่าอาหาร,ค่าการพยาบาล,ค่าบริการโรงพยาบาล)</label>
                {{-- @if ($beds->room_number >= 100)
                <br><label style="margin-top: 3px;"><u>Price (ต่างชาติ)</u> : {{ $beds->price_foreigner }} บาท </label><label style="font-size: 0.75em;color:red">(รวมค่าห้อง,ค่าอาหาร,ค่าการพยาบาล,ค่าบริการโรงพยาบาล)</label>
                @endif --}}
            </div>
        </div>
    </div>
</body>
</html>