@extends('../layout/' . $layout)

@section('subhead')
    <title>Appointment List</title>
@endsection

@section('subcontent')
    <div class="loader"></div>
    <h2 class="intro-y text-lg font-medium mt-10 d-inline">Appointments</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0"></div>
        </div>
    </div>

    @if ($totalRecords > 0)
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible list-table">
            <table class="table table-report mt-2" aria-label="appointment-list">
                <thead class="sticky-top">
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Name</th>
                        <th class="whitespace-nowrap">Mobile</th>
                        <th class="whitespace-nowrap">Reason</th>
                        <th class="text-center whitespace-nowrap">Entry Date</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody id="todo-list">
                    @php $no = 0; @endphp
                    @foreach ($appointments as $alist)
                        <tr class="intro-x">
                            <td>{{ ($page - 1) * 15 + ++$no }}</td>
                            <td>
                                <div class="font-medium whitespace-nowrap">
                                    {{ $alist->name ?? '--' }}
                                </div>
                            </td>
                            <td>
                                <div class="font-medium whitespace-nowrap">
                                    {{ $alist->mobile ?? '--' }}
                                </div>
                            </td>
                            <td>
                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ ucfirst($alist->reason) }}"
                                    style="cursor: pointer;">
                                    {{ !empty($alist->reason) ? (strlen($alist->reason) > 50 ? ucfirst(substr($alist->reason, 0, 50)) . ' ...' : ucfirst($alist->reason)) : '--' }}
                                </span>
                            </td>
                            <td class="text-center">
                                {{ $alist->created_at ? $alist->created_at->format('d M, Y h:i A') : '--' }}
                            </td>
                            <td>
                                <a class="flex items-center text-success" href="{{ route('appointmentshow', $alist->id) }}">
                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i>View
                                </a>
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
                        <a class="page-link" href="{{ route('appointmentlist', ['page' => $page - 1]) }}">
                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                        </a>
                    </li>
                    @for ($i = 0; $i < $totalPages; $i++)
                        <li class="page-item {{ $page == $i + 1 ? 'active' : '' }}">
                            <a class="page-link"
                                href="{{ route('appointmentlist', ['page' => $i + 1]) }}">{{ $i + 1 }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ route('appointmentlist', ['page' => $page + 1]) }}">
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
