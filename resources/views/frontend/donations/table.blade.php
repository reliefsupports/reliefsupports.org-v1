<table class="table table-responsive" id="donations-table">
    <thead>
    <tr>
        <th>{{ __('interface.details.name') }}</th>
        <th>{{ __('interface.main_menu.aid') }}</th>
        <th>{{ __('interface.details.address') }}</th>
        <th>{{ __('interface.details.city') }}</th>
        <th>{{ __('interface.details.phone') }}</th>
        <th>{{ __('interface.details.entered_at') }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($donations as $donation)
        <tr>
            <th scope="row">{{ $donation->id }}</th>
            <td>{{ $donation->name }}</td>
            <td>{{ str_limit($donation->donation, 150) }}</td>
            <td>{{ str_limit($donation->address, 150) }}</td>
            <td>{{ $donation->city }}</td>
            <td>{{ $donation->telephone }}</td>
            <td>{{ $donation->created_at }}</td>
            <td><button type="button" class="btn btn-primary read-donation" data-id="{{ $donation->id }}">{{ __('interface.general.read_full') }}</button></td>
        </tr>
    @endforeach
    </tbody>
</table>