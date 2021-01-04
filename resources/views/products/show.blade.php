@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <h1>Name: {{$item->name}}</h1><br>
        <h1>Description: {{$item->description}}</h1><br>
        <h1>Price: {{$item->price}}</h1><br>
        @if(count($item->stores) > 0)
        <div class="row">
            <h1>In Stores: </h1><br>
            @foreach($item->stores as $store)
            <h5>->>> {{ $store->name }}
                <h5><br>
                    @endforeach
        </div>
        @endif
    </div>
</div>