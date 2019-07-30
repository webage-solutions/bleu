@php
    /** @var \App\Account[] $accounts */
    /** @var string $type */
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('entries.index') }}">Revenues and Expenses</a></li>
                    <li class="breadcrumb-item active">New {{ $type === 'revenue' ? 'Revenue' : 'Expense' }}</li>
                </ol>
            </nav>
        </div>
        @include('widgets/flash-message')
        <form method="POST" action="{{ route('entries.store', ['type' => $type]) }}">
            @csrf

            <div class="form-group row">
                <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                <div class="col-md-6">
                    <input id="time" type="date" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') ?? now()->format('Y-m-d') }}" required autofocus>
                    @error('time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

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

            <div class="form-group row">
                <label for="account_id" class="col-md-4 col-form-label text-md-right">{{ __('Account') }}</label>
                <div class="col-md-6">
                    <select id="account_id" name="account_id" class="form-control @error('account_id') is-invalid @enderror">
                        @foreach ($accounts as $account)
                        <option value="{{ $account->id }}" {{ old('currency') === $account->slug ? 'selected' : '' }} title="{{ $account->description }}">{{ $account->slug }} ({{ $account->currency }})</option>
                        @endforeach
                    </select>
                    @error('account_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="value" class="col-md-4 col-form-label text-md-right">{{ __(($type === 'revenue' ? 'Revenue' : 'Expense') .  ' Value') }}</label>
                <div class="col-md-6">
                    <input id="value" type="number" min="0.01" step="0.01" class="form-control @error('value') is-invalid @enderror {{$type === 'revenue' ? 'text-success' : 'text-danger'}}" name="value" value="{{ old('value') }}" autofocus>
                    @error('value')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn {{$type === 'revenue' ? 'btn-success' : 'btn-danger'}}">
                        {{ __('Create ' . ($type === 'revenue' ? 'Revenue' : 'Expense')) }}
                    </button>

                </div>
            </div>
        </form>
    </div>
@endsection
