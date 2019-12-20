@extends('layouts.app')

@section('content')

<div class="card servis-form">
    {!! Form::open(['route' => 'services.store']) !!}
    @csrf

    <div class="form-group row">
        {!! Form::label('customerId', 'Klijent: ', ['class' => 'col-sm-2']) !!}


        <div class="col-sm-8">
            {!! Form::text('customerId', null, ['class' => 'form-control', 'list' => 'suggestions']) !!}
            <datalist id="suggestions">
                <option value="Black Blue">
                <option value="Red">
                <option value="Green">
                <option value="Blue">
                <option value="White">
            </datalist>
        </div>
        <div class="col-sm-2 add-customer">
            <span class="fas fa-plus-square" id="openCustomerForm"></span>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('description', 'Opis kvara: ', ['class' => 'col-sm-2']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    {!! Form::submit('Saćuvaj', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
</div>

<div class="card customer-form shadow" id="customer-form">

    <div class="card-body">
        <h3 class="text-center card-title">Dodaj mušteriju</h3>
        <i class="fas fa-times" id="closeCustomerForm"></i>
        {!! Form::open(['route' => 'services.store']) !!}
        @csrf

        <div class="form-group row">
            {!! Form::label('name', 'Ime: ', ['class' => 'col-sm-3']) !!}


            <div class="col-sm-9">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('plateNum', 'Broj registarskih tablica: ', ['class' => 'col-sm-3']) !!}


            <div class="col-sm-9">
                {!! Form::text('plateNum', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        {!! Form::submit('Saćuvaj', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
</div>


@endsection
