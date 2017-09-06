@extends('main')

@section('content')


<div class="row _f-flex-spaced _f-flex-align-start">

    @foreach($orders as $order)
        
        <div class="col-5 _f-container _f-orderindex-padding _f-container-hover _f-orderindex-margin">
        
            <h2 class="text-center font-weight-bold">
                Order #{{$order->id}}
            </h2>
            <p>
                Sold by: {{$order->employee->name}}
                    <br>
                Date: {{date('F d, Y', strtotime($order->created_at))}}
            </p>

            <p class="text-center font-weight-bold">Products Selected</p>
            <table class="table table-sm table-hover">
                <tbody>
                    @foreach($order->products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>x{{$product->pivot->quantity}}</td>
                        <td>${{$product->pivot->prePrice}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr class="_f-total-line">
            <h3 class="text-center">
                ${{$order->totalPrice}}
            </h3>
        </div>
        


    @endforeach

</div>


@endsection