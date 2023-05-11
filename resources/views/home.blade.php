@extends('layouts/main-layout')

@section('content')


{{-- {{dd($trains)}} --}}
<div class="container">
    <h1>Treni</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Codice treno</th>
                <th>Stazione di partenza</th>
                <th>Stazione di arrivo</th>
                <th>Numero di carrozze</th>
                <th>Compagnia</th>
                <th>In orario</th>
                <th>Cancellato</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trains as $train)
            <tr>
                <td>{{$train->train_code}}</td>
                <td>{{$train->departure_station}}</td>
                <td>{{$train->arrival_station}}</td>
                <td>{{$train->number_of_coaches}}</td>
                <td>{{$train->company}}</td>
                <td>@if($train->is_on_time == 1)
                    {{'Sì'}}
                    @else {{'Ritardo di:'}}
                    @endif
                </td>
                <td>@if($train->is_cancelled == 0)
                    {{'No'}}
                    @else {{'Sì'}}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

@endsection