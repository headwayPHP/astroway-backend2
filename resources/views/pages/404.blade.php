@extends('../layout/' . $layout)

@section('head')
    <title>Error Page - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('content')
    <div class="container mx-auto px-4">
        @php
            $logo = DB::table('systemflag')->where('name', 'AdminLogo')->select('value')->first();
        @endphp
        <!-- BEGIN: Error Page -->
        <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
            <div class="-intro-x lg:mr-20">
                <img alt="Midone - HTML Admin Template" class="h-48 lg:h-auto" style="width: 300px;"
                    src="{{ env('APP_URL') . '/' . $logo->value }}">
            </div>
            <div class="text-white mt-10 lg:mt-0">
                <div class="intro-x text-8xl font-bold">404</div>
                <div class="intro-x text-xl lg:text-3xl font-semibold mt-5">Oops. This page has gone missing.</div>
                <div class="intro-x text-lg mt-3">You may have mistyped the address or the page may have moved.</div>
                <a class="intro-x btn-primary btn py-3 px-4 text-white border-white dark:border-darkmode-400 dark:text-slate-200 mt-10 inline-block rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300"
                    href="{{ route('front.home') }}">
                    Back to Home
                </a>
            </div>
        </div>
        <style>
            * {
                color: rgba(75, 0, 0, 1);
            }
        </style>
        <!-- END: Error Page -->
    </div>
@endsection
