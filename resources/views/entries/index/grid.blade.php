@php
    /** @var \App\Account[] $accounts */;
@endphp

<div class="row justify-content-center">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Account</th>
            <th scope="col">Value</th>
            <th scope="col">Currency</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($entries as $entry)
            <tr>
                <td>{{ $entry->time->format('d/m/Y') }}</td>
                <td>{{ $entry->account->slug }}</td>
                <td class="{{ $entry->value < 0 ? 'text-danger' : 'text-success' }}">
                    {{ $entry->value }}
                </td>
                <td>{{ $entry->account->currency }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--<div class="col-md-8">--}}
        {{--{{ $accounts->links('vendor.pagination.bootstrap-4') }}--}}
    {{--</div>--}}
</div>

