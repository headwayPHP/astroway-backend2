@extends('../layout/' . $layout)

@section('subhead')
    <title>Edit Client</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 mt-2">
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Edit Client</h2>
                </div>
                <form method="POST" enctype="multipart/form-data" id="edit-form"
                    action="{{ route('clientupdate', $client->id) }}">
                    @csrf
                    @method('POST')
                    <div id="input" class="p-5">
                        <div class="preview">
                            <div class="sm:grid grid-cols-2 gap-4">
                                <div class="input">
                                    <label class="form-label">Client Image</label>
                                    @if ($client->client_image)
                                        <img src="{{ asset('storage/app/public/' . $client->client_image) }}"
                                            class="h-32 mb-2 rounded" />
                                    @endif
                                    <input type="file" name="client_image" class="form-control inputs"
                                        onchange="previewImage(this, '#preview-image')">
                                    <img id="preview-image" class="mt-2 h-32" style="display: none;">
                                    <div class="text-danger print-client-image-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select inputs" required>
                                        <option value="active" {{ $client->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $client->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    <div class="text-danger print-status-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>

                                <div class="input col-span-2 mt-2">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" name="client_name" class="form-control inputs"
                                        value="{{ $client->client_name }}" required>
                                    <div class="text-danger print-client-name-error-msg mb-2" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary shadow-md mr-2">Update Client</button>
                                <a href="{{ route('clientlist') }}" class="btn btn-secondary">Cancel</a>
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
                    client_image: '.print-client-image-error-msg',
                    client_name: '.print-client-name-error-msg',
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
