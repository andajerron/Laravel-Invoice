@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>{{ __('Create Invoice') }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action = "{{url('/create-invoice')}}" method = "get">
                        @csrf
                        <label>Invoice Number</label>
                        <input type="text" class="form-control form-control-sm" name="inv_num"><br>

                        <label>Invoice Date</label>
                        <input type="text" class="form-control form-control-sm" name="inv_date" value="YYYY-MM-DD"><br>

                        <label>Customer Name</label>
                        <input type="text" class="form-control form-control-sm" name="cust_name"><br><br>

                        <label>Product Name</label>
                        <input type="text" class="form-control form-control-sm" name="prod_name">

                        <label>Quantity</label>
                        <input type="number" min=0 class="form-control form-control-sm" name="qty">

                        <label>Price</label>
                        <input type="text" class="form-control form-control-sm" name="price" id="price"><br>

                        <label>Total Amount</label>
                        <input type="text" class="form-control form-control-sm" name="total"><br><br>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ url('/home') }}" class="btn btn-xs btn-default">Go back to Home</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
