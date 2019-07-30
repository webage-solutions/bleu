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
                    <li class="breadcrumb-item active"><a href="{{ route('accounts.index') }}">Accounts</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
        <form method="POST" action="{{ route('accounts.store') }}">
            @csrf

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Name / Description') }}</label>
                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autofocus>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Identification') }}</label>
                <div class="col-md-6">
                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autofocus>
                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="currency" class="col-md-4 col-form-label text-md-right">{{ __('Currency') }}</label>
                <div class="col-md-6">
                    <select id="currency" name="currency" class="form-control @error('currency') is-invalid @enderror">
                        <option value="BRL" {{ old('currency') === 'BRL' ? 'selected' : '' }}>BRL</option>
                        <option value="USD" {{ old('currency') === 'BRL' ? 'selected' : '' }}>USD</option>
                        <option value="EUR" {{ old('currency') === 'BRL' ? 'selected' : '' }}>EUR</option>
                    </select>
                    @error('currency')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="initial_balance" class="col-md-4 col-form-label text-md-right">{{ __('Initial Balance') }}</label>
                <div class="col-md-6">
                    <input id="initial_balance" type="number" step="0.01" class="form-control @error('initial_balance') is-invalid @enderror" name="initial_balance" value="{{ old('initial_balance') ?? 0.00 }}" autofocus>
                    @error('initial_balance')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create Account') }}
                    </button>

                </div>
            </div>
        </form>
    </div>
@endsection
