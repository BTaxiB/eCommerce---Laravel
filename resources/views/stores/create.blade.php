@extends('layouts.app')

@section('content')

<div class="container-fluid row">
    <form action="{{ route('stores.store') }}" class="form-control" method="POST">
        @csrf
        <div class="row">
            <td>Name</td>
            <input type="text" name="name">
        </div>
        <div class="row">
            <td>Code</td>
            <input type="text" name="code">
        </div>
        <div class="row">
            <td>Website</td>
            <input type="text" name="website_url">
        </div>

        <div class="row">
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Submit</button>
            </td>
        </div>
    </form>
</div>