@extends('layouts.app')

@section('content')
<div class="container p-4">
    <h2 class="my-4 font-weight-bold">Dobrodošli {{Auth::user()->name ?? ''}}</h2>
    <h3 class="my-3"><a href="{{route('services.index')}}">Auti na servisu</a></h3>
    @if($servicesActive->count() == 0)
        <p>Trenutno nema auta na servisu!</p>
    @else

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
            @foreach($servicesActive as $service)
                <tr>
                    <td>{{$service->customer->name}}</td>
                    <td>{{$service->customer->carModel}}</td>
                    <td>{{$service->description}}</td>
                    <td>{{$service->customer->phoneNum}}</td>
                    <td>{{$service->customer->address}}</td>
                    <td>{{$service->created_at}}</td>
                    <td>
                        @auth
                            <a href="services/{{ $service->id }}/edit"><i class="fas fa-edit"></i></a>
                            <a href="services/{{$service->id}}/finish"><i class="fas fa-check-double"></i></a>
                        @endauth
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
