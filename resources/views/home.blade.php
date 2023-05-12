@extends('layouts/main-layout')

@section('content')


{{-- {{dd($trains)}} --}}
<div class="container">
    <h1>Treni</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Codice treno</th>
                <th>Stazione di partenza</th>
                <th>Stazione di arrivo</th>
                <th>Orario di partenza</th>
                <th>Orario di arrivo</th>
                <th>Numero di carrozze</th>
                <th>Compagnia</th>
                <th>In orario</th>
                <th>Cancellato</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trains->where('departure_time', '>=', '11-05-2023') as $train)
            <tr>
                <td>{{$train->id}}</td>
                <td>{{$train->train_code}}</td>
                <td>{{$train->departure_station}}</td>
                <td>{{$train->arrival_station}}</td>
                <td>{{date('d-m-Y H:i', strtotime($train->departure_time))}}</td>
                <td>{{date('d-m-Y H:i', strtotime($train->arrival_time))}}</td>
                <td>{{$train->number_of_coaches}}</td>
                <td>{{ucfirst($train->company)}}</td>
                <td>@if($train->is_on_time)
                    {{'Sì'}}
                    @else {{'Ritardo di: ' . rand(5, 360) . ' minuti'}}
                    @endif
                </td>
                <td class="{{$train->is_cancelled ? 'cancelled' : ''}}">@if($train->is_cancelled)
                    <span>CANCELLATO</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

@endsection