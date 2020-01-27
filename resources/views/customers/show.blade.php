@extends('layouts.app')

@section('content')
    <div class="container my-4" >
        <h2 class="text-center my-4">Informacije o klijentu</h2>
        <div class="row">
            <div class="col-5 offset-1">
                <div class="row">
                    <div class="col-12 my-2">
                        <span class="font-weight-bold">Ime: </span>
                        <span>{{ $customer->name }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 my-2">
                        <span class="font-weight-bold">Model auta: </span>
                        <span>{{ $customer->carModel }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 my-2">
                        <span class="font-weight-bold">Registarski broj tablica: </span>
                        <span>{{ $customer->plateNum }}</span>
                    </div>
                </div>

            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col-12 my-2">
                        <span class="font-weight-bold">Email: </span>
                        <span>{{ $customer->email ?? '/'}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 my-2">
                        <span class="font-weight-bold">Telefon: </span>
                        <span>{{ $customer->phoneNum ?? '/' }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 my-2">
                        <span class="font-weight-bold">Adresa: </span>
                        <span>{{ $customer->address ?? '/' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-center my-4">Urađeno</h3>
        <div class="row">
            <div class="col-12">

                @if($customer->services->count() > 0))
                    <table class="table table-sm">
                        <thead>
                        <tr>
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

                        @foreach($customer->services as $service)
                            <tr>
                                <td>{{$service->customer->carModel}}</td>
                                <td>{{$service->description}}</td>
                                <td>{{$service->customer->phoneNum}}</td>
                                <td>{{$service->customer->address}}</td>
                                <td>{{$service->done}}</td>
                                <td>{{$service->created_at}}</td>
                                <td>{{$service->updated_at}}</td>
                                <td>
                                    <a href="{{url("services/$service->id")}}/edit"><i class="fas fa-edit"></i></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Nema</p>
                @endif
            </div>
        </div>
    </div>



@endsection
