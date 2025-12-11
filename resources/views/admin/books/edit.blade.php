@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('books.update', $book->id) }}">
    @csrf
    @method('PUT')
    @include('books._form', ['submit' => 'Update Buku'])
</form>
@endsection
