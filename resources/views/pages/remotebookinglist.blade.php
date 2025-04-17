@extends('../layout/' . $layout)

@section('subhead')
    <title>Remote Booking List</title>
@endsection

@section('subcontent')
    <div class="loader"></div>
    <h2 class="intro-y text-lg font-medium mt-10 d-inline">Remote Bookings</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2"></div>
    </div>

    @if ($totalRecords > 0)
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible list-table">
            <table class="table table-report mt-2" aria-label="remote-booking-list">
                <thead class="sticky-top">
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Full Name</th>
                        <th class="whitespace-nowrap">Birthdate</th>
                        <th class="whitespace-nowrap">City</th>
                        <th class="whitespace-nowrap">Entry Date</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody id="remote-booking-list">
                    @php $no = 0; @endphp
                    @foreach ($remotebookings as $rbook)
                        <tr class="intro-x">
                            <td>{{ ($page - 1) * 15 + ++$no }}</td>
                            <td>{{ $rbook->fullname ?? '--' }}</td>
                            <td>{{ $rbook->birthdate ?? '--' }}</td>
                            <td>{{ $rbook->city ?? '--' }}</td>
                            <td>{{ $rbook->created_at ? $rbook->created_at->format('d M, Y h:i A') : '--' }}</td>
                            <td class="text-center">
                                <div class="flex justify-center items-center space-x-2">
                                    <a href="{{ route('remotebookingshow', $rbook->id) }}"
                                        class="flex items-center text-success hover:underline">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>View
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-inline text-slate-500 pagecount">
            Showing {{ $start }} to {{ $end }} of {{ $totalRecords }} entries
        </div>

        <div class="d-inline intro-y col-span-12 addbtn">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination" id="pagination">
                    <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ route('remotebookinglist', ['page' => $page - 1]) }}">
                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                        </a>
                    </li>
                    @for ($i = 0; $i < $totalPages; $i++)
                        <li class="page-item {{ $page == $i + 1 ? 'active' : '' }}">
                            <a class="page-link"
                                href="{{ route('remotebookinglist', ['page' => $i + 1]) }}">{{ $i + 1 }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ route('remotebookinglist', ['page' => $page + 1]) }}">
                            <i class="w-4 h-4" data-lucide="chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    @else
        <div class="intro-y" style="height:100%">
            <div style="display:flex;align-items:center;height:100%;">
                <div style="margin:auto">
                    <img src="{{ asset('build/assets/images/nodata.png') }}" style="height:290px" alt="noData">
                    <h3 class="text-center">No Data Available</h3>
                </div>
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
