@php
    /** @var \App\Entry[] $entries */
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active">Revenues and Expenses</li>
                </ol>
            </nav>
        </div>
        @include('widgets/flash-message')
        <div class="row">

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                        <a href="{{ route('entries.create', ['revenue']) }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add New Revenue
                        </a>
                    <a href="{{ route('entries.create', ['expense']) }}" class="btn btn-danger">
                        <i class="fas fa-minus"></i> Add New Expense
                    </a>
                </div>
            </div>


        </div>
        <br/>
        @include('entries.index.grid', compact('entries'))
    </div>
@endsection
