@extends('../layout/' . $layout)

@section('subhead')
    <title>Testimonial Details</title>
    <style>
        .image-thumbnail {
            width: 150px;
            height: 150px;
            object-fit: cover;
            cursor: pointer;
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .image-thumbnail:hover {
            transform: scale(1.05);
        }

        .modal-custom {
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

        .modal-content-custom {
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
    <h2 class="intro-y text-lg font-medium mt-10 d-inline">Testimonial Details</h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 box p-5 space-y-4">
            <div><strong>Name:</strong> {{ $testimonial->name }}</div>

            <div><strong>Profession:</strong> {{ $testimonial->profession }}</div>

            <div><strong>Testimonial:</strong> {{ $testimonial->testimonial }}</div>

            <div>
                <strong>Status:</strong>
                <span class="ml-2 {{ $testimonial->status == 'active' ? 'text-success' : 'text-danger' }}">
                    {{ ucfirst($testimonial->status) }}
                </span>
            </div>

            <div>
                <strong>Image:</strong><br>
                @if ($testimonial->image)
                    <img src="{{ asset('storage/app/public/' . $testimonial->image) }}" alt="Testimonial Image"
                        class="image-thumbnail" onclick="openImageModal(this.src)">
                @else
                    <span>No image uploaded.</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="imageModal" class="modal-custom" onclick="closeImageModal(event)">
        <span class="modal-close" onclick="closeImageModal(event)">&times;</span>
        <img class="modal-content-custom" id="modalImagePreview">
    </div>
@endsection

@section('script')
    <script>
        $(window).on('load', function() {
            $('.loader').hide();
        });

        function openImageModal(src) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImagePreview');
            modalImage.src = src;
            modal.style.display = "block";
        }

        function closeImageModal(event) {
            const modal = document.getElementById('imageModal');
            if (event.target.id === 'imageModal' || event.target.classList.contains('modal-close')) {
                modal.style.display = "none";
            }
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.getElementById('imageModal').style.display = 'none';
            }
        });
    </script>
@endsection
