@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <h1>Name: {{$item->name}}</h1><br>
        <h1>Code: {{$item->code}}</h1><br>
        <h1>Website: {{$item->website_url}}</h1><br>
        <div class="row">
            <h1>Products: {{ @count($item->products) }}</h1>
        </div>
    </div>
</div>