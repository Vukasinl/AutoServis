@extends('layouts.app')

@section('content')

<div class="card servis-form">
    {!! Form::open(['route' => 'services.store']) !!}
    @csrf

    <div class="form-group row">
        {!! Form::label('customer_id', 'Klijent: ', ['class' => 'col-12 col-md-2']) !!}


        <div class="col-12 col-md-8">
            {!! Form::text('customer_id', null, ['class' => 'form-control', 'list' => 'suggestions', 'autocomplete' => 'off']) !!}
            <datalist id="suggestions">

            </datalist>
        </div>
        <div class="col-12 offset-md-0 col-md-2 add-customer">
            <span class="fas fa-plus-square" data-toggle="modal" data-target="#customer-form"></span>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('description', 'Opis kvara: ', ['class' => 'col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    {!! Form::submit('Saćuvaj', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
</div>



<div class="modal customer-form" tabindex="-1" role="dialog" id="customer-form">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dodaj klijenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>

            </div>


            <div class="modal-body">

                {!! Form::open(['route' => 'customers.store', 'id' => 'customerForm']) !!}
                <span id="formResult">
                </span>


                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach


                {{csrf_field()}}

                <div class="form-group row">
                    {!! Form::label('name', '*Ime: ', ['class' => 'col-12 col-md-3']) !!}

                    <div class="col-12 col-md-9">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('plateNum', '*Broj registarskih tablica: ', ['class' => 'col-md-3']) !!}


                    <div class="col-md-9">
                        {!! Form::text('plateNum', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('carModel', '*Model auta: ', ['class' => 'col-md-3']) !!}


                    <div class="col-md-9">
                        {!! Form::text('carModel', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('email', 'Email adresa: ', ['class' => 'col-md-3']) !!}


                    <div class="col-md-9">
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('phoneNum', 'Broj telefona: ', ['class' => 'col-md-3']) !!}


                    <div class="col-md-9">
                        {!! Form::text('phoneNum', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('address', 'Adresa: ', ['class' => 'col-md-3']) !!}


                    <div class="col-md-9">
                        {!! Form::text('address', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                {!! Form::submit('Saćuvaj', ['class' => 'btn btn-primary btn-block', 'id' => 'addCustomerBtn']) !!}
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">

            </div>



        </div>
    </div>
</div>


@endsection
