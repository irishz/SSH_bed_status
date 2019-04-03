@extends('layout')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Room NO.</th>
                <th scope="col">Status</th>
                <th scope="col">Bed NO.</th>
                <th scope="col">เวลา Admit</th>
                <th scope="col">เวลา Discharge</th>
                <th scope="col">Employee Admit</th>
                <th scope="col">Room Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beds as $bed)
                @if ($bed->current_bed = 1)
                    <tr id='Notavailable'>
                @else
                    <tr id='Available'>
                @endif
                        <th scope="row">{{ $bed->room_number }}</th>
                        <td>{{ $bed->current_bed }}</td>
                        <td>{{ $bed->bed_number }}</td>
                        <td>{{ $bed->move_date }}</td>
                        <td>{{ $bed->move_out_date }}</td>
                        <td>{{ $bed->room_type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection