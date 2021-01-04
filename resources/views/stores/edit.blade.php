@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h1>Store: {{ $item->name }}</h1>
    <h3>Store Code: {{ $item->code }}</h3>
    <h3>Store Code: {{ $item->code }}</h3>
    <h3>Store Website: {{ $item->website_url }}</h3>
    <td>{{ @count($item->products) }}</td>
</div>