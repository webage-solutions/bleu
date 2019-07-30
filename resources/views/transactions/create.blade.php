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
                    <li class="breadcrumb-item active"><a href="{{ route('transactions.index') }}">Transactions and Payments</a></li>
                    <li class="breadcrumb-item active">New Transaction</li>
                </ol>
            </nav>
        </div>
        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autofocus>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">&nbsp;</div>
                <div class="col-md-6">
                    <hr/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">&nbsp;</div>
                <div class="col-md-3"><strong>From:</strong></div>
                <div class="col-md-3"><strong>To:</strong></div>
            </div>

            <div class="form-group row">
                <label for="from_account_id" class="col-md-4 col-form-label text-md-right">{{ __('Account') }}</label>
                <div class="col-md-3">
                    <select id="from_account_id" name="from_account_id" class="form-control @error('from_account_id') is-invalid @enderror">
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}" {{ old('currency') === $account->slug ? 'selected' : '' }} title="{{ $account->description }}">{{ $account->slug }} ({{ $account->currency }})</option>
                        @endforeach
                    </select>
                    @error('from_account_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <select id="to_account_id" name="to_account_id" class="form-control @error('to_account_id') is-invalid @enderror">
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}" {{ old('currency') === $account->slug ? 'selected' : '' }} title="{{ $account->description }}">{{ $account->slug }} ({{ $account->currency }})</option>
                        @endforeach
                    </select>
                    @error('to_account_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="from_amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>
                <div class="col-md-3">
                    <input id="from_amount" type="number" step="0.01" min="0.01" class="form-control @error('from_amount') is-invalid @enderror" name="from_amount" value="{{ old('from_amount') }}" autofocus>
                    @error('from_amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <input id="to_amount" type="number" step="0.01" min="0.01" class="form-control @error('to_amount') is-invalid @enderror" name="to_amount" value="{{ old('to_amount') }}" autofocus>
                    @error('to_amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="from_time" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                <div class="col-md-3">
                    <input id="from_time" type="date" class="form-control @error('from_time') is-invalid @enderror" name="from_time" value="{{ old('from_time') ?? now()->format('Y-m-d') }}" required autofocus>
                    @error('from_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <input id="to_time" type="date" class="form-control @error('to_time') is-invalid @enderror" name="to_time" value="{{ old('to_time') ?? now()->format('Y-m-d') }}" required autofocus>
                    @error('to_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create Transaction') }}
                    </button>

                </div>
            </div>
        </form>
    </div>
@endsection
