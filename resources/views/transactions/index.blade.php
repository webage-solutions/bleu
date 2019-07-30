@php
    /** @var \App\Transaction[] $transactions */
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active">Transactions and Payments</li>
                </ol>
            </nav>
        </div>
        @include('widgets/flash-message')
        <div class="row">

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                        <a href="{{ route('transactions.create') }}" class="btn btn-secondary">
                            <i class="fas fa-plus"></i> Add Transaction
                        </a>
                </div>
            </div>


        </div>
        <br/>
        @include('transactions.index.grid', compact('transactions'))
    </div>
@endsection
