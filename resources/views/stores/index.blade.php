@extends('layouts.app')
@section('content')
<div class="container-fluid main">
    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Website URL</th>
                <th>Products Count</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->code}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->website_url}}</td>
                <td>{{@count($item->products)}}</td>
                <td>
                    <form action="{{ route('stores.destroy', $item->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('stores.edit', $item->id) }}">
                            <i class="fas fa-edit  fa-lg"></i> EDIT
                        </a>

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" type="submit" title="delete">
                            <i class="fas fa-trash fa-lg text-danger"></i> DELETE
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection