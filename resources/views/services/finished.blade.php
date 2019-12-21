@extends('layouts.app')

@section('content')

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">Ime</th>
            <th scope="col">Model auta</th>
            <th scope="col">Opis kvara</th>
            <th scope="col">Telefon</th>
            <th scope="col">Adresa</th>
            <th scope="col">Na autu urađeno</th>
            <th scope="col">Datum prijema</th>
            <th scope="col">Datum servisa</th>
            <th scope="col">Akcije</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($services as $service)
                <tr>
                    <td>{{$service->customer->name}}</td>
                    <td>{{$service->customer->carModel}}</td>
                    <td>{{$service->description}}</td>
                    <td>{{$service->customer->phoneNum}}</td>
                    <td>{{$service->customer->address}}</td>
                    <td>{{$service->done}}</td>
                    <td>{{$service->created_at}}</td>
                    <td>{{$service->updated_at}}</td>
                    <td>

                    </td>

                </tr>
            @endforeach
        </tr>
        </tbody>
    </table>

@endsection
