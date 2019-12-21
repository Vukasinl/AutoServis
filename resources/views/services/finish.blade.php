@extends('layouts.app')

@section('content')

    <div class="card col-md-8 offset-md-2 col-12 mt-4 p-4">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Završi servis</h3>
            </div>
        </div>


        <div class="row my-2">
            <div class="col-4 offset-2">
                <span class="font-weight-bold mr-2">Ime:</span>
                <span>{{$service->customer->name}}</span>
            </div>
            <div class="col-4">
                <span class="font-weight-bold mr-2">Model auta:</span>
                <span>{{$service->customer->carModel}}</span>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-4 offset-2">
                <span class="font-weight-bold mr-2">Adresa:</span>
                <span>{{$service->customer->address}}</span>
            </div>
            <div class="col-4">
                <span class="font-weight-bold mr-2">Broj registarskih tablica:</span>
                <span>{{$service->customer->plateNum}}</span>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-4 offset-2">
                <span class="font-weight-bold mr-2">Telefon:</span>
                <span>{{$service->customer->phoneNum}}</span>
            </div>
        </div>

        {!! Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'patch']) !!}
            @csrf
            <div class="form-group row my-4">
                <div class="col-8 offset-2">
                    {!! Form::label('description', 'Opis kvara: ', ['class' => 'font-weight-bold']) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row my-4">
                <div class="col-8 offset-2">
                    {!! Form::label('done', 'Na autu je urađeno: ', ['class' => 'font-weight-bold']) !!}
                    {!! Form::textarea('done', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            {!! Form::submit('Sačuvaj', ['class' => 'btn btn-primary btn-block col-12 col-md-8 offset-md-2 my-4']) !!}
        {!! Form::close() !!}
    </div>



@endsection
