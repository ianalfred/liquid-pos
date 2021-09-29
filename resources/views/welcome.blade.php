<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Liquid') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.opacity-0{opacity:0}.opacity-100{opacity:1}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-50{--bg-opacity:1;background-color:#f9fafb;background-color:rgba(249, 250, 251, var(--tw-bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.text-2xl{font-size:1.5rem;line-height:2rem;}.sm\:text-3xl{font-size:1.875rem;line-height:2.25rem;}.sm\:text-5xl{font-size:3rem;line-height:1;}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.left-0{left:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.duration-1000{transition-duration:1000ms}.text-center{text-align:center}.text-white{color:#fff}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.text-purple-800{color:#5521b5}.bg-purple-800{background-color:#5521b5}.hover\:bg-purple-700:hover{--tw-bg-opacity:1;background-color:rgba(108, 43, 217, var(--tw-bg-opacity));}.rounded-lg{border-radius:.5rem}.font-bold{font-weight:700}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body class="antialiased" x-data>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-50 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif
            <div class="fixed top-0 left-0 px-6 py-4 sm:block">
                <div class="font-bold text-2xl sm:text-5xl text-purple-800">{{ config('app.name', 'Liquid') }}</div>
            </div>

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

                <div class="mt-8 overflow-hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6 opacity-0 duration-1000" x-intersect="$el.classList.add('opacity-100')">
                            <svg id="a6d09f17-7a71-4d3b-9de6-8b8ba964cb80" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 883.70798 724.22538"><path d="M815.4375,655.50781H541.437a16.519,16.519,0,0,1-16.5-16.5V442.00732a16.51868,16.51868,0,0,1,16.5-16.5H815.4375a16.519,16.519,0,0,1,16.5,16.5V639.00781A16.51929,16.51929,0,0,1,815.4375,655.50781Z" transform="translate(-157.896 -87.88731)" fill="#e6e6e6"/><path d="M546.50182,642.35455h263.8706a8,8,0,0,0,8-8V446.66021a8,8,0,0,0-8-8H546.50182a8,8,0,0,0-8,8V634.35455A8,8,0,0,0,546.50182,642.35455Z" transform="translate(-157.896 -87.88731)" fill="#fff"/><path d="M448.396,391.03223h-274a16.51867,16.51867,0,0,1-16.5-16.5v-197a16.51866,16.51866,0,0,1,16.5-16.5h274a16.51867,16.51867,0,0,1,16.5,16.5v197A16.51868,16.51868,0,0,1,448.396,391.03223Z" transform="translate(-157.896 -87.88731)" fill="#e6e6e6"/><path d="M179.46072,377.87933H443.33133a8,8,0,0,0,8-8V182.185a8,8,0,0,0-8-8H179.46072a8,8,0,0,0-8,8V369.87933A8,8,0,0,0,179.46072,377.87933Z" transform="translate(-157.896 -87.88731)" fill="#fff"/><path d="M778.91936,496.98053H610.36852a6.01968,6.01968,0,1,0,0,12.03936H778.91936a6.01968,6.01968,0,0,0,0-12.03936Z" transform="translate(-157.896 -87.88731)" fill="#e6e6e6"/><path d="M610.36852,534.02466a6.01968,6.01968,0,1,0,0,12.03936H778.91936a6.01968,6.01968,0,0,0,0-12.03936Z" transform="translate(-157.896 -87.88731)" fill="#e6e6e6"/><path d="M610.36852,571.06885a6.01968,6.01968,0,1,0,0,12.03936H778.91936a6.01968,6.01968,0,0,0,0-12.03936Z" transform="translate(-157.896 -87.88731)" fill="#e6e6e6"/><circle cx="420.52193" cy="415.57596" r="7.40884" fill="#4a148c"/><circle cx="420.52193" cy="452.62009" r="7.40884" fill="#e6e6e6"/><circle cx="420.52193" cy="489.66422" r="7.40884" fill="#e6e6e6"/><path d="M711.77684,503.00018h0a6.01961,6.01961,0,0,1-6.01965,6.01965H610.58538a6.167,6.167,0,0,1-6.18439-5.21972,6.03031,6.03031,0,0,1,5.96753-6.81964h95.38867a6.01966,6.01966,0,0,1,6.01965,6.01965Z" transform="translate(-157.896 -87.88731)" fill="#4a148c"/><circle cx="520.54113" cy="288.23669" r="24.07867" fill="#e6e6e6"/><circle cx="678.43713" cy="376.12401" r="12.03934" transform="translate(40.60032 897.66513) rotate(-80.78253)" fill="#fff"/><path d="M198.9668,270.31231a5.96564,5.96564,0,1,0,0,11.93128H423.82524a5.96564,5.96564,0,1,0,0-11.93128Z" transform="translate(-157.896 -87.88731)" fill="#e6e6e6"/><path d="M198.9668,307.02389a5.96564,5.96564,0,1,0,0,11.93128H423.82524a5.96564,5.96564,0,0,0,0-11.93128Z" transform="translate(-157.896 -87.88731)" fill="#e6e6e6"/><path d="M299.46477,345.57107a5.96564,5.96564,0,0,0,0,11.93128h23.86249a5.96564,5.96564,0,0,0,0-11.93128Z" transform="translate(-157.896 -87.88731)" fill="#4a148c"/><path d="M279.42037,194.562a1.83739,1.83739,0,0,0-1.83557,1.83557v46.59619a1.83739,1.83739,0,0,0,1.83557,1.83557h63.95129a1.83739,1.83739,0,0,0,1.83557-1.83557V196.39755a1.83739,1.83739,0,0,0-1.83557-1.83557Z" transform="translate(-157.896 -87.88731)" fill="#4a148c"/><circle cx="153.50003" cy="126.65496" r="10.09569" fill="#fff"/><path d="M327.91625,240.24038a10.01783,10.01783,0,0,1-1.10135,4.589H295.97716a10.09444,10.09444,0,0,1,8.99432-14.68463h12.84906A10.09,10.09,0,0,1,327.91625,240.229Z" transform="translate(-157.896 -87.88731)" fill="#fff"/><circle cx="153.50003" cy="126.65496" r="10.09569" fill="#fff"/><path d="M327.91625,240.24038a10.01783,10.01783,0,0,1-1.10135,4.589H295.97716a10.09444,10.09444,0,0,1,8.99432-14.68463h12.84906A10.09,10.09,0,0,1,327.91625,240.229Z" transform="translate(-157.896 -87.88731)" fill="#fff"/><circle cx="153.50003" cy="23.86253" r="23.86253" fill="#e6e6e6"/><circle cx="153.50003" cy="23.86253" r="11.93126" fill="#4a148c"/><polygon points="748.119 711.24 736.687 711.239 731.25 667.143 748.123 667.145 748.119 711.24" fill="#ffb8b8"/><path d="M728.52095,707.97276h22.04782a0,0,0,0,1,0,0v13.88195a0,0,0,0,1,0,0H714.639a0,0,0,0,1,0,0v0A13.88193,13.88193,0,0,1,728.52095,707.97276Z" fill="#2f2e41"/><polygon points="809.741 711.24 798.308 711.239 792.872 667.143 809.745 667.145 809.741 711.24" fill="#ffb8b8"/><path d="M790.14219,707.97276H812.19a0,0,0,0,1,0,0v13.88195a0,0,0,0,1,0,0H776.26026a0,0,0,0,1,0,0v0A13.88193,13.88193,0,0,1,790.14219,707.97276Z" fill="#2f2e41"/><circle cx="776.25964" cy="373.20424" r="24.56103" fill="#ffb8b8"/><path d="M850.17313,621.26961a9.377,9.377,0,0,1,12.09227-7.77928l13.72625-16.45445,12.03377,5.9026-19.71048,22.96461a9.42779,9.42779,0,0,1-18.14181-4.63348Z" transform="translate(-157.896 -87.88731)" fill="#ffb8b8"/><path d="M968.30684,637.91125a9.37694,9.37694,0,0,1,6.03109-13.05243l2.75577-21.25,13.322-1.47493-4.31317,29.95453a9.42778,9.42778,0,0,1-17.79574,5.82288Z" transform="translate(-157.896 -87.88731)" fill="#ffb8b8"/><path d="M954.68163,507.48222l0,0a12.08366,12.08366,0,0,1,20.75013,2.93029l20.13136,50.24026a31.21152,31.21152,0,0,1,1.90082,16.1937l-6.5574,44.15842a4,4,0,0,1-5.13083,3.23622l-8.63923-2.653a4,4,0,0,1-2.79855-4.28974l0,0a145.305,145.305,0,0,0-11.66387-76.2314l-9.49042-21.22808A12.08366,12.08366,0,0,1,954.68163,507.48222Z" transform="translate(-157.896 -87.88731)" fill="#4a148c"/><path d="M940.13582,485.65159a26.205,26.205,0,1,0-4.91018-51.82531c-5.40118-3.27952-11.6809-5.48627-17.97478-4.925s-12.51835,4.29789-14.87192,10.16208.17487,13.59411,6.02708,15.97731c3.75184,1.52786,7.98866.78691,11.99255.1708s8.37171-1.01818,11.85635,1.04773,5.05106,7.60548,1.93025,10.18835a10.73849,10.73849,0,0,0-3.0842,11.82028C932.66943,482.32412,936.95033,485.58277,940.13582,485.65159Z" transform="translate(-157.896 -87.88731)" fill="#2f2e41"/><path d="M970.60872,620.29851l4.35677,165.33965a4,4,0,0,1-4.20243,4.10017l-14.35213-.73225a4,4,0,0,1-3.74658-3.36683L935.59326,678.25019a2,2,0,0,0-3.92705-.12223l-23.10757,103.3966a4,4,0,0,1-5.24374,2.89644l-14.24375-.87a4,4,0,0,1-2.64985-4.05305l12.434-160.76415Z" transform="translate(-157.896 -87.88731)" fill="#2f2e41"/><path d="M977.60063,541.76779c2.403-25.05536-16.01923-47.71792-41.12634-49.5007-10.81772-.76813-27.61219-1.04272-33.14841,13.13649-16.6774,42.71374,12.51774,41.67582,2.45885,78.68291s-18.94295,39.128-5.14122,41.8003,75.86672,18.447,73.31817-7.60005C972.39515,602.27619,975.20367,566.76061,977.60063,541.76779Z" transform="translate(-157.896 -87.88731)" fill="#4a148c"/><path d="M906.27914,501.059l0,0a12.08365,12.08365,0,0,1,16.29393,13.17809l-7.8391,48.991a47.876,47.876,0,0,1-10.26518,22.80676L879.00934,617.059a4,4,0,0,1-6.06459.13914l-6.04745-6.71587a4,4,0,0,1-.196-5.11814l1.7811-2.31141a134.70322,134.70322,0,0,0,27.04466-66.179l3.11643-25.98472A12.08364,12.08364,0,0,1,906.27914,501.059Z" transform="translate(-157.896 -87.88731)" fill="#4a148c"/><path d="M1040.604,812.11269h-258a1,1,0,0,1,0-2h258a1,1,0,0,1,0,2Z" transform="translate(-157.896 -87.88731)" fill="#ccc"/></svg>
                        </div>

                        <div class="p-6 flex items-center">
                            <div>
                                <div class="font-bold text-2xl">
                                    {{ __('Welcome to our Web Portal') }}
                                </div>
    
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    To have access to operations, please proceed to log in with your login credentials.
                                </div>
                                <div class="opacity-0 duration-1000" x-intersect="$el.classList.add('opacity-100')">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-6 py-2 mt-2 font-semibold text-white transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out transform bg-purple-800 rounded-lg hover:bg-purple-700 focus:outline-none">
                                            {{ __('Login') }}
                                            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                                fill="currentColor">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" />
                                            </svg>
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-2 mt-2 font-semibold text-white transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out transform bg-purple-800 rounded-lg hover:bg-purple-700 focus:outline-none">
                                            {{ __('Login') }}
                                            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                                fill="currentColor">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" />
                                            </svg>
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
