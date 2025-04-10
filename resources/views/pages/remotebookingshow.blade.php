@extends('../layout/' . $layout)

@section('subhead')
    <title>Remote Booking Details</title>
@endsection

@section('subcontent')
    <div class="loader"></div>
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-2xl font-bold">Remote Booking Details</h2>
        <div class="ml-auto">
            <span
                class="px-3 py-1 rounded-full text-xs font-medium
                {{ $booking ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                {{ $booking ? 'Active Booking' : 'No Booking' }}
            </span>
        </div>
    </div>

    @if ($booking)
        <div class="intro-y box p-8 mt-5 shadow-lg rounded-xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Personal Information Section -->
                <div class="space-y-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Personal Information</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Full Name</label>
                                <p class="mt-1 text-gray-900 font-medium">{{ $booking->fullname ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Birthdate</label>
                                <p class="mt-1 text-gray-900">
                                    {{ $booking->birthdate ? \Carbon\Carbon::parse($booking->birthdate)->format('j F Y') : 'N/A' }}
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Birth Time</label>
                                <p class="mt-1 text-gray-900">{{ $booking->birthtime ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Location Information -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Location Information</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Birth Place</label>
                                <p class="mt-1 text-gray-900">{{ $booking->birthplace ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">City</label>
                                <p class="mt-1 text-gray-900">{{ $booking->city ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Address</label>
                                <p class="mt-1 text-gray-900">{{ $booking->address ?? '--' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Google Location</label>
                                <a href="{{ $booking->google_location }}" target="_blank"
                                    class="mt-1 inline-flex items-center text-blue-600 hover:text-blue-800">
                                    <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i> View on Map
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property Details Section -->
                <div class="space-y-6">
                    <!-- Layout Map -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Layout Map</h3>
                        @if ($booking->layout_map)
                            @php
                                $extension = pathinfo($booking->layout_map, PATHINFO_EXTENSION);
                            @endphp
                            <div class="mt-2">
                                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <div class="relative group">
                                        <img src="{{ asset('storage/app/public/' . $booking->layout_map) }}"
                                            alt="Layout Map" class="rounded-md w-full max-w-md border border-gray-200">
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10
                                                    transition-all duration-200 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                            <a href="{{ asset('storage/app/public/' . $booking->layout_map) }}" download
                                                class="bg-white p-2 rounded-full shadow-lg">
                                                <i data-lucide="download" class="w-5 h-5 text-blue-600"></i>
                                            </a>
                                        </div>
                                    </div>
                                @elseif($extension === 'pdf')
                                    <div class="border border-gray-200 rounded-md p-2">
                                        <embed src="{{ asset('storage/app/public/' . $booking->layout_map) }}"
                                            type="application/pdf" width="100%" height="300px" />
                                    </div>
                                @endif
                                <a href="{{ asset('storage/app/public/' . $booking->layout_map) }}" download
                                    class="inline-flex items-center text-blue-600 hover:text-blue-800 mt-3">
                                    <i data-lucide="download" class="w-4 h-4 mr-1"></i> Download Layout Map
                                </a>
                            </div>
                        @else
                            <p class="text-gray-500 italic">No layout map provided</p>
                        @endif
                    </div>

                    <!-- Compass Reading -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Compass Reading</h3>
                        @if ($booking->compass_reading)
                            <div class="relative group">
                                <img src="{{ asset('storage/app/public/' . $booking->compass_reading) }}"
                                    alt="Compass Reading" class="rounded-md w-full max-w-md border border-gray-200">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10
                                            transition-all duration-200 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <a href="{{ asset('storage/app/public/' . $booking->compass_reading) }}" download
                                        class="bg-white p-2 rounded-full shadow-lg">
                                        <i data-lucide="download" class="w-5 h-5 text-blue-600"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ asset('storage/app/public/' . $booking->compass_reading) }}" download
                                class="inline-flex items-center text-blue-600 hover:text-blue-800 mt-3">
                                <i data-lucide="download" class="w-4 h-4 mr-1"></i> Download Compass Reading
                            </a>
                        @else
                            <p class="text-gray-500 italic">No compass reading provided</p>
                        @endif
                    </div>
                </div>

                <!-- Full Width Sections -->
                <div class="md:col-span-2">
                    <!-- Property Video -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Property Video</h3>
                        @if ($booking->property_video)
                            <div class="mt-2">
                                <div class="relative w-full max-w-2xl mx-auto">
                                    <video controls class="rounded-md w-full border border-gray-200">
                                        <source src="{{ asset('storage/app/public/' . $booking->property_video) }}"
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <a href="{{ asset('storage/app/public/' . $booking->property_video) }}" download
                                    class="inline-flex items-center text-blue-600 hover:text-blue-800 mt-3">
                                    <i data-lucide="download" class="w-4 h-4 mr-1"></i> Download Property Video
                                </a>
                            </div>
                        @else
                            <p class="text-gray-500 italic">No property video provided</p>
                        @endif
                    </div>
                </div>

                <div class="md:col-span-2">
                    <!-- Additional Notes -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Additional Notes</h3>
                        <div class="prose max-w-none">
                            <p class="text-gray-700">{{ $booking->additional_notes ?: 'No additional notes provided' }}</p>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2 pt-4 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Created At</label>
                            <p class="mt-1 text-gray-900">
                                {{ $booking->created_at ? \Carbon\Carbon::parse($booking->created_at)->format('j F Y h:i A') : 'N/A' }}
                            </p>
                        </div>
                        <div class="text-right">
                            <label class="block text-sm font-medium text-gray-500">Booking ID</label>
                            <p class="mt-1 text-gray-900 font-mono">{{ $booking->id ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="intro-y flex flex-col items-center justify-center mt-10">
            <img src="{{ asset('build/assets/images/nodata.png') }}" class="h-64" alt="No Data">
            <h3 class="text-xl font-medium text-gray-700 mt-6">No Booking Data Available</h3>
            <p class="text-gray-500 mt-2">There are currently no booking details to display.</p>
            <a href="#" class="btn btn-primary mt-4">
                <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Create New Booking
            </a>
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
