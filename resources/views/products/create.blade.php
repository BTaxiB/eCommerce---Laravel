@extends('layouts.app')

@section('content')

<div class="container-fluid row">
    <form action="{{ route('products.store') }}" class="form-control" method="POST">
        @csrf
        <div class="row">
            <td>Name</td>
            <input type="text" name="name">
        </div>
        <div class="row">
            <td>Description</td>
            <input type="text" name="description">
        </div>
        <div class="row">
            <td>Price</td>
            <input type="text" name="price">
        </div>

        <div class="row">
            <td>URL</td>
            <input type="text" name="product_url">
        </div>

        <div class="row">
            <td>Choose Stores</td>
            <hr>
            @foreach($stores as $store)
            <div class="row">
                <label for="store">{{$store->name}}</label>
                <input type="checkbox" name="store[]" value="{{ $store->id }}"><br>
            </div>
            @endforeach
        </div>
        <div class="row">
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Submit</button>
            </td>
        </div>
    </form>
</div>