<table class="table table-responsive" id="needs-table">
    <thead>
    <tr>
        <th>#</th>
        <th>{{ __('interface.details.name') }}</th>
        <th>{{ __('interface.main_menu.needs') }}</th>
        <th>{{ __('interface.details.address') }}</th>
        <th>{{ __('interface.details.city') }}</th>
        <th>{{ __('interface.details.phone') }}</th>
        <th>{{ __('interface.details.group') }}</th>
        <th>{{ __('interface.details.entered_at') }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if(count($needs) > 0)
        @foreach($needs as $need)
            <tr>
                <th scope="row">{{ $need->id }}</th>
                <td>{{ $need->name }}</td>
                <td>{{ str_limit($need->needs, 150) }}</td>
                <td>{{ str_limit($need->address, 200) }}</td>
                <td>{{ $need->city }}</td>
                <td>{{ $need->telephone }}</td>
                @if($need->heads && $need->heads > 0)
                <td>{{ $need->heads }}</td>
                @else
                <td>N/A</td>
                @endif
                <td>{{ $need->created_at }}</td>
                <td><button type="button" class="btn btn-primary read-needs" data-id="{{ $need->id }}">{{ __('interface.general.read_full') }}</button></td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>