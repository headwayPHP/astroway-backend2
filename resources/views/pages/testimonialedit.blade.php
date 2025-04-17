@extends('../layout/' . $layout)

@section('subhead')
    <title>Edit Testimonial</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 mt-2">
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Edit Testimonial</h2>
                </div>
                <form method="POST" enctype="multipart/form-data" id="edit-form"
                    action="{{ route('testimonialupdate', $testimonial->id) }}">
                    @csrf
                    @method('POST')
                    <div id="input" class="p-5">
                        <div class="preview">
                            <div class="sm:grid grid-cols-2 gap-4">
                                {{-- Image --}}
                                <div class="input">
                                    <label class="form-label">Image</label>
                                    @if ($testimonial->image)
                                        <img src="{{ asset('storage/app/public/' . $testimonial->image) }}"
                                            class="h-32 mb-2 rounded" />
                                    @endif
                                    <input type="file" name="image" class="form-control inputs"
                                        onchange="previewImage(this, '#preview-image')">
                                    <img id="preview-image" class="mt-2 h-32" style="display: none;">
                                    <div class="text-danger print-image-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="input">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select inputs" required>
                                        <option value="active" {{ $testimonial->status == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="inactive" {{ $testimonial->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    <div class="text-danger print-status-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                {{-- Name --}}
                                <div class="input">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control inputs"
                                        value="{{ $testimonial->name }}" required>
                                    <div class="text-danger print-name-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                {{-- Profession --}}
                                <div class="input">
                                    <label class="form-label">Role</label>
                                    <input type="text" name="profession" class="form-control inputs"
                                        value="{{ $testimonial->profession }}" required>
                                    <div class="text-danger print-role-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                {{-- Testimonial Message --}}
                                <div class="input col-span-2">
                                    <label class="form-label">Message</label>
                                    <textarea name="testimonial" class="form-control inputs" rows="4" required>{{ $testimonial->testimonial }}</textarea>
                                    <div class="text-danger print-message-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary shadow-md mr-2">Update Testimonial</button>
                                <a href="{{ route('testimoniallist') }}" class="btn btn-secondary">Cancel</a>
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
                    image: '.print-image-error-msg',
                    name: '.print-name-error-msg',
                    role: '.print-role-error-msg',
                    testimonial: '.print-message-error-msg',
                    status: '.print-status-error-msg'
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

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
@endsection
