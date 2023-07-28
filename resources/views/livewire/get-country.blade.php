<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="container-fluid">
        <div class="row">
            <form action="">
                <div class="form-group">
                    <label for="">Zip code</label>
                    <input type="text" class="form-control" placeholder="postal code here" wire:model.debounce="zip_code">
                </div>
            </form>
        </div>
        <div class="row">
            @if ($country_details)
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>country</th>
                        <th>country_abbr</th>
                        <th>state</th>
                        <th>state_abbr</th>
                        <th>address</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $country_details['country'] }}</td>
                            <td>{{ $country_details['country_abbr'] }}</td>
                            <td>{{ $country_details['state'] }}</td>
                            <td>{{ $country_details['state_abbr'] }}</td>
                            <td>{{ $country_details['address'] }}</td>
                        </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
