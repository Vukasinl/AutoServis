@extends('layouts.app')

@section('content')

    <table class="table table-sm table-services">
        <thead>
        <tr>
            <th scope="col">Ime</th>
            <th scope="col">Model auta</th>
            <th scope="col">Registarski broj tablica</th>
            <th scope="col">Telefon</th>
            <th scope="col">Adresa</th>
            <th scope="col">Akcija</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->carModel}}</td>
                <td>{{$customer->plateNum}}</td>
                <td>{{$customer->phoneNum}}</td>
                <td>{{$customer->address}}</td>
                <td>
                    <a href="customers/{{ $customer->id }}/edit"><i class="fas fa-edit"></i></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="container d-flex justify-content-center mt-4">
            {{ $customers->links() }}
        </div>
    </div>
@endsection
