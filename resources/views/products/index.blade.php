@extends('layouts.app')
@section('content')
<div class="container-fluid main">
    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Url</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->price}}</td>
                <td>
                    @if(!empty($item->url()->first()->name))
                    {{$item->url()->first()->name}}
                    @endif
                </td>
                <td>
                    <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('products.edit', $item->id) }}">
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

</html>