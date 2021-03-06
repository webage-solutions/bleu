@php
    /** @var \App\Account[] $accounts */
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active">Accounts</li>
                </ol>
            </nav>
        </div>
        @include('widgets/flash-message')
        <div class="row">

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                        <a href="{{ route('accounts.create') }}" class="btn btn-secondary">
                            <i class="fas fa-plus"></i> Add Account
                        </a>
                </div>
            </div>


        </div>
        <br/>
        @include('accounts.index.grid', compact('accounts'))
    </div>
@endsection
