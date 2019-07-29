@php
    /** @var \App\Account[] $accounts */;
@endphp

<div class="row justify-content-center">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Code</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($accounts as $account)
            <tr>
                <td>{{ $account->slug }}</td>
                <td>{{ $account->description }}</td>
                {{--<td>--}}
                    {{--<a href="{{ route('customers.view', $customer) }}" class="btn btn-link" title="View Details">--}}
                        {{--<i class="fas fa-glasses"></i>--}}
                    {{--</a>--}}
                    {{--<a href="#" class="btn btn-link" title="Edit"><i class="fas fa-edit"></i></a>--}}
                    {{--<a href="#" class="btn btn-link" title="Download ID file"><i class="fas fa-download"></i></a>--}}
                    {{--<a href="{{ route('users.history', $user) }}" class="btn btn-link"--}}
                    {{--title="View change history">--}}
                    {{--<i class="fas fa-history"></i>--}}
                    {{--</a>--}}
                    {{--@can('delete', $user)--}}
                    {{--<form class="d-inline" action="{{ route('users.delete', $user) }}" method="post">--}}
                    {{--@method('delete')--}}
                    {{--@csrf--}}
                    {{--<button class="btn btn-link"><i class="fas fa-trash"></i></button>--}}
                    {{--</form>--}}
                    {{--@endcan--}}
                {{--</td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--<div class="col-md-8">--}}
        {{--{{ $accounts->links('vendor.pagination.bootstrap-4') }}--}}
    {{--</div>--}}
</div>

