@extends('layouts.app') <!-- Extend your master layout if you have one -->

@section('content')
    <div class="container">
        <h1>Product View: {{ $category1->name }}</h1>
        <p>Category: {{ $category1->name }}</p>
        <!-- Add more product information here -->
    </div>
@endsection
