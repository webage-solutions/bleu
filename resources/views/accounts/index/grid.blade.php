@php
    /** @var \App\Account[] $accounts */;
@endphp

<div class="row justify-content-center">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Code</th>
            <th scope="col">Description</th>
            <th scope="col">Currency</th>
            <th scope="col">Balance</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($accounts as $account)
            <tr>
                <td>{{ $account->slug }}</td>
                <td>{{ $account->description }}</td>
                <td>{{ $account->currency }}</td>
                <td class="{{ $account->current_balance < 0 ? 'text-danger' : 'text-success' }}">
                    {{ $account->current_balance }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--<div class="col-md-8">--}}
        {{--{{ $accounts->links('vendor.pagination.bootstrap-4') }}--}}
    {{--</div>--}}
</div>

