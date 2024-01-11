@extends('layouts.app')

@section('content')
<div class="wrapper pizza-details">
  <h1>Order for {{ $pizza->name }}</h1>
  <p class="type">Type - {{ $pizza->type }}</p>
  <p class="base">Base - {{ $pizza->base }}</p>

  <p class="toppings">Toppings</p>
  <ul>
    @foreach ($pizza->toppings as $topping)
      <li>{{ $topping }}</li>
    @endforeach
  </ul>

  <form action="{{ route('pizza.show', $pizza->id) }}" method="post">
    @csrf
    @method('delete')
    <button>Complete Order</button>
  </form>
 
</div>
<a href="/pizza" class="back"><- Back to all pizzas</a>
@endsection