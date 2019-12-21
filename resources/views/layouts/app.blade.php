<?php
use Illuminate\Support\Facades\Route;
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.nav')

        <div class="row content">
            @include('layouts.sideNav')

        <main class="container-fluid main-content">
            @yield('content')
        </main>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script src="{{ asset('js/sideNav.js') }}"></script>

    @if(request()->routeIs('services.create'))
        <script src="{{ asset('js/customers.js') }}"></script>
        <script>
            jQuery(document).ready(function($){
                var datalist = $('#suggestions');
                var input = $('#customer_id');

                $('#customerForm').on('submit', function(e){
                    e.preventDefault();

                    $.ajax({
                        url : "{{ route('customers.store') }}",
                        method : "POST",
                        data : $('#customerForm').serialize(),
                        success : function(data){
                            var html = '';
                            if(data.errors){
                                html = '<div class="alert alert-danger">';
                                for(let i = 0; i < data.errors.length; i++){
                                    html += '<p>'+data.errors[i]+'</p>';
                                }
                                html += '</div>';
                            }
                            if(data.exists){
                                html += '<div class="alert alert-danger">'+data.exists+'</div>';
                            }
                            if(data.success){
                                html += '<div class="alert alert-success">'+data.success+'</div>';
                                var customerField = $('#carModel').val()  + ' | ' + $('#name').val();
                                $('#customer_id').val(customerField);
                                $('#customerForm')[0].reset();
                            }
                            $('#formResult').html(html);
                        }
                    });
                });

                input.on('input', function(){


                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url : "{{ url('customers/load') }}",
                        data: {
                            'criteria': input.val()
                        },
                        method : "POST",
                        success : function(data){

                            datalist.empty();
                            for (var i = 0; i < data.customers.length; i++) {


                                var option = document.createElement('option');
                                console.log("test: " +data.customers[i]);
                                option.value = data.customers[i];
                                datalist.append(option);
                            }


                        }
                    });
                });

            });

        </script>
    @endif
    @if(request()->routeIs('customers.index') || request()->routeIs('services.index'))
        <script>
            jQuery(document).ready(function($){
               $('#submitDestroyForm').click(function(e){
                   e.preventDefault();
                   $('#destroyForm').submit();
               });
            });

        </script>
    @endif
</body>
</html>
