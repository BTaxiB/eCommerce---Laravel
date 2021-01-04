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
</style>
<div class="container-fluid">
    <div class="row">
        <h1>Products: {{ @count($item->products) }}</h1>
    </div>

    <form action="{{ route('stores.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="{{ $item->name }}">
        </div>
        <hr>

        <div class="row">
            <label for="code">Code</label>
            <input class="form-control" type="text" name="code" value="{{ $item->code }}">
        </div>
        <hr>

        <div class="row">
            <label for="website_url">Website</label>
            <input class="form-control" type="text" name="website_url" value="{{$item->website_url}}">
        </div>
        <hr>

        <div class="row">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>