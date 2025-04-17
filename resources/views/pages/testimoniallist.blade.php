@extends('../layout/' . $layout)

@section('subhead')
    <title>Testimonials</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10 d-inline">Testimonials</h2>

    @if ($totalRecords > 0)
        <a class="btn btn-primary shadow-md mr-2 mt-10 d-inline addbtn printpdf">PDF</a>
        <a class="btn btn-primary shadow-md mr-2 mt-10 d-inline addbtn downloadcsv">CSV</a>
    @endif

    <a class="btn btn-primary shadow-md mr-2 mt-10 d-inline addbtn" href="{{ route('testimonialadd') }}">Add Testimonial</a>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form action="{{ route('testimoniallist') }}" method="GET" enctype="multipart/form-data">
                    <div class="w-56 relative text-slate-500" style="display:inline-block">
                        <input value="{{ $searchString }}" type="text" class="form-control w-56 box pr-10"
                            placeholder="Search..." id="searchString" name="searchString">
                        @if (!$searchString)
                            <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                        @else
                            <a href="{{ route('testimoniallist') }}">
                                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="x"></i>
                            </a>
                        @endif
                    </div>
                    <button class="btn btn-primary shadow-md mr-2">Search</button>
                </form>
            </div>
        </div>
    </div>

    @if ($totalRecords > 0)
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible list-table">
            <table class="table table-report mt-2" aria-label="testimonial-list">
                <thead class="sticky-top">
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">IMAGE</th>
                        <th class="whitespace-nowrap">NAME</th>
                        <th class="whitespace-nowrap">PROFESSION</th>
                        <th class="whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody id="testimonial-list">
                    @php $no = 0; @endphp
                    @foreach ($testimonials as $testimonial)
                        <tr class="intro-x">
                            <td>{{ ($page - 1) * 15 + ++$no }}</td>
                            <td>
                                @if ($testimonial->image)
                                    <img src="{{ asset('storage/app/public/' . $testimonial->image) }}" alt="Image"
                                        class="w-16 h-16 rounded">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->profession }}</td>
                            <td>
                                <div
                                    class="flex items-center justify-start {{ $testimonial->status == 'active' ? 'text-success' : 'text-danger' }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                                    {{ ucfirst($testimonial->status) }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 text-success"
                                        href="{{ route('testimonialshow', $testimonial->id) }}">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>View
                                    </a>
                                    <a class="flex items-center mr-3"
                                        href="{{ route('testimonialedit', $testimonial->id) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>Edit
                                    </a>
                                    <a href="javascript:;" class="flex items-center deletebtn text-danger"
                                        onclick="if(confirm('Are you sure you want to delete this testimonial?')) { document.getElementById('delete-form-{{ $testimonial->id }}').submit(); }">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>Delete
                                    </a>

                                    <form id="delete-form-{{ $testimonial->id }}"
                                        action="{{ route('testimonialdelete', $testimonial->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-inline text-slate-500 pagecount">Showing {{ $start }} to {{ $end }} of
            {{ $totalRecords }} entries</div>

        <div class="d-inline intro-y col-span-12 addbtn">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination" id="pagination">
                    <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ route('testimoniallist', ['page' => $page - 1, 'searchString' => $searchString]) }}">
                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                        </a>
                    </li>
                    @php
                        $showPages = 15;
                        $halfShowPages = floor($showPages / 2);
                        $startPage = max(1, $page - $halfShowPages);
                        $endPage = min($startPage + $showPages - 1, $totalPages);
                    @endphp

                    @if ($startPage > 1)
                        <li class="page-item"><a class="page-link"
                                href="{{ route('testimoniallist', ['page' => 1, 'searchString' => $searchString]) }}">1</a>
                        </li>
                        @if ($startPage > 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endif

                    @for ($i = $startPage; $i <= $endPage; $i++)
                        <li class="page-item {{ $page == $i ? 'active' : '' }}">
                            <a class="page-link"
                                href="{{ route('testimoniallist', ['page' => $i, 'searchString' => $searchString]) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($endPage < $totalPages)
                        @if ($endPage < $totalPages - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item"><a class="page-link"
                                href="{{ route('testimoniallist', ['page' => $totalPages, 'searchString' => $searchString]) }}">{{ $totalPages }}</a>
                        </li>
                    @endif

                    <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ route('testimoniallist', ['page' => $page + 1, 'searchString' => $searchString]) }}">
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
