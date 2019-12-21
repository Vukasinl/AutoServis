@extends('layouts.app')

@section('content')

    <table class="table table-sm table-services">
        <thead>
        <tr>
            <th scope="col">Ime</th>
            <th scope="col">Model auta</th>
            <th scope="col">Opis kvara</th>
            <th scope="col">Telefon</th>
            <th scope="col">Adresa</th>
            <th scope="col">Datum prijema</th>
            <th scope="col">Servis</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <td>{{$service->customer->name}}</td>
                <td>{{$service->customer->carModel}}</td>
                <td>{{$service->description}}</td>
                <td>{{$service->customer->phoneNum}}</td>
                <td>{{$service->customer->address}}</td>
                <td>{{$service->created_at}}</td>
                <td>
                    <a href="services/{{ $service->id }}/edit"><i class="fas fa-edit"></i></a>
                    <a href="services/{{$service->id}}/finish"><i class="fas fa-check-double"></i></a>

                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="container d-flex justify-content-center mt-4">
            {{ $services->links() }}
        </div>
    </div>

@endsection
