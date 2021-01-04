@extends('layouts.app')

@section('content')
<style>
    div.row {
        width: 50%;
        margin: 0 auto;
    }

    hr {
        width: 50%;
        margin: 0 auto 5px auto !important;
    }

    h5:hover {
        color: wheat;
    }
</style>
<div class="container-fluid">
    <form action="{{ route('products.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            Name
            <input class="form-control" type="text" name="name" value="{{ $item->name }}">
        </div>
        <hr>

        <div class="row">
            Description
            <input class="form-control" type="text" name="description" value="{{ $item->description }}">
        </div>
        <hr>

        <div class="row">
            Price
            <input type="text" name="price" value="{{ $item->price }}">
        </div>
        <hr>

        @if(!empty($item->url()->first()->name))
        <div class="row">
            URL
            <input class="form-control" type="text" name="product_url" value="{{$item->url()->first()->name}}">
        </div>
        @endif
        <hr>

        @if(count($item->stores) > 0)
        <div class="row">
            In Stores: <br>
            @foreach($item->stores as $store)
            <h5>{{ $store->name }}
                <h5><br>
                    @endforeach
        </div>
        @endif
        <hr>

        @if(count($options = checkStore($stores, $item->stores)) > 0)
        <div class="row">
            Choose Stores
            <hr>
            @foreach($options as $option)
            <div class="row">
                <label for="store">{{$option->name}}</label>
                <input type="checkbox" name="store[]" value="{{ $option->id }}"><br>
            </div>
            @endforeach
        </div>
        @endif

        <div class="row">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>