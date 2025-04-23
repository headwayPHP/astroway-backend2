@extends('../layout/' . $layout)

@section('subhead')
    <title>Appointment Details</title>
@endsection

@section('subcontent')
    <div class="loader"></div>

    <div class="mt-10">
        <h2 class="text-2xl font-semibold text-gray-800">Appointment Details</h2>
    </div>

    @if ($appointment)
        <div class="bg-white shadow-md rounded-xl p-6 mt-6 space-y-6">
            {{-- Personal Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-500">Name</p>
                    <p class="text-base font-medium text-gray-800">{{ $appointment->name ?? '--' }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="text-base font-medium text-gray-800">{{ $appointment->email ?? '--' }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Mobile</p>
                    <p class="text-base font-medium text-gray-800">{{ $appointment->mobile ?? '--' }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Gender</p>
                    <p class="text-base font-medium text-gray-800">{{ ucfirst($appointment->gender ?? '--') }}</p>
                </div>
            </div>

            {{-- Schedule Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-500">Time of Day</p>
                    <p class="text-base font-medium text-gray-800">{{ ucfirst($appointment->time_of_day ?? '--') }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Way to Reach</p>
                    <p class="text-base font-medium text-gray-800">{{ ucfirst($appointment->way_to_reach ?? '--') }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Preferred Date</p>
                    <p class="text-base font-medium text-gray-800">
                        {{ $appointment->preferred_date ? \Carbon\Carbon::parse($appointment->preferred_date)->format('j F Y') : '--' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Preferred Time</p>
                    <p class="text-base font-medium text-gray-800">
                        {{ $appointment->preferred_time ? \Carbon\Carbon::parse($appointment->preferred_time)->format('h:i A') : '--' }}
                    </p>
                </div>
            </div>

            {{-- Additional Info --}}
            <div>
                <p class="text-sm text-gray-500">Address</p>
                <p class="text-base font-medium text-gray-800">{{ $appointment->address ?? '--' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Reason</p>
                <p class="text-base font-medium text-gray-800">{{ $appointment->reason ?? '--' }}</p>
            </div>
        </div>
    @else
        <div class="flex justify-center items-center mt-10">
            <div class="text-center">
                <img src="{{ asset('build/assets/images/nodata.png') }}" class="mx-auto h-72" alt="No Data">
                <h3 class="mt-4 text-lg text-gray-600 font-semibold">No Appointment Data Available</h3>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <script>
        $(window).on('load', function() {
            $('.loader').hide();
        });
    </script>
@endsection
