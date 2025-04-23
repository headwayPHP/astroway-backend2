@extends('../layout/' . $layout)

@section('subhead')
    <title>Edit Service</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 mt-2">
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Edit Service</h2>
                </div>
                <form method="POST" enctype="multipart/form-data" id="edit-form"
                    action="{{ route('serviceupdate', $service->id) }}">
                    @csrf
                    @method('POST')
                    <div id="input" class="p-5">
                        <div class="preview">

                            <div class="sm:grid grid-cols-2 gap-4">
                                <div class="input">
                                    <label class="form-label">Service Icon</label>
                                    @if ($service->service_icon)
                                        <img src="{{ asset('storage/app/public/' . $service->service_icon) }}"
                                            class="h-16 mb-2 rounded" />
                                    @endif
                                    <input type="file" accept="image/*" name="service_icon" class="form-control inputs"
                                        onchange="previewImage(this, '#preview-icon')">
                                    <img id="preview-icon" class="mt-2 h-16" style="display: none;">
                                    <div class="text-danger print-service-icon-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input">
                                    <label class="form-label">Service Banner</label>
                                    @if ($service->service_banner)
                                        <img src="{{ asset('storage/app/public/' . $service->service_banner) }}"
                                            class="h-20 mb-2 rounded" />
                                    @endif
                                    <input type="file" accept="image/*" name="service_banner" class="form-control inputs"
                                        onchange="previewImage(this, '#preview-banner')">
                                    <img id="preview-banner" class="mt-2 h-20" style="display: none;">
                                    <div class="text-danger print-service-banner-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input col-span-2 mt-2">
                                    <label class="form-label">Service Images (Multiple)</label>
                                    @if ($service->service_images)
                                        <div class="flex gap-2 mb-2 flex-wrap">
                                            @foreach (json_decode($service->service_images) as $img)
                                                <img src="{{ asset('storage/app/public/' . $img) }}"
                                                    class="h-16 w-auto rounded border" />
                                            @endforeach
                                        </div>
                                    @endif
                                    <input type="file" accept="image/*" name="service_images[]"
                                        class="form-control inputs" multiple
                                        onchange="previewMultipleImages(this, '#preview-multiple')">
                                    <div id="preview-multiple" class="flex gap-2 mt-2 flex-wrap"></div>
                                    <div class="text-danger print-service-images-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input col-span-2 mt-2">
                                    <label class="form-label">Service Title</label>
                                    <input type="text" name="service_title" class="form-control inputs"
                                        value="{{ $service->service_title }}" required>
                                    <div class="text-danger print-service-title-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input col-span-2 mt-2">
                                    <label class="form-label">Service Details</label>
                                    <textarea name="service_details" class="form-control inputs" rows="4" required>{{ $service->service_details }}</textarea>
                                    <div class="text-danger print-service-details-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary shadow-md mr-2">Update Service</button>
                                <a href="{{ route('servicelist') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function printErrorMsg(msg) {
            jQuery(".text-danger").hide().find("ul").html('');
            jQuery.each(msg, function(key, value) {
                const classMap = {
                    service_icon: '.print-service-icon-error-msg',
                    service_banner: '.print-service-banner-error-msg',
                    service_images: '.print-service-images-error-msg',
                    service_title: '.print-service-title-error-msg',
                    service_details: '.print-service-details-error-msg',
                };

                if (classMap[key]) {
                    jQuery(classMap[key]).show().find("ul").append('<li>' + value + '</li>');
                } else {
                    toastr.warning(value);
                }
            });
        }

        $(window).on('load', function() {
            $('.loader').hide();
        });

        function previewImage(input, previewId) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $(previewId).attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        }

        function previewMultipleImages(input, containerId) {
            const container = $(containerId);
            container.html('');
            if (input.files) {
                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = $('<img>').attr('src', e.target.result).addClass(
                            'h-16 w-auto rounded border');
                        container.append(img);
                    };
                    reader.readAsDataURL(file);
                });
            }
        }

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
@endsection
