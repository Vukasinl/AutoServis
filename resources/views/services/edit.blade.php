@extends('layouts.app')

@section('content')

    <div class="card col-md-8 offset-md-2 col-12 mt-4 p-4">
        <div class="row">
            <div class="col-10">
                <h3 class="text-center">Izmeni podatke o servisu</h3>
            </div>
            <div class="col-2">
                {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'delete', 'id' => 'destroyForm']) !!}
                    @csrf
                    {!! Form::submit('Izbriši', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>

        {!! Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'patch']) !!}
            @csrf
            <div class="form-group row my-4">
                {!! Form::label('name', 'Ime klijenta: ', ['class' => 'col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::text('name', $service->customer->name, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row my-4">
                {!! Form::label('carModel', 'Model auta: ', ['class' => 'col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::text('carModel', $service->customer->carModel, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row my-4">
                {!! Form::label('plateNum', 'Registarski broj tablica: ', ['class' => 'col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::text('plateNum', $service->customer->plateNum, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row my-4">
                {!! Form::label('description', 'Opis kvara: ', ['class' => 'col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row my-4">
                {!! Form::label('phoneNum', 'Telefon: ', ['class' => 'col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::text('phoneNum', $service->customer->phoneNum, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row my-4">
                {!! Form::label('address', 'Adresa: ', ['class' => 'col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::text('address', $service->customer->address, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row my-4">
                {!! Form::label('email', 'E-mail: ', ['class' => 'col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::text('email', $service->customer->email, ['class' => 'form-control']) !!}
                </div>
            </div>
            {!! Form::hidden('customer_id', $service->customer->id) !!}
            {!! Form::submit('Sačuvaj', ['class' => 'btn btn-primary btn-block col-12 col-md-8 offset-md-2 my-4']) !!}
        {!! Form::close() !!}
    </div>



@endsection
