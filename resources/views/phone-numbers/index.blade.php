@extends('layouts.app')

@section('content')
    <div class="filters">
        <form method="GET" id = "filteration_form" action="{{ route('phone-numbers.index') }}">
            <div class="form-group">
                <select name="country" id="country">
                    <option value="">Select Country</option>
                    @foreach($countries as $countryOption)
                        <option value="{{ $countryOption }}" {{ $country === $countryOption ? 'selected' : '' }}>
                            {{ $countryOption }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <select name="state" id="state">
                    <option value="">Valid Phone Numbers</option>
                    <option value="OK" {{ $state === 'OK' ? 'selected' : '' }}>OK</option>
                    <option value="NOK" {{ $state === 'NOK' ? 'selected' : '' }}>NOK</option>
                </select>
            </div>
        </form>
    </div>

    <div class="table-container">
        @if($phoneNumbers->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>State</th>
                        <th>Country Code</th>
                        <th>Phone Num</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phoneNumbers as $analysis)
                        <tr>
                            <td>{{ $analysis->country_name }}</td>
                            <td>
                                <span class="badge {{ $analysis->is_valid ? 'badge-valid' : 'badge-invalid' }}">
                                    {{ $analysis->is_valid ? 'OK' : 'NOK' }}
                                </span>
                            </td>
                            <td>{{ $analysis->country_code  }}</td>
                            <td>{{ preg_replace('/^\([^)]+\)\s*/', '', $analysis->customer->phone) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                @if ($phoneNumbers->onFirstPage())
                    <span class="disabled">« Prev</span>
                @else
                    <a href="{{ $phoneNumbers->appends(request()->query())->previousPageUrl() }}">« Prev</a>
                @endif

                

                @if ($phoneNumbers->hasMorePages())
                    <a href="{{ $phoneNumbers->appends(request()->query())->nextPageUrl() }}">Next »</a>
                @else
                    <span class="disabled">Next »</span>
                @endif
            </div>
        @else
            <div class="no-results">
                <p>No phone numbers matched search</p>
            </div>
        @endif
    </div>
@endsection

@section("scripts")
    <script>
         $(document).ready(function() {
           $(document).on("change","#state",function(event) {
                event.preventDefault();
                $("#filteration_form").submit();
           });
           $(document).on("change","#country",function(event) {
                event.preventDefault();
                $("#filteration_form").submit();
           });
        });
    </script>
@endsection