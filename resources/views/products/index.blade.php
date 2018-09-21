@extends('layout.website')

@section('content')
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="th-sm">Id
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Name
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">PRICE
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">DISCOUNT
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">PRICE WITH DISCOUTN
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">ACTION
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount }}</td>
                <td>{{ $product->priceWithDiscount }}</td>
                <td><a href="{{ route('products.buy', $product->id) }}">
                        <button type="button" class="btn btn-lg btn-primary">BUY</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection