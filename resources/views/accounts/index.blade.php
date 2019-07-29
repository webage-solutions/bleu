@php
    /** @var \App\Account[] $accounts */
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">

        {{--<div class="row justify-content-center">--}}
            {{--@if ($flashStatus !== null)--}}
                {{--<div class="alert alert-{{ $flashStatus[0] }} alert-dismissible fade show" role="alert">--}}
                    {{--{!! $flashStatus[1]  !!}--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active">Accounts</li>
                </ol>
            </nav>
        </div>
        <div class="row">

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                        <a href="#" class="btn btn-secondary">
                            <i class="fas fa-plus"></i> Add Account
                        </a>
                </div>
            </div>


        </div>
        <br/>
        @include('accounts.index.grid', compact('accounts'))
    </div>
@endsection
