@php
    /** @var \App\Transaction[] $transactions */;
@endphp

<div class="row justify-content-center">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Transaction Date</th>
            <th scope="col">Description</th>
            <th scope="col">Accounts</th>
            <th scope="col">Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->from_time->format('d/m/Y') }} ({{ $transaction->to_time->format('d/m/Y') }})</td>
                <td>{{ $transaction->description }}</td>
                <td>{{ $transaction->from_account->slug }} -> {{ $transaction->to_account->slug }}</td>
                <td>
                    {{ $transaction->from_amount }} {{ $transaction->from_account->currency }}
                    ->
                    {{ $transaction->to_amount }} {{ $transaction->to_account->currency }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--<div class="col-md-8">--}}
        {{--{{ $accounts->links('vendor.pagination.bootstrap-4') }}--}}
    {{--</div>--}}
</div>

