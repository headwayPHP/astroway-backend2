@extends('../layout/' . $layout)

@section('subhead')
    <title>Service Details</title>
    <style>
        .image-thumbnail {
            width: 150px;
            height: 150px;
            object-fit: cover;
            cursor: pointer;
            border-radius: 8px;
            transition: transform 0.2s;
            border: 1px solid #e5e7eb;
        }

        .image-thumbnail:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Modal styles */
        #imageModal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        #modalImagePreview {
            display: block;
            margin: 5% auto;
            max-width: 90%;
            max-height: 80%;
            border-radius: 8px;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal-close:hover {
            color: #ccc;
        }
    </style>
@endsection

@section('subcontent')
    <div class="loader"></div>
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-2xl font-bold">Service Details</h2>
    </div>

    <div class="intro-y box p-8 mt-5 shadow-lg rounded-xl">
        <div class="grid grid-cols-1 md: gap-8">
            <!-- Basic Information Section -->
            <div class="space-y-6">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Basic Information</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Service Title</label>
                            <p class="mt-1 text-gray-900 font-medium">{{ $service->service_title }}</p>
                        </div>
                    </div>
                </div>

                <!-- Service Details -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Service Details</h3>
                    <div class="text-gray-700">
                        {!! nl2br(e($service->service_details)) !!}
                    </div>
                </div>
            </div>

            <!-- Media Section -->
            <div class="space-y-6">
                <!-- Service Icon -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Service Icon</h3>
                    @if ($service->service_icon)
                        <img src="{{ asset('storage/app/public/' . $service->service_icon) }}" alt="Service Icon"
                             class="image-thumbnail" onclick="openImageModal(this.src)">
                        <a href="{{ asset('storage/app/public/' . $service->service_icon) }}" download
                           class="inline-flex items-center text-blue-600 hover:text-blue-800 mt-3">
                            <i data-lucide="download" class="w-4 h-4 mr-1"></i> Download Icon
                        </a>
                    @else
                        <p class="text-gray-500 italic">No service icon provided</p>
                    @endif
                </div>

                <!-- Service Banner -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Service Banner</h3>
                    @if ($service->service_banner)
                        <img src="{{ asset('storage/app/public/' . $service->service_banner) }}" alt="Service Banner"
                             class="image-thumbnail" onclick="openImageModal(this.src)">
                        <a href="{{ asset('storage/app/public/' . $service->service_banner) }}" download
                           class="inline-flex items-center text-blue-600 hover:text-blue-800 mt-3">
                            <i data-lucide="download" class="w-4 h-4 mr-1"></i> Download Banner
                        </a>
                    @else
                        <p class="text-gray-500 italic">No service banner provided</p>
                    @endif
                </div>
            </div>

            <!-- Full Width Sections -->
            <div class="md:col-span-2">
                <!-- Service Images -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Service Images</h3>
                    @if ($service->service_images && is_array(json_decode($service->service_images, true)))
                        <div class="grid  md:grid-cols-4 gap-4 mt-2">
                            @foreach (json_decode($service->service_images, true) as $image)
                                <div class="relative">
                                    <img src="{{ asset('storage/app/public/' . $image) }}" alt="Service Image"
                                         class="image-thumbnail" onclick="openImageModal(this.src)">
                                    <a href="{{ asset('storage/app/public/' . $image) }}" download
                                       class="absolute bottom-2 right-2 bg-white rounded-full p-1 shadow-sm">
                                        <i data-lucide="download" class="w-3 h-3 text-blue-600"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">No service images provided</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 z-50 bg-black bg-opacity-75 hidden flex items-center justify-center">
        <span class="absolute top-6 right-6 text-white text-3xl cursor-pointer" onclick="closeImageModal()">×</span>
        <img id="modalImagePreview" src="" class="max-h-[90vh] max-w-[90vw] rounded shadow-lg">
    </div>
@endsection

@section('script')
    <script>
        $(window).on('load', function() {
            $('.loader').hide();
        });

        function openImageModal(src) {
            $('#modalImagePreview').attr('src', src);
            $('#imageModal').removeClass('hidden');
        }

        function closeImageModal() {
            $('#imageModal').addClass('hidden');
            $('#modalImagePreview').attr('src', '');
        }

        $(document).on('click', '#imageModal', function(e) {
            if (e.target.id === 'imageModal') {
                closeImageModal();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeImageModal();
            }
        });
    </script>
@endsection
