@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard</title>
@endsection

@section('subcontent')
    <div class="loader"></div>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5"></h2>
                        @guest
                            <h3>Guest</h3>
                        @endguest
                    </div>
                    @foreach ($result as $dash)
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                                <a href="{{ route('appointmentlist') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="phone-call" class="report-box__icon text-primary"></i>
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">
                                                {{ $dash['totalAppointCount'] }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Total Appointments</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                                <a href="{{ route('remotebookinglist') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">

                                            <div class="flex">
                                                <i data-lucide="message-square" class="report-box__icon text-pending"></i>
                                                <div class="ml-auto">

                                                </div>
                                            </div>

                                            <div class="text-3xl font-medium leading-8 mt-6">
                                                {{ $dash['remoteBookingCount'] }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Total Remote Bookings</div>
                                        </div>
                                    </div>
                                </a>
                            </div>


                            <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                                <a href="{{ route('servicelist') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="file-text" class="report-box__icon text-warning"></i>

                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">
                                                {{ $dash['serviceCount'] }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Total Services</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                                <a href="{{ route('contactlist') }}">
                                    <div class="report-box">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="indian-rupee" class="report-box__icon text-success"></i>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $dash['contactUsCount'] }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Contact Requests</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                                <a href="{{ route('adsVideos') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="user" class="report-box__icon text-success"></i>
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $dash['videoCount'] }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Total Videos</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                                <a href="{{ route('clientlist') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="user" class="report-box__icon text-success"></i>
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $dash['clientCount'] }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Total Clients</div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                                <a href="{{ route('testimoniallist') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="shopping-cart" class="report-box__icon text-success"></i>
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">
                                                {{ $dash['testimonialCount'] }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Total Testimonials</div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}

                            {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                                <a href="{{ route('story-list') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="play-circle" class="report-box__icon text-warning"></i>
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $dash['totalStories'] }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Total Story Posted</div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                        </div>
                </div>
                <!-- BEGIN: Latest Appointments & Remote Bookings -->
                <div class="col-span-12 mt-8">
                    <div class="grid grid-cols-12 gap-6">
                        <!-- Latest Appointments -->
                        <div class="col-span-12 lg:col-span-6">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">Latest Appointments</h2>
                                <a href="{{ route('appointmentlist') }}" class="ml-auto text-primary truncate">View All</a>
                            </div>
                            <div class="intro-y box p-5 mt-5">
                                <div class="overflow-x-auto">
                                    <table class="table table-report">
                                        <thead>
                                            <tr>
                                                <th class="whitespace-nowrap">Name</th>
                                                <th class="whitespace-nowrap">Contact</th>
                                                {{-- <th class="whitespace-nowrap">Date/Time</th> --}}
                                                <th class="whitespace-nowrap">Reason</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($latestAppointments as $appointment)
                                                <tr class="intro-x">
                                                    <td>
                                                        <span
                                                            class="font-medium whitespace-nowrap">{{ $appointment->name }}</span>
                                                    </td>
                                                    <td>
                                                        @if ($appointment->mobile)
                                                            {{ $appointment->mobile }}<br>
                                                        @endif
                                                        @if ($appointment->email)
                                                            {{ $appointment->email }}
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        @if ($appointment->preferred_date)
                                                            {{ date('d M Y', strtotime($appointment->preferred_date)) }}
                                                            @if ($appointment->preferred_time)
                                                                <br>{{ date('h:i A', strtotime($appointment->preferred_time)) }}
                                                            @endif
                                                        @else
                                                            Not specified
                                                        @endif
                                                    </td> --}}
                                                    <td class="text-truncate" style="max-width: 150px;"
                                                        title="{{ $appointment->reason }}">
                                                        {{ Str::limit($appointment->reason, 30) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Latest Remote Bookings -->
                        <div class="col-span-12 lg:col-span-6">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">Latest Remote Bookings</h2>
                                <a href="{{ route('remotebookinglist') }}" class="ml-auto text-primary truncate">View
                                    All</a>
                            </div>
                            <div class="intro-y box p-5 mt-5">
                                <div class="overflow-x-auto">
                                    <table class="table table-report">
                                        <thead>
                                            <tr>
                                                <th class="whitespace-nowrap">Name</th>
                                                {{-- <th class="whitespace-nowrap">Birth Details</th> --}}
                                                <th class="whitespace-nowrap">Location</th>
                                                <th class="whitespace-nowrap">Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($latestRemoteBookings as $booking)
                                                <tr class="intro-x">
                                                    <td>
                                                        <span
                                                            class="font-medium whitespace-nowrap">{{ $booking->fullname }}</span>
                                                    </td>
                                                    {{-- <td>
                                                        {{ date('d M Y', strtotime($booking->birthdate)) }}<br>
                                                        {{ date('h:i A', strtotime($booking->birthtime)) }}
                                                    </td> --}}
                                                    <td>
                                                        {{ $booking->city }}<br>
                                                        {{ Str::limit($booking->address, 20) }}
                                                    </td>
                                                    <td class="text-truncate" style="max-width: 150px;"
                                                        title="{{ $booking->additional_notes }}">
                                                        {{ Str::limit($booking->additional_notes, 30) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 lg:col-span-12">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">Latest Contact Us</h2>
                                <a href="{{ route('contactlist') }}" class="ml-auto text-primary truncate">View All</a>
                            </div>
                            <div class="intro-y box p-5 mt-5">
                                <div class="overflow-x-auto">
                                    <table class="table table-report">
                                        <thead>
                                            <tr>
                                                <th class="whitespace-nowrap">Name</th>
                                                <th class="whitespace-nowrap">Email</th>
                                                <th class="whitespace-nowrap">Message</th>
                                                <th class="whitespace-nowrap text-center">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($latestContacts as $contact)
                                                <tr class="intro-x">
                                                    <td>
                                                        <span
                                                            class="font-medium whitespace-nowrap">{{ $contact->contact_name ?? '--' }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="whitespace-nowrap">{{ $contact->contact_email ?? '--' }}</span>
                                                    </td>
                                                    <td class="text-truncate" style="max-width: 180px;"
                                                        title="{{ $contact->contact_message }}">
                                                        {{ Str::limit(ucwords($contact->contact_message), 40, '...') }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($contact->created_at)->format('d M, Y h:i A') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END: Latest Appointments & Remote Bookings -->

            </div>
        </div>
        <!-- BEGIN: Weekly Top Products -->

        @if (count($dash['unverifiedAstrologer']) > 0)
            <div class="col-span-12 mt-6">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Unverified Astrologers</h2>
                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                    </div>
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <table class="table table-report sm:mt-2" aria-label="astrologer">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Profile</th>
                                <th class="whitespace-nowrap">Name</th>
                                <th class="text-center whitespace-nowrap">ContactNo</th>
                                <th class="text-center whitespace-nowrap">Skills</th>
                                <th class="text-center whitespace-nowrap">Languages</th>
                                <th class="text-center whitespace-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dash['unverifiedAstrologer'] as $unverified)
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img class="tooltip rounded-full" alt="profileImage"
                                                    src="{{ $unverified->profileImage }}"
                                                    onerror="this.onerror=null;this.src="{{ asset('images/person.png') }}";" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-40">
                                        <a class="font-medium whitespace-nowrap">{{ $unverified->name }}</a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                        </div>
                                    </td>
                                    <td class="text-center w-40">{{ $unverified->contactNo }}</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center">
                                            <a class="font-medium whitespace-nowrap">{{ $unverified->allSkill }}</a>
                                        </div>
                                    </td>
                                    <td class="w-40 text-center">
                                        <a class="font-medium whitespace-nowrap">{{ $unverified->languageKnown }}</a>
                                    </td>
                                    <td class="w-40 text-center">
                                        <div class="flex justify-center items-center">
                                            <a onclick="editbtn({{ $unverified->id }},{{ $unverified->isVerified }})"
                                                href="javascript:;" data-tw-target="#verifiedAstrologer"id="editbtn"
                                                class="flex items-center mr-3 text-success" data-tw-toggle="modal">
                                                @if ($unverified->isVerified)
                                                    <i style="color:brown"
                                                        data-lucide="{{ $unverified->isVerified ? 'lock' : 'unlock' }}"
                                                        class="w-4 h-4 mr-1"></i>
                                                @else
                                                    <i data-lucide="{{ $unverified->isVerified ? 'lock' : 'unlock' }}"
                                                        class="w-4 h-4 mr-1"></i>
                                                @endif
                                                @if ($unverified->isVerified)
                                                    <span style="color:brown"> UnVerified</span>
                                                @else
                                                    Verified
                                                @endif
                                            </a>
                                            <a class="flex items-center mr-3 text-success"
                                                href="astrologers/{{ $unverified->id }}">
                                                <i data-lucide="eye" class="w-4 h-4 mr-1"></i>View
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        @endif
        @endforeach
        <!-- END: Weekly Top Products -->
    </div>
    <div id="verifiedAstrologer" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <div class="text-3xl mt-5">Are You Sure?</div>
                        <div class="text-slate-500 mt-2" id="verified">You want Verified!</div>
                    </div>
                    <form action="{{ route('verifiedAstrologer') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="filed_id" name="filed_id">
                        <div class="px-5 pb-8 text-center"><button class="btn btn-primary mr-3" id="btnVerified">Yes,
                                Verified it!
                            </button><a type="button" data-tw-dismiss="modal" class="btn btn-secondary w-24"
                                onclick="location.reload();">Cancel</a>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        function editbtn($id, $isVerified) {
            var id = $id;
            $cid = id;

            $('#filed_id').val($cid);
            var verified = $isVerified ? 'UnVerified' : 'Verified';
            document.getElementById('verified').innerHTML = "You want to " + verified;
            document.getElementById('btnVerified').innerHTML = "Yes, " +
                verified + " it";
        }
        var labels = {{ Js::from($labels) }};
        var users = {{ Js::from($data) }};
        var calls = {{ Js::from($callData) }};
        var chats = {{ Js::from($chatData) }};
        var reports = {{ Js::from($reportData) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'Earning',
                backgroundColor: '#426f80',
                borderColor: '#426f80',
                data: users,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
        const barChartData = {
            labels: labels,
            datasets: [{
                    label: 'Call',
                    backgroundColor: '#426f80',
                    borderColor: '#426f80',
                    data: calls,
                },
                {
                    label: 'Chat',
                    backgroundColor: '#fea42d',
                    borderColor: '#fea42d',
                    data: chats,
                }, {
                    label: 'Report',
                    backgroundColor: '#ddd',
                    borderColor: '#ddd',
                    data: reports,
                }
            ]
        };

        const requestConfig = {
            type: 'bar',
            data: barChartData,
            options: {}
        };

        const requestChart = new Chart(
            document.getElementById('requestChart'),
            requestConfig
        );
    </script>
    <script>
        $(window).on('load', function() {
            $('.loader').hide();
        })
    </script>
@endsection
