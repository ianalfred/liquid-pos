<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html {
                line-height: 1.15;
                    -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }

            body {
                margin: 0;
            }

            header,
            nav,
            section {
                display: block;
            }

            figcaption,
            main {
                display: block;
            }

            a {
                background-color: transparent;
                -webkit-text-decoration-skip: objects;
            }

            strong {
                font-weight: inherit;
            }

            strong {
                font-weight: bolder;
            }

            code {
                font-family: monospace, monospace;
                font-size: 1em;
            }

            dfn {
                font-style: italic;
            }

            svg:not(:root) {
                overflow: hidden;
            }

            button,
            input {
                font-family: sans-serif;
                font-size: 100%;
                line-height: 1.15;
                margin: 0;
            }

            button,
            input {
                overflow: visible;
            }

            button {
                text-transform: none;
            }

            button,
            html [type="button"],
            [type="reset"],
            [type="submit"] {
                -webkit-appearance: button;
            }

            button::-moz-focus-inner,
            [type="button"]::-moz-focus-inner,
            [type="reset"]::-moz-focus-inner,
            [type="submit"]::-moz-focus-inner {
                border-style: none;
                padding: 0;
            }

            button:-moz-focusring,
            [type="button"]:-moz-focusring,
            [type="reset"]:-moz-focusring,
            [type="submit"]:-moz-focusring {
                outline: 1px dotted ButtonText;
            }

            legend {
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                color: inherit;
                display: table;
                max-width: 100%;
                padding: 0;
                white-space: normal;
            }

            [type="checkbox"],
            [type="radio"] {
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                padding: 0;
            }

            [type="number"]::-webkit-inner-spin-button,
            [type="number"]::-webkit-outer-spin-button {
                height: auto;
            }

            [type="search"] {
                -webkit-appearance: textfield;
                outline-offset: -2px;
            }

            [type="search"]::-webkit-search-cancel-button,
            [type="search"]::-webkit-search-decoration {
                -webkit-appearance: none;
            }

            ::-webkit-file-upload-button {
                -webkit-appearance: button;
                font: inherit;
            }

            menu {
                display: block;
            }

            canvas {
                display: inline-block;
            }

            template {
                display: none;
            }

            [hidden] {
                display: none;
            }

            html {
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                font-family: sans-serif;
            }

            *,
            *::before,
            *::after {
                -webkit-box-sizing: inherit;
                        box-sizing: inherit;
            }

            p {
                margin: 0;
            }

            button {
                background: transparent;
                padding: 0;
            }

            button:focus {
                outline: 1px dotted;
                outline: 5px auto -webkit-focus-ring-color;
            }

            *,
            *::before,
            *::after {
                border-width: 0;
                border-style: solid;
                border-color: #dae1e7;
            }

            button,
            [type="button"],
            [type="reset"],
            [type="submit"] {
                border-radius: 0;
            }

            button,
            input {
                font-family: inherit;
            }

            input::-webkit-input-placeholder {
                color: inherit;
                opacity: .5;
            }

            input:-ms-input-placeholder {
                color: inherit;
                opacity: .5;
            }

            input::-ms-input-placeholder {
                color: inherit;
                opacity: .5;
            }

            input::placeholder {
                color: inherit;
                opacity: .5;
            }

            button,
            [role=button] {
                cursor: pointer;
            }

            .bg-transparent {
                background-color: transparent;
            }

            .bg-white {
                background-color: #fff;
            }

            .bg-teal-light {
                background-color: #64d5ca;
            }

            .bg-blue-dark {
                background-color: #2779bd;
            }

            .bg-indigo-light {
                background-color: #7886d7;
            }

            .bg-purple-light {
                background-color: #a779e9;
            }

            .bg-no-repeat {
                background-repeat: no-repeat;
            }

            .bg-cover {
                background-size: cover;
            }

            .border-grey-light {
                border-color: #dae1e7;
            }

            .hover\:border-grey:hover {
                border-color: #b8c2cc;
            }

            .rounded-lg {
                border-radius: .5rem;
            }

            .border-2 {
                border-width: 2px;
            }

            .hidden {
                display: none;
            }

            .flex {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
            }

            .items-center {
                -webkit-box-align: center;
                    -ms-flex-align: center;
                        align-items: center;
            }

            .justify-center {
                -webkit-box-pack: center;
                    -ms-flex-pack: center;
                        justify-content: center;
            }

            .font-sans {
                font-family: Nunito, sans-serif;
            }

            .font-light {
                font-weight: 300;
            }

            .font-bold {
                font-weight: 700;
            }

            .font-black {
                font-weight: 900;
            }

            .h-1 {
                height: .25rem;
            }

            .leading-normal {
                line-height: 1.5;
            }

            .m-8 {
                margin: 2rem;
            }

            .my-3 {
                margin-top: .75rem;
                margin-bottom: .75rem;
            }

            .mb-8 {
                margin-bottom: 2rem;
            }

            .max-w-sm {
                max-width: 30rem;
            }

            .min-h-screen {
                min-height: 100vh;
            }

            .py-3 {
                padding-top: .75rem;
                padding-bottom: .75rem;
            }

            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .pb-full {
                padding-bottom: 100%;
            }

            .absolute {
                position: absolute;
            }

            .relative {
                position: relative;
            }

            .pin {
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }

            .text-black {
                color: #22292f;
            }

            .text-purple {
                color: #6c2bd9;
            }

            .text-grey-darkest {
                color: #3d4852;
            }

            .text-grey-darker {
                color: #606f7b;
            }

            .text-2xl {
                font-size: 1.5rem;
            }

            .text-5xl {
                font-size: 3rem;
            }

            .uppercase {
                text-transform: uppercase;
            }

            .antialiased {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            .tracking-wide {
                letter-spacing: .05em;
            }

            .w-16 {
                width: 4rem;
            }

            .w-full {
                width: 100%;
            }

            @media (min-width: 768px) {
                .md\:bg-left {
                    background-position: left;
                }

                .md\:bg-right {
                    background-position: right;
                }

                .md\:flex {
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                }

                .md\:my-6 {
                    margin-top: 1.5rem;
                    margin-bottom: 1.5rem;
                }

                .md\:min-h-screen {
                    min-height: 100vh;
                }

                .md\:pb-0 {
                    padding-bottom: 0;
                }

                .md\:text-3xl {
                    font-size: 1.875rem;
                }

                .md\:text-15xl {
                    font-size: 9rem;
                }

                .md\:w-1\/2 {
                    width: 50%;
                }
            }

            @media (min-width: 992px) {
                .lg\:bg-center {
                    background-position: center;
                }
            }
        </style>
    </head>
    <body class="antialiased font-sans">
        <div class="md:flex min-h-screen">
            <div class="w-full md:w-1/2 bg-white flex items-center justify-center">
                <div class="max-w-sm m-8">
                    <div class="text-purple text-5xl md:text-15xl font-black">
                        @yield('code', __('Oh no'))
                    </div>

                    <div class="w-16 h-1 bg-purple-light my-3 md:my-6"></div>

                    <p class="text-grey-darker text-2xl md:text-3xl font-light mb-8 leading-normal">
                        @yield('message')
                    </p>

                    <a href="javascript:history.go(-1)">
                        <button class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
                            {{ __('Go Back') }}
                        </button>
                    </a>
                </div>
            </div>

            <div class="relative pb-full md:flex md:pb-0 md:min-h-screen w-full md:w-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1080 1080"><defs><style>.cls-1,.cls-4,.cls-6{fill:#e1ecff;}.cls-2{isolation:isolate;}.cls-3{fill:#c7dcf9;}.cls-11,.cls-14,.cls-4,.cls-6{mix-blend-mode:multiply;}.cls-5{clip-path:url(#clip-path);}.cls-6{opacity:0.51;}.cls-7{fill:#1c3177;}.cls-11,.cls-8{fill:#ff97c9;}.cls-9{fill:#fec272;}.cls-10{fill:#fff;opacity:0.48;mix-blend-mode:soft-light;}.cls-11{opacity:0.5;}.cls-12,.cls-13,.cls-14{fill:#99adf9;}.cls-13{opacity:0.44;}.cls-14{opacity:0.64;}</style><clipPath id="clip-path"><path class="cls-1" d="M555.73,633.88s69.93.45,89.58,5.47,71.66,122.73,93.18,134S778.29,765.9,802,752s45.44-30.72,46.12-37.74-9.39-35.07-18.1-40.73-34-6.06-47.49,2.58c-19.82-54-48-132.75-73.84-143.59s-104.15-16-104.15-16Z"/></clipPath></defs><g class="cls-2"><g id="Layer_3" data-name="Layer 3"><path class="cls-3" d="M289.08,381.9s-34,13.45-39,46.12,72.26,128.37,72.26,128.37L560.6,428,485.27,295.8Z"/><path class="cls-1" d="M341.76,412.78S316.69,438.52,309,467s-8.68,79.34-7.4,98.39C339,600,486.83,571,486.83,571L629.29,403.42S605.14,357.57,592.88,345s-52-28.2-97.85-9.75C468.12,373.44,341.76,412.78,341.76,412.78Z"/><path class="cls-4" d="M330.57,426.09s55.31,17.75,117.57-6.3S521.68,328,521.68,328L495,335.26,341.76,412.78Z"/><path class="cls-1" d="M555.73,633.88s69.93.45,89.58,5.47,71.66,122.73,93.18,134S778.29,765.9,802,752s45.44-30.72,46.12-37.74-9.39-35.07-18.1-40.73-34-6.06-47.49,2.58c-19.82-54-48-132.75-73.84-143.59s-104.15-16-104.15-16Z"/><g class="cls-5"><path class="cls-6" d="M629.29,582.34s56.94,6.23,72.67,27.42,46.9,150.85,81.79,153.92c.56,42-71.7,57.17-71.7,57.17L538.84,628.39Z"/></g><path class="cls-1" d="M367.85,623.26s43,90.19,82,114.79S559.51,760.66,579,776.77s15.37,93.5,34.85,114,46.89,33.06,72.51,30.75,46.12-14.6,46.38-26.13-.77-21.53-12.81-27.68-29-11.27-29.73-18.44-14.35-116.33-20-146-49.53-70.94-106.08-91.73c-53.55-44.84-135.8-25.63-135.8-25.63Z"/><path class="cls-4" d="M380.36,647.39s49.35,2.52,93.67-16.95c-8.47-45.1-34.6-58.42-34.6-58.42l-71.58,51.24Z"/><path class="cls-1" d="M448.65,176.4C410,155.71,329,148.73,279,210.74S253.92,337.06,274.93,367c22,31.42,97.62,79.44,178.33,34.34S542.43,226.62,448.65,176.4Z"/><path class="cls-7" d="M442,214.32c34.33,8.2,56.63,56.37,45.1,102.49s-51.25,77.13-95.83,77.38S302.36,364,302.6,307.08C302.84,252.38,367.45,196.52,442,214.32Z"/><path class="cls-4" d="M343.09,574.58c44.73-20.76,11.27-68.16,55.86-78.94C457.74,504,474,501,474,501S361.53,599.78,343.09,574.58Z"/><polygon class="cls-8" points="380.36 447.8 454.8 639.35 560.11 636.84 656.45 575.86 685.15 488.74 615.46 279.66 581.63 377.54 494 447.23 380.36 447.8"/><path class="cls-1" d="M343.09,574.58c24.68-2,37.25-18.07,44.73-25.2,3.81-3.64,3.05-6.83,1.13-17.33s4.74-21.27,13.84-25.88c5,13.45,11.14,16,15.88,15.37s9.61-28.95,25.11-28.7,27.93,20.76,30,31-7.94,39.45-20.5,59.95S423,629.67,383.11,637.61s-62.57-12.43-75.64-38.18c-4.41-8.69-6-20.7-5.86-34.08C301.61,565.35,310.54,577.14,343.09,574.58Z"/><path class="cls-1" d="M639.46,351.67s4.75,15.45,1.55,21.47-7.56,11-10.76,18.71,1.54,36.77,15.63,41.76,25.75-8.07,29.47-15.63,1.66-27.41-3.85-41.25S655.63,350.59,639.46,351.67Z"/><path class="cls-9" d="M655.66,159.71l3.16,6.4a2.65,2.65,0,0,0,2,1.46l7.07,1a2.67,2.67,0,0,1,1.48,4.56l-5.11,5a2.66,2.66,0,0,0-.77,2.36l1.2,7a2.67,2.67,0,0,1-3.87,2.82l-6.33-3.32a2.65,2.65,0,0,0-2.48,0l-6.33,3.32a2.67,2.67,0,0,1-3.88-2.82l1.21-7a2.66,2.66,0,0,0-.77-2.36l-5.11-5a2.67,2.67,0,0,1,1.48-4.56l7.07-1a2.65,2.65,0,0,0,2-1.46l3.16-6.4A2.68,2.68,0,0,1,655.66,159.71Z"/><path class="cls-9" d="M317.34,837l2.65,5.37a2.2,2.2,0,0,0,1.68,1.22l5.93.86a2.24,2.24,0,0,1,1.24,3.82l-4.29,4.18a2.22,2.22,0,0,0-.64,2l1,5.9a2.25,2.25,0,0,1-3.25,2.37l-5.3-2.79a2.25,2.25,0,0,0-2.08,0L309,862.7a2.24,2.24,0,0,1-3.25-2.37l1-5.9a2.26,2.26,0,0,0-.65-2l-4.28-4.18a2.24,2.24,0,0,1,1.24-3.82l5.92-.86a2.23,2.23,0,0,0,1.69-1.22l2.65-5.37A2.24,2.24,0,0,1,317.34,837Z"/><ellipse class="cls-10" cx="408.56" cy="256.06" rx="45.63" ry="16.14" transform="translate(-45.54 93.94) rotate(-12.43)"/><path class="cls-4" d="M468.08,552.56s-28.31-25.3-33.44-25.3-18.79,20-15.71,25.3,18.9,22.66,36.27,28C460.83,569.82,468.08,552.56,468.08,552.56Z"/><polygon class="cls-11" points="494 447.23 560.11 636.84 656.45 575.86 581.63 377.54 494 447.23"/><path class="cls-4" d="M675.87,739.49a123,123,0,0,1-33,19.57c-11.21,4.32-15,13.16-11.61,29.38s5.29,41.51,12.29,48.17,31.08,3.12,43.56-12.36C683.2,793.75,675.87,739.49,675.87,739.49Z"/><path class="cls-4" d="M741.12,574.12s-14,6.1-12.67,15.83,15.63,56.76,21.27,61,22.33-3.28,22.33-3.28C754.91,599.11,741.12,574.12,741.12,574.12Z"/><path class="cls-12" d="M150.32,686.66c-11.13-23.08,25.14-47.78,56-46s43.83,30.27,54.76,40.9c22.83,22.18,22.11,43.88,6.3,53.21S165.05,717.19,150.32,686.66Z"/><path class="cls-12" d="M772.88,329.11c-9-7.88.26-44.92,21.52-53.59s47.66.81,53.3,15.67S791.33,345.25,772.88,329.11Z"/><path class="cls-12" d="M877.06,348.93c-4.61,6.57-7.68,25.28,2.05,28.61s17.09-15.92,13.67-25.94S880.14,344.54,877.06,348.93Z"/><path class="cls-13" d="M884.06,197.1c-7.26,3.42-19.23,18.12-12.43,25.85s22.73-5.33,24.74-15.72S888.91,194.82,884.06,197.1Z"/><path class="cls-13" d="M201.38,783.77c-6.28-5-24.75-9.25-28.69.26s14.82,18,25,15.26S205.56,787.11,201.38,783.77Z"/><path class="cls-14" d="M255.61,675.23c-11.17,2.1-9.37,12.09-5.79,21.14S266,708,274.89,699.73C269.12,686,255.61,675.23,255.61,675.23Z"/><path class="cls-14" d="M191.4,660.16c-8,.89-14.52,12.47-8.88,21.86s16.39,16.23,22.54,13.67,7.18-16.4,2.74-25.28S199.09,659.3,191.4,660.16Z"/><path class="cls-14" d="M822.74,283.5c-4.39,1.4-8.84,6.15-8.45,11.28s4.87,9.61,9.73,9,9-8.46,8-14.1S826.09,282.44,822.74,283.5Z"/><path class="cls-14" d="M776.25,293.5s6,6,5,12.81-11.34,6.18-11.34,6.18S771.45,300.88,776.25,293.5Z"/></g></g></svg>
            </div>
        </div>
    </body>
</html>
