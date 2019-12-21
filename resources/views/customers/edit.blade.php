@extends('layouts.app')

@section('content')

    <div class="card col-md-8 offset-md-2 col-12 mt-4 p-4">
        <div class="row">
            <div class="col-10">
                <h3 class="text-center">Izmeni podatke o klijentu</h3>
            </div>
            <div class="col-2">
                {!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'delete', 'id' => 'destroyForm']) !!}
                    @csrf
                    {!! Form::submit('Izbriši', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'patch']) !!}
        @csrf
        <div class="form-group row my-4">
            {!! Form::label('name', 'Ime klijenta: ', ['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row my-4">
            {!! Form::label('carModel', 'Model auta: ', ['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
                {!! Form::text('carModel', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row my-4">
            {!! Form::label('plateNum', 'Registarski broj tablica: ', ['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
                {!! Form::text('plateNum', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group row my-4">
            {!! Form::label('phoneNum', 'Telefon: ', ['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
                {!! Form::text('phoneNum', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row my-4">
            {!! Form::label('address', 'Adresa: ', ['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
                {!! Form::text('address', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row my-4">
            {!! Form::label('email', 'E-mail: ', ['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        {!! Form::submit('Sačuvaj', ['class' => 'btn btn-primary btn-block col-12 col-md-8 offset-md-2 my-4']) !!}
        {!! Form::close() !!}
    </div>



@endsection
