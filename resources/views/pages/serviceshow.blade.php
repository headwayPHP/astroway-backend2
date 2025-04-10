@extends('../layout/' . $layout)

@section('subhead')
    <title>Service Details</title>
@endsection

@section('subcontent')
    <div class="loader"></div>
    <h2 class="intro-y text-lg font-medium mt-10 d-inline">Service Details</h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 box p-5">
            <div><strong>Service Name:</strong> {{ $service->service_name }}</div>
            <div><strong>Service Type:</strong> {{ ucfirst($service->service_type) }}</div>
            <div><strong>Status:</strong>
                <span class="badge bg-{{ $service->status == 'active' ? 'success' : 'danger' }}">
                    {{ ucfirst($service->status) }}
                </span>
            </div>
            <div>
                <strong>Icon:</strong><br>
                @if ($service->service_icon)
                    <img src="{{ asset('storage/' . $service->service_icon) }}" alt="Service Icon" width="80"
                        height="80">
                @else
                    <span>--</span>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(window).on('load', function() {
            $('.loader').hide();
        });
    </script>
@endsection
