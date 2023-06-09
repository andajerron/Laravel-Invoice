@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>{{ __('Invoice List') }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($invoice as $data)

                            <tr>

                            <th><b>Invoice Number:&nbsp;&nbsp;{{$data->invoice_number}}</b></th>
                            <div class="col-sm-8">
                            <a href="{{ url('/update-invoice',[$data->id]) }}" class="btn btn-sm btn-success me-md-2">Edit</a>
                            <a href="{{ url('/delete-invoice',[$data->id]) }}" class="btn btn-sm btn-danger">Delete</a><br><br>
                            </div>
                            </tr>

                    @endforeach
                <a href="{{ url('/create-invoice') }}" class="btn btn-xs btn-primary pull-right">Add Invoice</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
