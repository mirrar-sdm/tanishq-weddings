<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Multi-Step Jewellery Showcase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css">
<script>
    !function(t,e){var o,n,p,r;e.__SV||(window.posthog=e,e._i=[],e.init=function(i,s,a){function g(t,e){var o=e.split(".");2==o.length&&(t=t[o[0]],e=o[1]),t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}}(p=t.createElement("script")).type="text/javascript",p.crossOrigin="anonymous",p.async=!0,p.src=s.api_host.replace(".i.posthog.com","-assets.i.posthog.com")+"/static/array.js",(r=t.getElementsByTagName("script")[0]).parentNode.insertBefore(p,r);var u=e;for(void 0!==a?u=e[a]=[]:a="posthog",u.people=u.people||[],u.toString=function(t){var e="posthog";return"posthog"!==a&&(e+="."+a),t||(e+=" (stub)"),e},u.people.toString=function(){return u.toString(1)+".people (stub)"},o="init Ce js Ls Te Fs Ds capture Ye calculateEventProperties Us register register_once register_for_session unregister unregister_for_session Ws getFeatureFlag getFeatureFlagPayload isFeatureEnabled reloadFeatureFlags updateEarlyAccessFeatureEnrollment getEarlyAccessFeatures on onFeatureFlags onSurveysLoaded onSessionId getSurveys getActiveMatchingSurveys renderSurvey canRenderSurvey canRenderSurveyAsync identify setPersonProperties group resetGroups setPersonPropertiesForFlags resetPersonPropertiesForFlags setGroupPropertiesForFlags resetGroupPropertiesForFlags reset get_distinct_id getGroups get_session_id get_session_replay_url alias set_config startSessionRecording stopSessionRecording sessionRecordingStarted captureException loadToolbar get_property getSessionProperty Bs zs createPersonProfile Hs Ms Gs opt_in_capturing opt_out_capturing has_opted_in_capturing has_opted_out_capturing get_explicit_consent_status is_capturing clear_opt_in_out_capturing Ns debug L qs getPageViewId captureTraceFeedback captureTraceMetric".split(" "),n=0;n<o.length;n++)g(u,o[n]);e._i.push([i,s,a])},e.__SV=1)}(document,window.posthog||[]);
    posthog.init('phc_jMPiP1J7GdhVMTZdWB2B8Ob6u2n610C2MMIggSpKbw5', {
        api_host: 'https://us.i.posthog.com',
        defaults: '2025-05-24',
        person_profiles: 'identified_only', // or 'always' to create profiles for anonymous users as well
    })
</script>
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #fef9f7;

        }

        .step-container {
            display: none;
            transition: all 0.3s ease;
        }

        .step-container.active {
            display: flex;
        }

        .step-image {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .step-btns {
            margin-top: 2rem;
        }

        .outfit-btn {
           border: none;
  z-index: 9999;
  position: absolute;
  left: 0px;
  bottom: 0;
  width: 100%;
  border-radius: 0 0 16px 16px;
  padding: 10px;
  background: #300708cf;
  color: white;
}


        .highlight {
            font-weight: bold;
            color: #42210b;
        }

        .heading-large {
            font-size: 3rem;
            line-height: 1.2;
        }

        .caption {
            color: #42210b;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .brand {
            font-weight: bold;
            font-size: 16px;
        }

        #otp-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        #otp-modal .modal-content {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
        }






        /* Fullscreen background image */
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }

        /* Top logo overlay */
        .overlay-top {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            cursor: pointer;
        }

        .overlay-top img {
            max-width: 200px;
            filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.5));
        }

        /* Bottom overlay with luxurious styling */
        .overlay-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(20, 0, 0, 0.8);
            /* rich maroon-black translucent */
            color: #fff;
            z-index: 2;
            padding: 25px 20px;
            text-align: center;
            border-top: 1px solid rgba(255, 215, 0, 0.3);
            /* subtle gold line */
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.5);
        }

        .form-section {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            align-items: center;
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            /* font-size: 14px;
      font-weight: bold;
      color: #f5e6c4; warm gold */
        }

        select {
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid #d4af37;
            /* gold border */
            font-size: 14px;
            min-width: 180px;
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            font-family: "Arial", sans-serif;
        }



        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-section {
                flex-direction: column;
                gap: 12px;
            }

            select,
            button {
                min-width: 100%;
            }
        }


        .jewelry-section {
            position: relative;
            overflow: hidden;
            /* padding: 4rem 0; */
        }

        .section-title {
            font-size: 3rem;
            font-weight: 300;
            color: #fff;
            text-align: center;
            margin-bottom: 3rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .dynamic-text {
            background: linear-gradient(45deg, #ff6b6b, #ffd93d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 600;
        }

        /* Swiper Container */
        .jewelry-swiper {
            width: 100%;
            height: 500px;
            padding: 2rem 0;
            overflow: visible;
        }



        /* Slide Card */
        .jewelry-card {
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid #8a2323;
            border-radius: 24px;
            padding: 0;
            overflow: hidden;
            /* height: 380px; */
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            /* box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), 0 2px 16px rgba(0, 0, 0, 0.08); */
        }

        .jewelry-card:hover {
            transform: scale(1.02);
            /* box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2), 0 8px 32px rgba(0, 0, 0, 0.12); */
        }

        .jewelry-card.active {
            /* background: rgba(255, 255, 255, 0.2); */
            border: 3px solid #8a2323;
            transform: scale(1.02);
        }

        .card-image {
            width: 100%;
            /* height: 280px; */
            height:400px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .jewelry-card:hover .card-image {
            transform: scale(1.1);
        }

        .card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: 3rem 1.5rem 1.5rem;
            color: white;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }

        .card-subtitle {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 1rem;
        }

        /* Swiper Navigation */
        .swiper-button-next,
        .swiper-button-prev {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 20px;
            font-weight: bold;
        }

        /* Swiper Pagination */
        .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background: rgba(255, 255, 255, 0.3);
            opacity: 1;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            background: #ff6b6b;
            transform: scale(1.3);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .section-title {
                font-size: 2.5rem;
            }

            .jewelry-card {
                /* height: 380px; */
            }
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }

            .jewelry-card {
                /* height: 360px; */
            }

            .card-image {
                /* height: 240px; */
            }
        }

        @media (max-width: 576px) {
            .section-title {
                font-size: 1.8rem;
                margin-bottom: 2rem;
            }

            .jewelry-card {
                height: 340px;
            }

            .card-image {

                height: 100%;
                object-fit: cover;

            }

            .jewelry-section {


                /* padding: 2rem 0; */
            }
        }

        /* Floating Animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        /* Shimmer Effect */
        .shimmer::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .jewelry-card:hover .shimmer::before {
            left: 100%;
        }


        /* Updated jewellery positioning styles - matching edit mode */
        #jewellery-container {
            position: relative;
            display: inline-block;
            width: 100%;
            margin: 0 auto;
        }

        #jewellery-container .outfit-img {
            display: block;
            width: 100%;
            height: auto;
            position: relative;
        }

        /* SVG for connecting lines */
        .connecting-lines-svg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 5;
        }

        .connecting-line {
            stroke: rgba(138, 35, 35, 0.6);
            stroke-width: 2;
            fill: none;
            /* Make the connecting line solid for selected items */
            stroke-dasharray: none;
        }

        /* Jewellery Position Dots - Fixed positions */
        .jewellery-position {
            position: absolute;
            width: 8px;
            height: 8px;
            background: rgba(138, 35, 35, 0.3);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 8px rgba(138, 35, 35, 0.4);
            z-index: 15;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        /* Static Labels (non-draggable) */
        .jewellery-label {
            position: absolute;
            z-index: 10;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 6px;
            padding: 4px 8px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            white-space: nowrap;
            user-select: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .jewellery-label:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.35);
        }

        /* Selected state styling */
        .jewellery-label.selected {
            background: rgba(138, 35, 35, 0.8);
            border: 2px solid #8a2323;
            color: white;
            transform: scale(1.02);
        }

        .jewellery-label.selected:hover {
            background: rgba(138, 35, 35, 0.9);
        }

        .jewellery-label input[type="checkbox"] {
            margin: 0 5px 0 0;
            width: 14px;
            height: 14px;
            accent-color: #8a2323;
        }

        .jewellery-label label {
            margin: 0;
            font-size: 0.85rem;
            font-weight: 500;
            color: inherit;
            cursor: pointer;
        }

        /* Selection counter styling */
        .selection-counter {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
        }

        /* Button disabled state */
        .btn-custom:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-custom.opacity-50 {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>




</head>

<body>

    <div class="container step-1-desktop-view px-0">

        <!-- STEP 1 -->
        <div class="step-container active  mx-auto" id="step1-desktop" style="height: 100vh;">
            <div class="row align-items-center my-4 mx-auto container">
                <div
                    class="col-12 col-xl-10 card px-0 shadow-lg mx-auto rounded-4 overflow-hidden h-100 position-relative">
                    <div class="row g-0 h-100">
                        <!-- LEFT: Step Section -->
                        <div id="step-section-container" class="col-lg-6 p-0 banner-height">
                            <div class="d-flex flex-column justify-content-between bg-custom-light p-4 p-md-5 h-100">
                                <div class="text-custom-dark">
                                    <div class="mb-5">
                                        <div class="d-flex flex-column align-items-start">
                                            <a class="mx-auto" href="/" onclick="posthog.capture('logo-clicked')">
                                                <img src="{{ asset('image/logo.png') }}"
                                                    class="form-logo-img logo-overlay" alt="Tanishq Logo">
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Step 1 Form random changes, change again-->
                                    <form id="step1-form" class="mt-5">
                                        <div class="d-flex form-content mb-5 align-items-baseline">
                                            <span class="mb-0 text-nowrap form-text">I Am A</span>
                                            <select class="form-select border-bottom  py-0" required
                                                id="language-select" aria-label="Select community" onchange="posthog.capture('region', { region: this.options[this.selectedIndex].text })">
                                                <option selected>Tamil Bride</option>
                                                <option>Telugu Bride</option>
                                                <option>Gujarati Bride</option>
                                                <option>Bengali Bride</option>
                                                <option>Odia Bride</option>
                                                <option>Bihari Bride</option>
                                                <option>UP Bride</option>
                                                <option>Marwari Bride</option>
                                                <option>Punjabi Bride</option>
                                                <option>Marathi Bride</option>
                                                <option>Kannada Bride</option>
                                                <option>Jat Bride</option>
                                                <option>Rajput Bride</option>
                                                <option>Assamese Bride</option>
                                                <option>Manipuri Bride</option>
                                                <option>Malayalee Bride</option>
                                                <option>Kumaoni Bride</option>
                                                <option>Muslim Bride</option>
                                            </select>
                                        </div>

                                        <div class="d-flex align-items-baseline mb-5">
                                        <span class="mb-0 form-text">Planning for My</span>
                                            <select class="form-select border-bottom  me-3 py-0" required
                                                id="event-select" aria-label="Select occasion" onchange="posthog.capture('occasion', { occasion: this.options[this.selectedIndex].text })">
                                                <option selected>Mehendi</option>
                                                <option>Engagement</option>
                                                <option>Sangeet</option>
                                                <option>Haldi</option>
                                                <option>Cocktail</option>
                                                <option>Reception</option>
                                                <option>Wedding</option>
                                            </select>
                                        </div>

                                        <div class="mx-auto d-flex justify-content-center justify-content-lg-start">
                                            <button type="submit" class="btn rounded-5 mx-auto btn-custom" onclick="posthog.capture('choose-my-look')">Let’s Find My Perfect Look!</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="mt-4 text-center pt-4 fs-6 text-custom-dark opacity-75 fw-200">
                                    &copy; Powered by <a href="https://www.mirrar.com/" class="base-color">mirrAR</a>
                                </div>
                            </div>
                        </div>

                        <!-- RIGHT: Image -->
                        <div class="col-lg-6 col-12 p-0 banner-height">
                            <img src="https://storage.googleapis.com/msgsndr/0pbzpC0j1SUC7nWRJx4Y/media/68ac1cac6979a0a583db004c.jpeg"
                                alt="Wedding jewelry on hands" class="img-fluid w-100 h-100 object-fit-cover hero-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container step-1-tablet-view px-0">
        <!-- Background Image -->
        <div class="step-container  active mx-auto" id="step1-tablet" style="height: 100vh;">
            <img src="https://storage.googleapis.com/msgsndr/0pbzpC0j1SUC7nWRJx4Y/media/68ac1cac6979a0a583db004c.jpeg"
                alt="Wedding" class="background-image">

            <!-- Top Logo Overlay -->
            <div class="overlay-top" onclick="posthog.capture('logo-clicked')">
                <img src="https://test.webshotglobal.com/image/logo.png" alt="Tanishq Logo">
            </div>

            <!-- Bottom Form Overlay -->
            <div class="overlay-bottom">
                <form id="step1-tablet-form" autocomplete="off">
                    <div class="form-section d-flex flex-row align-items-center justify-content-between"
                        style="gap: 1.5rem;">
                        <div class="d-flex flex-row align-items-center g-2rem w-100">
                            <div class="d-flex flex-column flex-grow-1">
                                <label for="dream-select-tablet" class="fw-semibold mb-1 text-start">I am A:</label>
                                <select id="dream-select-tablet" class="form-select" onchange="posthog.capture('region', { region: this.options[this.selectedIndex].text })">
                                    <option selected>Tamil Bride</option>
                                    <option>Telugu Bride</option>
                                    <option>Gujarati Bride</option>
                                    <option>Bengali Bride</option>
                                    <option>Odia Bride</option>
                                    <option>Bihari Bride</option>
                                    <option>UP Bride</option>
                                    <option>Marwari Bride</option>
                                    <option>Punjabi Bride</option>
                                    <option>Marathi Bride</option>
                                    <option>Kannada Bride</option>
                                    <option>Jat Bride</option>
                                    <option>Rajput Bride</option>
                                    <option>Assamese Bride</option>
                                    <option>Manipuri Bride</option>
                                    <option>Malayalee Bride</option>
                                    <option>Kumaoni Bride</option>
                                    <option>Muslim Bride</option>
                                </select>
                            </div>
                            <div class="d-flex flex-column flex-grow-1">
                                <label for="occasion-select-tablet"
                                    class="fw-semibold mb-1 text-start">Occasion:</label>
                                <select id="occasion-select-tablet" class="form-select" onchange="posthog.capture('occasion', { occasion: this.options[this.selectedIndex].text })">
                                    <option selected>Mehendi</option>
                                    <option>Engagement</option>
                                    <option>Sangeet</option>
                                    <option>Haldi</option>
                                    <option>Cocktail</option>
                                    <option>Reception</option>
                                    <option>Wedding</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 py-2 w-100" style="white-space:nowrap;" onclick="posthog.capture('choose-my-look')">Let’s Find My Perfect Look!</button>
                    </div>
                    <input type="hidden" id="hidden-language-tablet" name="language" value="Tamil Bride">
                    <input type="hidden" id="hidden-event-tablet" name="event" value="Mehendi">
                </form>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <!-- STEP 2 -->
        <div id="step2" class="step-container overflow-hidden" style="min-height: 100vh; width: 100%;">
            <div class="row align-items-center jewelry-section">
                <div class="col-12 col-xl-12 card py-4 px-4 border-0 bg-transparent mx-auto rounded-4 overflow-hidden">
                    <div class="text-center mb-4 d-flex align-items-center justify-content-center" style="gap: 1rem;">
                        <button type="button" class="btn btn-link p-0 me-3 d-flex align-items-center"
                            onclick="prevStep(1)" style="position: absolute; left: 2rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#300708"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z" />
                            </svg>
                            <span class="visually-hidden">Back</span>
                        </button>
                        <a href="/"><img src="{{ asset('image/logo.png') }}"class="form-logo-img mb-2"
                                alt="Tanishq Logo"></a>
                    </div>
                           <div class="parallax-bg" data-swiper-parallax="-23%"></div>
                    <div class="row text-center outfit-selection-row mt-4 px-2">
                         <div class="mb-4">
                             <h1 class="fw-normal fs-1 base-color mb-3 light-font">
                                 Jewellery for the <span id="dynamic-language">Tamil</span> <span id="dynamic-event">Mehendi</span>: Elevate Your Big Day Look
                             </h1>
                             <p class="fw-normal fs-5 text-dark-gray mb-0">
                                 Choose your perfect attire - saree, lehenga, or gown and pair it with jewellery that reflects your unique style.
                             </p>
                         </div>

                           <!-- Scrollable Row -->
                        <div class="swiper jewelry-swiper">
                            <div class="swiper-wrapper">
                                 <!-- Slide 1 - Gown -->
                                <div class="swiper-slide" onclick="posthog.capture('model-1', { page: 'form'})">
                                    <div class="jewelry-card shimmer active" data-outfit="gown">
                                        <img src="{{ asset('image/gown.jpeg') }}" class="card-image" alt="Gown">
                                       <button type="button" class="outfit-btn">Gown</button>
                                    </div>
                                </div>
                                <!-- Slide 2 - Lehanga (Active) -->
                                <div class="swiper-slide" onclick="posthog.capture('model-2', { page: 'form'})">
                                    <div class="jewelry-card  shimmer " data-outfit="lehanga">

                                        <img src="{{ asset('image/lahnga.jpeg') }}" class="card-image"
                                            alt="Lehanga">
                                            <button type="button" class="outfit-btn">Lehanga</button>

                                    </div>
                                </div>
                                <!-- Slide 3 - Saree -->
                                <div class="swiper-slide" onclick="posthog.capture('model-3', { page: 'form'})">
                                    <div class="jewelry-card shimmer" data-outfit="saree">

                                        <img src="{{ asset('image/saree.jpeg') }}" class="card-image" alt="Saree">
                                        <button type="button" class="outfit-btn">Saree</button>
                                    </div>
                                </div>
                                <!-- Slide 4 - Anarkali -->
                                <div class="swiper-slide" onclick="posthog.capture('model-4', { page: 'form'})">
                                    <div class="jewelry-card shimmer" data-outfit="anarkali">

                                        <img src="{{ asset('image/anarkali.jpeg') }}" class="card-image"
                                            alt="Anarkali">
                                            <button type="button" class="outfit-btn">Anarkali</button>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div id="outfit-details-container" class="">

                        <div id="outfit-details" class="detail-section active">
                            <h3 id="outfit-title" class="text-center fw-semibold mt-4">Gown Checklist</h3>
                            <p class="text-center light-weight text-dark-gray mb-1 text-muted">Click on the jewellery you want to explore</p>
                            <!-- Add selection counter -->
                            <p class="text-center mb-3">
                                <small id="selection-count" class="text-muted selection-counter">0 item(s) selected</small>
                            </p>
                            <div class="animated-image-container position-relative telugu-saree" id="jewellery-container">
                                <img src="{{ asset('image/bystate/telugu-saree.png') }}" class="img-fluid outfit-img"
                                    alt="Outfit Model">

                                <!-- SVG for connecting lines -->
                                <svg class="connecting-lines-svg" id="connecting-lines">
                                    <!-- Lines will be drawn here -->
                                </svg>

                                <!-- Jewellery Position Dots -->
                                <div class="jewellery-position" data-type="forehead-pendant"></div>
                                <div class="jewellery-position" data-type="hair-jewellery"></div>
                                <div class="jewellery-position" data-type="earrings-stud"></div>
                                <div class="jewellery-position" data-type="earrings-drops"></div>
                                <div class="jewellery-position" data-type="ear-loops"></div>
                                <div class="jewellery-position" data-type="nose-pin"></div>
                                <div class="jewellery-position" data-type="choker-necklace"></div>
                                <div class="jewellery-position" data-type="short-necklace"></div>
                                <div class="jewellery-position" data-type="long-necklace"></div>
                                <div class="jewellery-position" data-type="multiple-bangles"></div>
                                <div class="jewellery-position" data-type="bracelet"></div>
                                <div class="jewellery-position" data-type="single-bangle"></div>
                                <div class="jewellery-position" data-type="rings"></div>
                                <div class="jewellery-position" data-type="waist-belt"></div>
                                <div class="jewellery-position" data-type="anklet"></div>
                                <div class="jewellery-position" data-type="toe-ring"></div>

                                <!-- Static Labels (non-draggable) -->
                                <div class="jewellery-label" data-type="forehead-pendant">
                                    <input type="checkbox" id="forehead-pendant" class="jewellery-checkbox" value="forehead-pendant">
                                    <label for="forehead-pendant">Forehead Pendant</label>
                                </div>

                                <div class="jewellery-label" data-type="hair-jewellery">
                                    <input type="checkbox" id="hair-jewellery" class="jewellery-checkbox" value="hair-jewellery">
                                    <label for="hair-jewellery">Hair Jewellery</label>
                                </div>

                                <div class="jewellery-label" data-type="earrings-stud">
                                    <input type="checkbox" id="earrings-stud" class="jewellery-checkbox" value="earrings-stud">
                                    <label for="earrings-stud">Earrings - Stud</label>
                                </div>

                                <div class="jewellery-label" data-type="earrings-drops">
                                    <input type="checkbox" id="earrings-drops" class="jewellery-checkbox" value="earrings-drops">
                                    <label for="earrings-drops">Earrings - Drops</label>
                                </div>

                                <div class="jewellery-label" data-type="ear-loops">
                                    <input type="checkbox" id="ear-loops" class="jewellery-checkbox" value="ear-loops">
                                    <label for="ear-loops">Ear Loops</label>
                                </div>

                                <div class="jewellery-label" data-type="nose-pin">
                                    <input type="checkbox" id="nose-pin" class="jewellery-checkbox" value="nose-pin">
                                    <label for="nose-pin">Nose Pin</label>
                                </div>

                                <div class="jewellery-label" data-type="choker-necklace">
                                    <input type="checkbox" id="choker-necklace" class="jewellery-checkbox" value="choker-necklace">
                                    <label for="choker-necklace">Choker Necklace</label>
                                </div>

                                <div class="jewellery-label" data-type="short-necklace">
                                    <input type="checkbox" id="short-necklace" class="jewellery-checkbox" value="short-necklace">
                                    <label for="short-necklace">Short Necklace</label>
                                </div>

                                <div class="jewellery-label" data-type="long-necklace">
                                    <input type="checkbox" id="long-necklace" class="jewellery-checkbox" value="long-necklace">
                                    <label for="long-necklace">Long Necklace</label>
                                </div>

                                <div class="jewellery-label" data-type="multiple-bangles">
                                    <input type="checkbox" id="multiple-bangles" class="jewellery-checkbox" value="multiple-bangles">
                                    <label for="multiple-bangles">Multiple Bangles</label>
                                </div>

                                <div class="jewellery-label" data-type="bracelet">
                                    <input type="checkbox" id="bracelet" class="jewellery-checkbox" value="bracelet">
                                    <label for="bracelet">Bracelet</label>
                                </div>

                                <div class="jewellery-label" data-type="single-bangle">
                                    <input type="checkbox" id="single-bangle" class="jewellery-checkbox" value="single-bangle">
                                    <label for="single-bangle">Single Bangle</label>
                                </div>

                                <div class="jewellery-label" data-type="rings">
                                    <input type="checkbox" id="rings" class="jewellery-checkbox" value="rings">
                                    <label for="rings">Rings</label>
                                </div>

                                <div class="jewellery-label" data-type="waist-belt">
                                    <input type="checkbox" id="waist-belt" class="jewellery-checkbox" value="waist-belt">
                                    <label for="waist-belt">Waist Belt</label>
                                </div>

                                <div class="jewellery-label" data-type="anklet">
                                    <input type="checkbox" id="anklet" class="jewellery-checkbox" value="anklet">
                                    <label for="anklet">Anklet</label>
                                </div>

                                <div class="jewellery-label" data-type="toe-ring">
                                    <input type="checkbox" id="toe-ring" class="jewellery-checkbox" value="toe-ring">
                                    <label for="toe-ring">Toe Ring</label>
                                </div>
                            </div>
                        </div>

                     </div>

                <div class=" col-12 col-xl-10 d-flex px-4 mx-auto justify-content-center my-4">

                    <button type="button" onclick="nextStep(3); posthog.capture('choose-create-list', { page: 'form' })" class="btn border-2 rounded-5 btn-custom">Choose
                        Create List</button>

                    {{-- <button class="btn btn-primary" onclick="nextStep(3)">Create List</button> --}}
                </div>
                <div class="mt-4 text-center pt-4 fs-6 text-custom-dark opacity-75">
                    &copy; Powered by <a href="https://www.mirrar.com/" class="base-color"> mirrAR</a>
                </div>
                </div>
              </div>
    </div>
    </div>
    </div>

            </div>
        </div>
    </div>

    <!-- STEP 3 -->
    <div class="step-container container overflow-hidden" id="step3">
        <div class="row align-items-center container px-0 mx-auto">
            <div
                class="col-12 col-xl-10 py-4 text-center mx-auto d-flex align-items-center justify-content-center justify-normal position-relative">
                <!-- Back Button -->
                <button type="button" class="btn btn-link p-0 me-3 d-flex align-items-center position-absolute"
                    onclick="prevStep(2)" style="left: 2rem; top: 50%; transform: translateY(-50%);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#300708"
                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z" />
                    </svg>
                    <span class="visually-hidden">Back</span>
                </button>
                <a href="/"><img src="{{ asset('image/logo.png') }}"class="form-logo-img" class="mb-2"
                        alt="Tanishq Logo"></a>
            </div>
            <div class="col-12 col-xl-10 card py-5 px-4 shadow-lg mx-auto rounded-4 justify-content-center mb-5 ">
                <div class="px-md-5">
                    <h4 class="text-custom-dark mb-4 fw-normal">Share My Jewellery Checklist To:</h4>
                    <form id="step3-form" method="POST" action="{{ route('productChoose') }}" onsubmit="handleStep3FormSubmit(event)">
                        @csrf
                        <input type="hidden" name="language" id="hidden-language">
                        <input type="hidden" name="event" id="hidden-event">
                        <input type="hidden" name="outfit" id="hidden-outfit">
                        <input type="hidden" name="jewellery_pieces" id="hidden-jewellery-pieces">
                        <input type="hidden" name="user_id" id="hidden-user-id">
                        <input type="hidden" name="id_token" id="hidden-id-token">
                        <input type="hidden" name="refresh_token" id="hidden-refresh-token">
                        <input type="hidden" name="phone" id="hidden-phone">
                        <input type="hidden" name="submit_type" id="hidden-submit-type">
                        <div id="step3-form-errors" style="color:#d00; font-size:15px; margin-bottom:10px;"></div>
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-normal">Name *</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="full name" required>
                                <div id="name-error" style="color:#d00;font-size:13px;"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="contactNumber" class="form-label fw-normal">Contact Number *</label>
                                <input type="tel" class="form-control" id="contactNumber" name="contactNumber"
                                    placeholder="phone number" required>
                                <div id="phone-error" style="color:#d00;font-size:13px;"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-normal"> E-mail ID *</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="you@example.com" required>
                                <div id="email-error" style="color:#d00;font-size:13px;"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="weddingDate" class="form-label fw-normal">Choose your wedding date
                                    *</label>
                                <input type="date" class="form-control" id="weddingDate" name="weddingDate"
                                    placeholder="mm/dd/yyyy" required>
                                <div id="date-error" style="color:#d00;font-size:13px;"></div>

                            </div>
                        </div>
                        <div class="form-check mb-4 d-flex justify-content-center px-0 ">
                            <input class="form-check-input " style="margin-right:5px" type="checkbox" value="1"
                                id="receiveCall" name="receiveCall">
                            <label class="form-check-label" for="receiveCall">
                                Receive call from store for follow-up.
                            </label>
                        </div>
                        <div class="form-check d-flex justify-content-center px-0">

                            <div class="">
                                <button type="submit" name="recommended_products"
                                    class="btn border-2 rounded-5 btn-custom mb-2">Recommended Products</button>
                                <button type="submit" name="full_catalogue"
                                    class="btn border-2 rounded-5 btn-custom mb-2">Explore Catalogue</button>
                            </div>
                        </div>
                    </form>
                    <script>
                        function handleStep3FormSubmit(event) {
                            var form = document.getElementById('step3-form');
                            // Only collect the required fields for posthog
                            var data = {
                                name: form.name.value || "",
                                number: form.contactNumber.value || "",
                                email: form.email.value || "",
                                "wedding-date": form.weddingDate.value || "",
                                "receive-call": form.receiveCall.checked ? "1" : "0"
                            };

                            // Determine which submit button was used
                            var submitter = event.submitter || document.activeElement;
                            var eventName = null;
                            if (submitter && submitter.name === "recommended_products") {
                                eventName = "recommended-products";
                            } else if (submitter && submitter.name === "full_catalogue") {
                                eventName = "full-catalogue";
                            }

                            if (eventName && typeof posthog !== 'undefined' && posthog.capture) {
                                posthog.capture(eventName, data);
                            }
                            // Allow the form to submit as normal
                        }
                    </script>
                </div>
                <div class=" text-center text-muted note-disclaimer small mt-4 px-md-5">
                    <p class="fw-bold text-dark mb-2 text-start">Note</p>
                    <p class="text-start b">Please be advised that this checklist does not obligate you to make
                        purchases from Tanishq.
                        Information will only be saved in our store’s system for quick review when you revisit, until
                        your date of wedding</p>
                </div>
                <div class="mt-4 text-center pt-4 fs-6 text-custom-dark opacity-75">
                    &copy; Powered by <a href="https://www.mirrar.com/" class="base-color">mirrAR</a>
                </div>
            </div>
        </div>

        <!-- OTP Modal -->
        <div id="otp-modal">
            <div class="otp-modal-content" style="position:relative;">
                <button id="otp-modal-close" class="d-flex justify-content-end" type="button"
                    style="position:absolute;top:12px;right:16px;background:none;border:none;font-size:28px;line-height:1;z-index:10;cursor:pointer;"
                    aria-label="Close OTP Modal" onclick="posthog.capture('otp-closed')">&times;</button>

                <div class="otp-right">
                    <h4 class="otp-heading">Verify with OTP</h4>
                    <p class="otp-text">Sent to <span id="otp-phone-number">91 •••• ••••••</span></p>

                    <!-- OTP Input Boxes -->
                    <div class="otp-inputs">
                        <input type="text" maxlength="1" class="otp-box" data-index="1"
                            onkeyup="handleOTPInput(this)" onfocus="this.select()" inputmode="numeric"
                            pattern="[0-9]*">
                        <input type="text" maxlength="1" class="otp-box" data-index="2"
                            onkeyup="handleOTPInput(this)" onfocus="this.select()" inputmode="numeric"
                            pattern="[0-9]*">
                        <input type="text" maxlength="1" class="otp-box" data-index="3"
                            onkeyup="handleOTPInput(this)" onfocus="this.select()" inputmode="numeric"
                            pattern="[0-9]*">
                        <input type="text" maxlength="1" class="otp-box" data-index="4"
                            onkeyup="handleOTPInput(this)" onfocus="this.select()" inputmode="numeric"
                            pattern="[0-9]*">
                        <input type="text" maxlength="1" class="otp-box" data-index="5"
                            onkeyup="handleOTPInput(this)" onfocus="this.select()" inputmode="numeric"
                            pattern="[0-9]*">
                        <input type="text" maxlength="1" class="otp-box" data-index="6"
                            onkeyup="handleOTPInput(this)" onfocus="this.select()" inputmode="numeric"
                            pattern="[0-9]*">
                    </div>

                    <div id="otp-error" class="otp-error"></div>


                    <div class="otp-loading" style="display:none;">
                        <div class="otp-spinner"></div>
                        <span>Verifying OTP...</span>
                    </div>

                    <div class="otp-success" style="display:none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        Verified successfully!
                    </div>

                    <p class="otp-timer">Resend OTP in <span id="otp-timer">02:00</span></p>

                    <button id="verify-otp-btn" class="otp-btn" onclick="verifyOTP()" disabled>Verify OTP</button>

                    {{-- <p class="otp-terms">
                        By continuing, I agree to <a href="#">Terms of Use</a> & <a href="#">Privacy
                            Policy</a>
                    </p> --}}
                </div>
            </div>
        </div>
        <!-- reCAPTCHA container (hidden) -->
        <div id="recaptcha-container" class="d-none"></div>
    </div>
 @php

        @endphp

    <!-- Firebase SDKs -->
    <script src="https://www.gstatic.com/firebasejs/10.9.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.9.0/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.9.0/firebase-auth-compat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>

    <script>
        // Initialize Swiper with parallax and responsive breakpoints
        const swiper = new Swiper('.jewelry-swiper', {
            // Enable parallax
            parallax: true,
            speed: 1000,
            // Responsive breakpoints
            slidesPerView: 1.2,
            spaceBetween: 20,
            breakpoints: {
                // Mobile landscape and up
                576: {
                    slidesPerView: 1.5,
                    spaceBetween: 10
                },
                // Tablet and up
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 10
                },
                // Desktop small and up
                992: {
                     spaceBetween: 30,
                    slidesPerView: 3.5,
                    spaceBetween: 30
                },
                // Desktop large and up
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 30
                }
            },
            // Navigation arrows
            // Enable centered slides for better visual effect
            centeredSlides: false,
            // Smooth scrolling
            freeMode: false,
            // Auto height
            autoHeight: false,
            // Loop for infinite scrolling
            loop: false,
            // Advanced touch settings
            touchRatio: 1,
            touchAngle: 45,
            grabCursor: true,
            // Smooth transitions
            effect: 'slide',
            // Callback functions
            on: {
                slideChange: function() {
                    // Remove active class from all cards
                    document.querySelectorAll('.jewelry-card').forEach(card => {
                        card.classList.remove('active');
                    });
                },
                slideChangeTransitionEnd: function() {
                    // Add some custom animations or effects here if needed
                    // console.log('Slide transition completed');
                }
            }
        });

        // Function to generate label from image filename
        function generateLabelFromFilename(imageSrc) {
            // Extract filename from the full path
            const filename = imageSrc.split('/').pop().split('.')[0];

            // Extract the part after the dash if it exists
            let labelPart = filename;
            if (filename.includes('-')) {
                labelPart = filename.split('-').slice(1).join('-'); // Get everything after the first dash
            }

            // Handle special cases for proper spelling
            const labelMap = {
                'gown': 'Gown',
                'lehnga': 'Lehanga', // Fix spelling from lehnga to Lehanga
                'lahnga': 'Lehanga', // Fix spelling from lahnga to Lehanga
                'saree': 'Saree',
                'anarkali': 'Anarkali',
                'others': 'Choose Your Own Style' // Special case for "others"
            };

            // Return mapped label or capitalize first letter
            return labelMap[labelPart] || labelPart.charAt(0).toUpperCase() + labelPart.slice(1);
        }

        // Function to update button labels from image filenames
        function updateButtonLabelsFromImages() {
            document.querySelectorAll('.jewelry-card').forEach(card => {
                const img = card.querySelector('.card-image');
                const button = card.querySelector('.outfit-btn');

                if (img && button) {
                    const label = generateLabelFromFilename(img.src);
                    button.textContent = label;
                }
            });
        }

        // Add click event listeners to cards
        document.addEventListener('DOMContentLoaded', function() {
            // Update button labels from image filenames on page load
            updateButtonLabelsFromImages();
            document.querySelectorAll('.jewelry-card').forEach(card => {
                card.addEventListener('click', function() {
                    // Remove active class from all cards
                    document.querySelectorAll('.jewelry-card').forEach(c => c.classList.remove('active'));
                    // Add active class to clicked card
                    this.classList.add('active');
                    // Get outfit type
                    const outfitType = this.getAttribute('data-outfit');

                    // Update the main detail section
                    const outfitDetails = document.getElementById('outfit-details');
                    const outfitTitle = document.getElementById('outfit-title');
                    const outfitImg = document.querySelector('#outfit-details .outfit-img');

                    if (outfitDetails && outfitTitle && outfitImg && outfitType) {
                        // Get the outfit name from the button text for reliable title updates
                        const outfitButton = this.querySelector('.outfit-btn');
                        const outfitName = outfitButton ? outfitButton.textContent : outfitType.charAt(0).toUpperCase() + outfitType.slice(1);

                        // Update title immediately with the outfit name
                        outfitTitle.textContent = `${outfitName} Checklist`;

                        // Get current community from the language select
                        const languageSelect = document.getElementById('language-select');
                        const currentCommunity = languageSelect ? languageSelect.value : 'Tamil Bride';

                        // Get the community mapping
                        const mapping = communityModelMapping[currentCommunity];
                        if (mapping) {
                            // Find the slide data for this outfit type
                            let slideData = null;
                            Object.values(mapping).forEach(slide => {
                                if (slide.outfit === outfitType) {
                                    slideData = slide;
                                }
                            });

                            if (slideData) {
                                // Update image using the state-specific image
                                outfitImg.src = `{{ asset('image/') }}/${slideData.png}`;

                                // Update jewellery positions for the selected outfit
                                const fileName = slideData.png;
                                updateJewelleryPositions(fileName);

                                // Position labels and create connecting lines after image loads
                                outfitImg.onload = () => {
                                    setTimeout(() => {
                                        positionLabelsAndCreateLines();
                                    }, 100);
                                };
                            }
                        }
                    }
                    // Scroll to details container
                    var detailsContainer = document.getElementById('outfit-details-container');
                    if (detailsContainer) {
                        detailsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });
        });


        // });
    </script>


    <script>
        console.log("hello");
        // Hide phone error when user corrects input
        document.addEventListener('DOMContentLoaded', function() {
            var phoneInput = document.getElementById('contactNumber');
            var phoneError = document.getElementById('phone-error');
            if (phoneInput && phoneError) {
                phoneInput.addEventListener('input', function() {
                    if (/^\d{10}$/.test(phoneInput.value.trim())) {
                        phoneError.textContent = '';
                    }
                });
            }
        });
        // Step 3 form validation: show errors only on submit
        document.addEventListener('DOMContentLoaded', function() {
            var step3Form = document.getElementById('step3-form');
            if (!step3Form) return;
            var nameInput = document.getElementById('name');
            var phoneInput = document.getElementById('contactNumber');
            var emailInput = document.getElementById('email');
            var dateInput = document.getElementById('weddingDate');
            var nameError = document.getElementById('name-error');
            var phoneError = document.getElementById('phone-error');
            var emailError = document.getElementById('email-error');
            var dateError = document.getElementById('date-error');

            function validateStep3() {
                var valid = true;
                nameError.textContent = '';
                phoneError.textContent = '';
                emailError.textContent = '';
                dateError.textContent = '';
                if (!nameInput.value.trim()) {
                    nameError.textContent = 'Name is required.';
                    valid = false;
                }
                if (!phoneInput.value.match(/^\d{10}$/)) {
                    phoneError.textContent = 'Enter a valid 10-digit phone number.';
                    valid = false;
                }
                if (!emailInput.value.match(/^\S+@\S+\.\S+$/)) {
                    emailError.textContent = 'Enter a valid email address.';
                    valid = false;
                }
                if (!dateInput.value) {
                    dateError.textContent = 'Wedding date is required.';
                    valid = false;
                }
                return valid;
            }
            step3Form.addEventListener('submit', function(e) {
                if (!validateStep3()) {
                    e.preventDefault();
                }
            });
        });
        // Responsive step 1 container toggle
        function showCorrectStep1Container() {
            const desktopStep = document.getElementById('step1-desktop');
            const tabletStep = document.getElementById('step1-tablet');
            if (!desktopStep || !tabletStep) return;
            if (window.innerWidth <= 991) {
                desktopStep.style.display = 'none';
                tabletStep.style.display = '';
            } else {
                desktopStep.style.display = '';
                tabletStep.style.display = 'none';
            }
        }
        document.addEventListener('DOMContentLoaded', showCorrectStep1Container);
        window.addEventListener('resize', function() {
            // Only toggle if step 1 is active
            if (document.getElementById('step1-desktop').classList.contains('active') || document.getElementById(
                    'step1-tablet').classList.contains('active')) {
                showCorrectStep1Container();
            }
        });
        // Tablet step 1 form logic
        document.addEventListener('DOMContentLoaded', function() {
            const tabletForm = document.getElementById('step1-tablet-form');
            if (tabletForm) {
                tabletForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const languageSelect = document.getElementById('dream-select-tablet');
                    const eventSelect = document.getElementById('occasion-select-tablet');
                    const language = languageSelect.options[languageSelect.selectedIndex].text || 'Tamil';
                    const event = eventSelect.options[eventSelect.selectedIndex].text || 'Mehendi';
                    document.getElementById('hidden-language-tablet').value = language;
                    document.getElementById('hidden-event-tablet').value = event;
                    // Also set main hidden fields for backend
                    var mainLang = document.getElementById('hidden-language');
                    var mainEvent = document.getElementById('hidden-event');
                    if (mainLang) mainLang.value = language;
                    if (mainEvent) mainEvent.value = event;
                    const dynLang = document.getElementById('dynamic-language');
                    const dynEvent = document.getElementById('dynamic-event');
                    if (dynLang) dynLang.textContent = language;
                    if (dynEvent) dynEvent.textContent = event;
                    goToStep(2);
                });
            }
        });
        // Set min date to today for wedding date input
        document.addEventListener('DOMContentLoaded', function() {
            var weddingDateInput = document.getElementById('weddingDate');
            if (weddingDateInput) {
                var today = new Date();
                var yyyy = today.getFullYear();
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var dd = String(today.getDate()).padStart(2, '0');
                var minDate = yyyy + '-' + mm + '-' + dd;
                weddingDateInput.setAttribute('min', minDate);
            }
        });
    </script>
    <script>
        // Persist wedding date value between steps using sessionStorage
        document.addEventListener('DOMContentLoaded', function() {
            var weddingDateInput = document.getElementById('weddingDate');
            if (weddingDateInput) {
                // Restore from sessionStorage if available
                var savedDate = sessionStorage.getItem('weddingDate');
                if (savedDate) {
                    weddingDateInput.value = savedDate;
                }
                weddingDateInput.addEventListener('change', function() {
                    sessionStorage.setItem('weddingDate', this.value);
                });
            }
        });
    </script>

    <script>
        // OTP Modal close button logic
        document.addEventListener('DOMContentLoaded', function() {
            var otpModal = document.getElementById('otp-modal');
            var otpCloseBtn = document.getElementById('otp-modal-close');
            if (otpCloseBtn) {
                otpCloseBtn.onclick = function() {
                    otpModal.style.display = 'none';
                };
            }
        });
        // Helper: Store selected outfit and jewellery pieces in hidden fields when moving to step 3
        function storeStep2Selections() {
            // Get selected outfit
            var activeOutfitCard = document.querySelector('.jewelry-card.active');
            // console.log(activeOutfitCard, "activeOutfitcard");

            var outfit = activeOutfitCard ? activeOutfitCard.getAttribute('data-outfit') : '';
            // console.log(outfit, "outfit");
            document.getElementById('hidden-outfit').value = outfit;

            // Get selected jewellery pieces (all checked checkboxes)
            var checkedJewellery = document.querySelectorAll('.jewellery-checkbox:checked');
            var jewelleryPieces = Array.from(checkedJewellery).map(function(cb) {
                return cb.value;
            });
            // console.log(jewelleryPieces, "jewelleryPieces");
            document.getElementById('hidden-jewellery-pieces').value = jewelleryPieces.join(',');
        }

        // Attach to step 2 -> step 3 navigation
        document.addEventListener('DOMContentLoaded', function() {
            var nextStepBtn = document.querySelector('button[onclick="nextStep(3)"]');
            if (nextStepBtn) {
                nextStepBtn.addEventListener('click', function() {
                    storeStep2Selections();
                });
            }

            // Handle which submit button was clicked
            var step3Form = document.getElementById('step3-form');
            var recBtn = step3Form.querySelector('button[name="recommended_products"]');
            var catBtn = step3Form.querySelector('button[name="full_catalogue"]');
            if (recBtn) {
                recBtn.addEventListener('click', function(e) {
                    document.getElementById('hidden-submit-type').value = 'recommended_products';
                });
            }
            if (catBtn) {
                catBtn.addEventListener('click', function(e) {
                    document.getElementById('hidden-submit-type').value = 'full_catalogue';
                });
            }
        });
        // ...existing code...
        // Interactive validation for step3 form with red border and inline errors
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('step3-form');
            var nameInput = document.getElementById('name');
            var emailInput = document.getElementById('email');
            var phoneInput = document.getElementById('contactNumber');
            var dateInput = document.getElementById('weddingDate');
            var nameError = document.getElementById('name-error');
            var emailError = document.getElementById('email-error');
            var phoneError = document.getElementById('phone-error');
            var dateError = document.getElementById('date-error');

            function setError(input, errorDiv, message) {
                input.style.borderColor = message ? '#d00' : '';
                errorDiv.textContent = message || '';
            }

            function validateField() {
                setError(nameInput, nameError, !nameInput.value.trim() ? 'Name is required.' : '');
                setError(emailInput, emailError, !emailInput.value.trim() ? 'Email is required.' : (!
                    /^\S+@\S+\.\S+$/.test(emailInput.value.trim()) ? 'Email format is invalid.' : ''));
                var phoneVal = phoneInput.value.trim();
                setError(phoneInput, phoneError, !phoneVal ? 'Phone number is required.' : (!/^\d{10}$/.test(
                    phoneVal) ? 'Contact Number must be exactly 10 digits.' : ''));
                setError(dateInput, dateError, !dateInput.value.trim() ? 'Date of occasion is required.' : '');
            }


            form.addEventListener('submit', function(e) {
                validateField();
                var hasError = nameError.textContent || emailError.textContent || phoneError.textContent ||
                    dateError.textContent;
                if (hasError) {
                    e.preventDefault();
                }
            });
        });
        // OTP input logic: enable Verify button only when 6 digits entered
        document.addEventListener('DOMContentLoaded', function() {
            var otpInputs = document.querySelectorAll('.otp-box');
            var verifyBtn = document.getElementById('verify-otp-btn');
            otpInputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    var allFilled = Array.from(otpInputs).every(function(inp) {
                        return inp.value.length === 1;
                    });
                    verifyBtn.disabled = !allFilled;
                });
            });
        });

        // Show loading spinner only after clicking Verify OTP
        function verifyOTP() {
            var otpInputs = document.querySelectorAll('.otp-box');
            var otpValue = Array.from(otpInputs).map(function(inp) {
                return inp.value;
            }).join('');
            if (otpValue.length !== 6) return;
            document.querySelector('.otp-loading').style.display = 'flex';
            document.getElementById('verify-otp-btn').disabled = true;
            // Simulate async verification (replace with actual logic)
            setTimeout(function() {
                document.querySelector('.otp-loading').style.display = 'none';
                document.querySelector('.otp-success').style.display = 'flex';
            }, 1500);
        }
        const firebaseConfig = {
            apiKey: 'AIzaSyBqLtJbDYe-X-5a-d2BLc-su-X9GlxclQ0',
            authDomain: 'localhost',
            projectId: 'user-wishlist',
            storageBucket: 'user-wishlist.firebasestorage.app',
            messagingSenderId: '718283592432',
            appId: '1:718283592432:web:ec986b729c43ae39872835',
            measurementId: 'G-MJRQ18F8Z4',
        }

        firebase.initializeApp(firebaseConfig);
        const auth = firebase.auth(); // Use a consistent auth variable
        const db = firebase.firestore();
        let confirmationResult = null;

        // Initialize reCAPTCHA verifier once on page load
        let recaptchaVerifier;
        document.addEventListener('DOMContentLoaded', function() {
            recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                'size': 'invisible',
                'callback': (response) => {
                    // console.log('reCAPTCHA solved, proceed with OTP verification.');
                    // reCAPTCHA solved, you can now proceed
                },
                'expired-callback': () => {
                    // console.log('reCAPTCHA expired, please try again.');
                    // reCAPTCHA expired, re-render
                }
            });

            // Step 1 form submit
            const step1Form = document.getElementById('step1-form');
            if (step1Form) {
                step1Form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const languageSelect = document.getElementById('language-select');
                    const eventSelect = document.getElementById('event-select');

                    const language = languageSelect.options[languageSelect.selectedIndex].text || 'Tamil';
                    const event = eventSelect.options[eventSelect.selectedIndex].text || 'Mehendi';
                    document.getElementById('hidden-language').value = language;
                    document.getElementById('hidden-event').value = event;
                    document.getElementById('dynamic-language').textContent = language;
                    document.getElementById('dynamic-event').textContent = event;
                    goToStep(2);
                });
            }

            setupOutfitCards();
            setupPhoneVerification();
        });

        // Step navigation functions
        function goToStep(stepNum) {
            document.querySelectorAll('.step-container').forEach(step => step.classList.remove('active'));
            if (stepNum === 1) {
                if (window.innerWidth <= 991) {
                    // Tablet/mobile
                    const tabletStep = document.getElementById('step1-tablet');
                    if (tabletStep) tabletStep.classList.add('active');
                } else {
                    // Desktop
                    const desktopStep = document.getElementById('step1-desktop');
                    if (desktopStep) desktopStep.classList.add('active');
                }
            } else {
                const targetStep = document.getElementById('step' + stepNum);
                if (targetStep) targetStep.classList.add('active');
            }
        }

        function nextStep(stepNum) {
            goToStep(stepNum);
        }

        function prevStep(stepNum) {
            goToStep(stepNum);
        }

        // Outfit tablist logic
        function setupOutfitCards() {
            document.querySelectorAll('.outfit-card').forEach(function(card) {
                card.addEventListener('click', function() {
                    document.querySelectorAll('.outfit-card').forEach(c => c.classList.remove('active'));
                    this.classList.add('active');
                    document.querySelectorAll('.detail-section').forEach(section => section.style.display =
                        'none');
                    const outfit = this.getAttribute('data-outfit');
                    const detailsId = outfit + '-details';
                    const detailsSection = document.getElementById(detailsId);
                    if (detailsSection) {
                        detailsSection.style.display = 'block';
                    }
                    // Scroll to details container
                    var detailsContainer = document.getElementById('outfit-details-container');
                    if (detailsContainer) {
                        detailsContainer.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            const defaultCard = document.querySelector('.outfit-card.active');
            if (defaultCard) {
                const outfit = defaultCard.getAttribute('data-outfit');
                document.querySelectorAll('.detail-section').forEach(section => section.style.display = 'none');
                const detailsSection = document.getElementById(outfit + '-details');
                if (detailsSection) {
                    detailsSection.style.display = 'block';
                }
            }
        }

        // Phone number validation and OTP handling
        function setupPhoneVerification() {
            const step3Form = document.getElementById('step3-form');
            if (!step3Form) return;

            step3Form.addEventListener('submit', function(e) {
                e.preventDefault();

                let contactNumber = document.getElementById('contactNumber').value;
                console.log('Contact Number:', contactNumber);
                if (/^\d{10}$/.test(contactNumber)) {
                    contactNumber = '+91' + contactNumber;
                }
                // console.log('Formatted Contact Number:', contactNumber);
                // if (!contactNumber.match(/^\+\d{10,15}$/)) {
                //     document.getElementById('otp-error').textContent =
                //         'Please enter a valid phone number (e.g. +919876543210)';
                //     document.getElementById('otp-modal').style.display = 'none'; // Hide modal if invalid
                //     return;
                // }

                document.getElementById('otp-modal').style.display = 'flex';
                // console.log('Sending OTP to:', contactNumber);

                auth.signInWithPhoneNumber(contactNumber, recaptchaVerifier)
                    .then(function(result) {
                        confirmationResult = result;
                        // console.log(result);
                        // console.log('OTP sent successfully.');
                        // console.log(confirmationResult);
                        document.getElementById('otp-error').textContent = ''; // Clear previous errors
                        // console.log('OTP sent successfully.');
                    }).catch(function(error) {
                        // console.error("Error sending OTP:", error);
                        document.getElementById('otp-error').textContent = "";
                        // You might want to hide the modal here or allow resend
                    });
            });

            // OTP verify button
            document.getElementById('verify-otp-btn').addEventListener('click', function() {
                const code = document.getElementById('otp-code').value;
                if (!code || !confirmationResult) {
                    document.getElementById('otp-error').textContent = 'Please enter OTP code';
                    return;
                }
                confirmationResult.confirm(code).then(function(result) {
                    document.getElementById('otp-modal').style.display = 'none';
                    document.getElementById('step3-form').submit();
                }).catch(function(error) {
                    document.getElementById('otp-error').textContent = 'Invalid OTP. Try again.';
                });
            });
        }

        // OTP Verification Functions
        let otpTimer = null;
        let otpTimeLeft = 120; // 2 minutes in seconds

        // Handle OTP input and auto-focus
        function handleOTPInput(input) {
            const value = input.value;
            const index = parseInt(input.getAttribute('data-index'));

            // Only allow numbers
            if (value && !/^\d$/.test(value)) {
                input.value = '';
                return;
            }

            // Auto-focus to next input if a digit is entered
            if (value && index < 6) {
                const nextInput = document.querySelector(`.otp-box[data-index="${index + 1}"]`);
                if (nextInput) nextInput.focus();
            }

            // Handle backspace
            if (!value && index > 1) {
                const prevInput = document.querySelector(`.otp-box[data-index="${index - 1}"]`);
                if (prevInput) prevInput.focus();
            }

            // Auto-verify if all digits are entered
            if (index === 6 && value) {
                const otp = getOTP();
                if (otp.length === 6) {
                    verifyOTP(otp);
                }
            }
        }

        // Get the full OTP from all input fields
        function getOTP() {
            let otp = '';
            for (let i = 1; i <= 6; i++) {
                const input = document.querySelector(`.otp-box[data-index="${i}"]`);
                if (input) otp += input.value;
            }
            return otp;
        }

        // Show/hide loading state
        function showLoading(show) {
            const loadingEl = document.querySelector('.otp-loading');
            const errorEl = document.getElementById('otp-error');
            const verifyBtn = document.getElementById('verify-otp-btn');

            if (show) {
                loadingEl.style.display = 'block';
                errorEl.textContent = '';
                verifyBtn.disabled = true;
            } else {
                loadingEl.style.display = 'none';
                verifyBtn.disabled = false;
            }
        }

        // Show success state and redirect
        function showSuccess() {
            const successEl = document.querySelector('.otp-success');
            successEl.style.display = 'block';

            // Hide other elements
            showLoading(false);
            document.querySelector('.otp-inputs').style.opacity = '0.5';
            document.getElementById('verify-otp-btn').style.display = 'none';

            // Redirect after a short delay
            setTimeout(() => {
                // Submit the form or redirect to next page
                const form = document.getElementById('step3-form');
                if (form) {
                    form.submit();
                } else {
                    // If no form, redirect to home or next step
                    window.location.href = '/success'; // Update this URL as needed
                }
            }, 1000);
        }

        // Start OTP timer
        function startOTPTimer() {
            clearInterval(otpTimer);
            otpTimeLeft = 120; // Reset to 2 minutes
            updateTimerDisplay();

            otpTimer = setInterval(() => {
                otpTimeLeft--;
                updateTimerDisplay();

                if (otpTimeLeft <= 0) {
                    clearInterval(otpTimer);
                    // Enable resend button if you have one
                    const resendBtn = document.getElementById('resend-otp');
                    if (resendBtn) {
                        resendBtn.disabled = false;
                        resendBtn.textContent = 'Resend OTP';
                    }
                }
            }, 1000);
        }

        // Update timer display
        function updateTimerDisplay() {
            const timerEl = document.getElementById('otp-timer');
            if (timerEl) {
                const minutes = Math.floor(otpTimeLeft / 60);
                const seconds = otpTimeLeft % 60;
                timerEl.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }
        }

        // Verify OTP
        function verifyOTP(code = null) {
            const otp = code || getOTP();
            if (!otp || otp.length !== 6) {
                document.getElementById('otp-error').textContent = 'Please enter a valid 6-digit OTP';
                return;
            }
            showLoading(true);
            confirmationResult.confirm(otp)
                .then(async (result) => {
                    // User signed in successfully
                    const user = result.user;
                    const idToken = await user.getIdToken();
                    const uid = user.uid;
                    // console.log(user);
                    // Get required fields from form
                    const nameInput = document.getElementById('name');
                    const contactInput = document.getElementById('contactNumber');
                    const emailInput = document.getElementById('email');
                    const weddingDateInput = document.getElementById('weddingDate');
                    let username = nameInput ? nameInput.value.trim() : '';
                    let contactNumber = contactInput ? contactInput.value.trim() : '';
                    let email = emailInput ? emailInput.value.trim() : '';
                    let weddingDate = weddingDateInput ? weddingDateInput.value : '';


                    // Pass data to backend API
                    // Set hidden fields for backend
                    document.getElementById('hidden-user-id').value = uid;
                    document.getElementById('hidden-id-token').value = idToken;
                    document.getElementById('hidden-refresh-token').value = user.refreshToken;
                    document.getElementById('hidden-phone').value = user.phoneNumber;
                    // Submit the form to backend
                    showSuccess();
                    const form = document.getElementById('step3-form');
                    if (form) {
                        form.submit();
                    }



                })
                .catch((error) => {
                    showLoading(false);
                    document.getElementById('otp-error').textContent = 'Invalid OTP. Please try again.';
                    document.querySelectorAll('.otp-box').forEach(input => input.value = '');
                    document.querySelector('.otp-box[data-index="1"]').focus();
                });
        }

        // Update phone number in OTP modal
        function updatePhoneNumber(phone) {
            if (!phone) return;
            // Remove any existing + sign and format properly
            const cleanPhone = phone.replace(/^\+/, '');
            const formatted = cleanPhone.replace(/(\d{2})(\d{4})(\d+)/, '+$1 $2 ••••');
            const phoneEl = document.getElementById('otp-phone-number');
            if (phoneEl) phoneEl.textContent = formatted;
        }

        // Initialize OTP modal
        function initOTPModal() {
            // Focus first OTP input when modal is shown
            const modal = document.getElementById('otp-modal');
            if (modal) {
                modal.addEventListener('shown.bs.modal', function() {
                    const firstInput = document.querySelector('.otp-box[data-index="1"]');
                    if (firstInput) firstInput.focus();
                });
            }

            // Add click handler for verify button
            const verifyBtn = document.getElementById('verify-otp-btn');
            if (verifyBtn) {
                verifyBtn.addEventListener('click', function() {
                    verifyOTP();
                });
            }
        }

        // Call this when showing the OTP modal
        function showOTPModal(phoneNumber = '') {
            updatePhoneNumber(phoneNumber);
            document.getElementById('otp-modal').style.display = 'flex';
            document.querySelector('.otp-box[data-index="1"]').focus();
            startOTPTimer();
        }

        // Update the existing setupPhoneVerification function
        function setupPhoneVerification() {
            const step3Form = document.getElementById('step3-form');
            if (!step3Form) return;

            step3Form.addEventListener('submit', async function(e) {
                e.preventDefault();

                let contactNumber = document.getElementById('contactNumber').value.trim();

                // Format phone number
                if (/^\d{10}$/.test(contactNumber)) {
                    contactNumber = '+91' + contactNumber;
                }

                // Validate phone number
                if (!contactNumber.match(/^\+\d{10,15}$/)) {
                    document.getElementById('otp-error').textContent =
                        'Please enter a valid phone number (e.g. +919876543210)';
                    return;
                }

                // Show OTP modal
                showOTPModal(contactNumber);

                try {
                    // Send OTP
                    confirmationResult = await auth.signInWithPhoneNumber(contactNumber, recaptchaVerifier);
                    // console.log('OTP sent successfully');
                } catch (error) {
                    // console.error("Error sending OTP:", error);
                    // document.getElementById('otp-error').textContent = "Error: " + error.message;
                }
            });
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', async function() {
            // Your existing DOMContentLoaded code...
            // Initialize OTP modal
            initOTPModal();

            // Initialize reCAPTCHA verifier
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                'size': 'invisible',
                'callback': (response) => {
                    // console.log('reCAPTCHA solved, proceed with OTP verification.');
                },
                'expired-callback': () => {
                    // console.log('reCAPTCHA expired, please try again.');
                }
            });

            // Initialize phone verification
            setupPhoneVerification();

            // Load saved label positions first
            await loadLabelPositions();

            // Load jewellery position data first, then set up community mapping
            await loadJewelleryPositions();

            // Community-based model mapping (this will set the correct default positions)
            setupCommunityModelMapping();

            // Initialize event options for default bride type
            updateEventOptions('Tamil Bride');

            // Label positioning is now handled by setupCommunityModelMapping()
            // through image load events to ensure proper timing
        });

        // Bride type to events mapping - defines which events to show for each bride type
        const brideEventMapping = {
            'Telugu Bride': ['Nishayathartham', 'Nalangu', 'Muhurtam', 'Reception'],
            'Gujarati Bride': ['Gol Dhana', 'Sangeet', 'Wedding', 'Reception'],
            'Tamil Bride': ['Nishayathartham', 'Pandakal Muhurtham', 'Kalyanam', 'Reception'],
            'Marathi Bride': ['Sakharpuda', 'Haldi', 'Shaadi', 'Reception'],
            'Bengali Bride': ['Aiburobhat', 'Gaye Holud', 'Wedding', 'Reception'],
            'Punjabi Bride': ['Sagai', 'Haldi', 'Sangeet', 'Wedding', 'Reception'],
            'UP Bride': ['Cheka', 'Mehendi', 'Wedding', 'Reception'],
            'Bihari Bride': ['Cheka', 'Mehendi', 'Shaadi', 'Reception'],
            'Kannada Bride': ['Nischay Tamulam', 'Naandi', 'Saptapadi', 'Reception'],
            'Kannadiga Bride': ['Nischay Tamulam', 'Naandi', 'Saptapadi', 'Reception'],
            'Jharkhand Bride': ['Haldi', 'Wedding', 'Reception'],
            'Marwari Bride': ['Roka', 'Haldi', 'Mahira Dastoor', 'Wedding'],
            'Marwadi Bride': ['Roka', 'Haldi', 'Mahira Dastoor', 'Wedding'],
            'Odia Bride': ['Haldi', 'Wedding', 'Reception'],
            'Odiya Bride': ['Haldi', 'Wedding', 'Reception'],
            'Muslim Bride': ['Nikah', 'Mehendi', 'Reception'],
            // Fallback for other bride types
            'Jat Bride': ['Engagement', 'Mehendi', 'Wedding', 'Reception'],
            'Rajput Bride': ['Engagement', 'Mehendi', 'Wedding', 'Reception'],
            'Assamese Bride': ['Engagement', 'Mehendi', 'Wedding', 'Reception'],
            'Manipuri Bride': ['Engagement', 'Mehendi', 'Wedding', 'Reception']
        };

        // Community to model mapping - defines which 4 models to show for each community
        const communityModelMapping = {
            'Tamil Bride': {
                slide1: { jpeg: 'bystate/telugu-saree.png', png: 'bystate/telugu-saree.png', alt: 'Saree', outfit: 'saree' },
                slide2: { jpeg: 'bystate/telugu-lehnga.png', png: 'bystate/telugu-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide3: { jpeg: 'bystate/tamil-gown.png', png: 'bystate/tamil-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Telugu Bride': {
                slide1: { jpeg: 'bystate/telugu-lehnga.png', png: 'bystate/telugu-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide2: { jpeg: 'bystate/telugu-saree.png', png: 'bystate/telugu-saree.png', alt: 'Saree', outfit: 'saree' },
                slide3: { jpeg: 'bystate/telugu-gown.png', png: 'bystate/telugu-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Gujarati Bride': {
                slide1: { jpeg: 'bystate/gujarati-lehnga.png', png: 'bystate/gujarati-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide2: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide3: { jpeg: 'bystate/telugu-saree.png', png: 'bystate/telugu-saree.png', alt: 'Saree', outfit: 'saree' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Bengali Bride': {
                slide1: { jpeg: 'bystate/bengali-saree.png', png: 'bystate/bengali-saree.png', alt: 'Saree', outfit: 'saree' },
                slide2: { jpeg: 'bystate/bengali-lehnga.png', png: 'bystate/bengali-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Odia Bride': {
                slide1: { jpeg: 'bystate/odiya-saree.png', png: 'bystate/odiya-saree.png', alt: 'Saree', outfit: 'saree' },
                slide2: { jpeg: 'bystate/odiya-lehnga.png', png: 'bystate/odiya-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Bihari Bride': {
                slide1: { jpeg: 'bystate/bihari-saree.png', png: 'bystate/bihari-saree.png', alt: 'Saree', outfit: 'saree' },
                slide2: { jpeg: 'bystate/bihari-lehnga.png', png: 'bystate/bihari-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'UP Bride': {
                slide1: { jpeg: 'bystate/up-lehnga.png', png: 'bystate/up-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide2: { jpeg: 'bystate/telugu-saree.png', png: 'bystate/telugu-saree.png', alt: 'Saree', outfit: 'saree' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Marwari Bride': {
                slide1: { jpeg: 'bystate/jharkhand-lehnga.png', png: 'bystate/jharkhand-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide2: { jpeg: 'bystate/jharkhand-saree.png', png: 'bystate/jharkhand-saree.png', alt: 'Saree', outfit: 'saree' },
                slide3: { jpeg: 'bystate/jharkhand-gown.png', png: 'bystate/jharkhand-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Marwadi Bride': {
                slide1: { jpeg: 'bystate/jharkhand-lehnga.png', png: 'bystate/jharkhand-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide2: { jpeg: 'bystate/jharkhand-saree.png', png: 'bystate/jharkhand-saree.png', alt: 'Saree', outfit: 'saree' },
                slide3: { jpeg: 'bystate/jharkhand-gown.png', png: 'bystate/jharkhand-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Punjabi Bride': {
                slide1: { jpeg: 'bystate/punjabi-lehnga.png', png: 'bystate/punjabi-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide2: { jpeg: 'bystate/punjabi-saree.png', png: 'bystate/punjabi-saree.png', alt: 'Saree', outfit: 'saree' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Marathi Bride': {
                slide1: { jpeg: 'bystate/marathi-saree.png', png: 'bystate/marathi-saree.png', alt: 'Saree', outfit: 'saree' },
                slide2: { jpeg: 'bystate/marathi-lehnga.png', png: 'bystate/marathi-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Kannada Bride': {
                slide1: { jpeg: 'bystate/kannadiga-saree.png', png: 'bystate/kannadiga-saree.png', alt: 'Saree', outfit: 'saree' },
                slide2: { jpeg: 'bystate/kannadiga-lehnga.png', png: 'bystate/kannadiga-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide3: { jpeg: 'bystate/telugu-gown.png', png: 'bystate/telugu-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Kannadiga Bride': {
                slide1: { jpeg: 'bystate/kannadiga-saree.png', png: 'bystate/kannadiga-saree.png', alt: 'Saree', outfit: 'saree' },
                slide2: { jpeg: 'bystate/kannadiga-lehnga.png', png: 'bystate/kannadiga-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide3: { jpeg: 'bystate/telugu-gown.png', png: 'bystate/telugu-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Jharkhand Bride': {
                slide1: { jpeg: 'bystate/jharkhand-lehnga.png', png: 'bystate/jharkhand-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide2: { jpeg: 'bystate/jharkhand-saree.png', png: 'bystate/jharkhand-saree.png', alt: 'Saree', outfit: 'saree' },
                slide3: { jpeg: 'bystate/jharkhand-gown.png', png: 'bystate/jharkhand-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Jat Bride': {
                slide1: { jpeg: 'bystate/up-lehnga.png', png: 'bystate/up-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide2: { jpeg: 'bystate/telugu-saree.png', png: 'bystate/telugu-saree.png', alt: 'Saree', outfit: 'saree' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Rajput Bride': {
                slide1: { jpeg: 'bystate/up-lehnga.png', png: 'bystate/up-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide2: { jpeg: 'bystate/telugu-saree.png', png: 'bystate/telugu-saree.png', alt: 'Saree', outfit: 'saree' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Assamese Bride': {
                slide1: { jpeg: 'bystate/bengali-saree.png', png: 'bystate/bengali-saree.png', alt: 'Saree', outfit: 'saree' },
                slide2: { jpeg: 'bystate/bengali-lehnga.png', png: 'bystate/bengali-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Manipuri Bride': {
                slide1: { jpeg: 'bystate/bengali-saree.png', png: 'bystate/bengali-saree.png', alt: 'Saree', outfit: 'saree' },
                slide2: { jpeg: 'bystate/bengali-lehnga.png', png: 'bystate/bengali-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Malayalee Bride': {
                slide1: { jpeg: 'bystate/tamil-gown.png', png: 'bystate/tamil-gown.png', alt: 'Gown', outfit: 'gown' },
                slide2: { jpeg: 'bystate/telugu-saree.png', png: 'bystate/telugu-saree.png', alt: 'Saree', outfit: 'saree' },
                slide3: { jpeg: 'bystate/telugu-lehnga.png', png: 'bystate/telugu-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Kumaoni Bride': {
                slide1: { jpeg: 'bystate/up-lehnga.png', png: 'bystate/up-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide2: { jpeg: 'bystate/telugu-saree.png', png: 'bystate/telugu-saree.png', alt: 'Saree', outfit: 'saree' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            },
            'Muslim Bride': {
                slide1: { jpeg: 'bystate/odiya-lehnga.png', png: 'bystate/odiya-lehnga.png', alt: 'Lehenga', outfit: 'lehnga' },
                slide2: { jpeg: 'bystate/telugu-saree.png', png: 'bystate/telugu-saree.png', alt: 'Saree', outfit: 'saree' },
                slide3: { jpeg: 'bystate/gujarati-gown.png', png: 'bystate/gujarati-gown.png', alt: 'Gown', outfit: 'gown' },
                slide4: { jpeg: 'bystate/telugu-others.png', png: 'bystate/telugu-others.png', alt: 'Others', outfit: 'others' }
            }
        };

        // Function to update event dropdown based on selected bride type
        function updateEventOptions(brideType) {
            const eventSelects = [
                document.getElementById('event-select'),
                document.getElementById('occasion-select-tablet')
            ];

            const events = brideEventMapping[brideType] || ['Engagement', 'Mehendi', 'Wedding', 'Reception'];

            eventSelects.forEach(eventSelect => {
                if (!eventSelect) return;

                // Clear existing options
                eventSelect.innerHTML = '';

                // Add new options based on bride type
                events.forEach((event, index) => {
                    const option = document.createElement('option');
                    option.value = event;
                    option.textContent = event;
                    if (index === 0) option.selected = true; // Select first option by default
                    eventSelect.appendChild(option);
                });
            });
        }

        function setupCommunityModelMapping() {
            const languageSelect = document.getElementById('language-select');
            const tabletLanguageSelect = document.getElementById('dream-select-tablet');

            // Function to update model images based on selected community
            function updateModelImages(community) {
                const mapping = communityModelMapping[community];
                if (!mapping) return;

                // Update swiper slide images
                const slides = document.querySelectorAll('.swiper-slide');
                slides.forEach((slide, index) => {
                    const slideKey = `slide${index + 1}`;
                    const slideData = mapping[slideKey];
                    if (slideData) {
                        const img = slide.querySelector('.card-image');
                        const card = slide.querySelector('.jewelry-card');
                        if (img) {
                            img.src = `{{ asset('image/') }}/${slideData.jpeg}`;
                            img.alt = slideData.alt;
                        }
                        if (card) {
                            card.setAttribute('data-outfit', slideData.outfit);

                            // Update button label from the new image filename
                            const button = card.querySelector('.outfit-btn');
                            if (button && img) {
                                const label = generateLabelFromFilename(img.src);
                                button.textContent = label;
                            }
                        }
                    }
                });

                // Update detail section images
                // Find which slide contains each outfit type and update corresponding detail section
                const outfitToDetailMapping = {
                    'lehanga': 'details',
                    'gown': 'details',
                    'saree': 'details',
                    'anarkali': 'details'
                };

                // Create mapping from outfit to slide data
                const outfitSlideMapping = {};
                Object.keys(mapping).forEach(slideKey => {
                    const slideData = mapping[slideKey];
                    outfitSlideMapping[slideData.outfit] = slideData;
                });

                // Update the main outfit detail section
                const outfitDetails = document.getElementById('outfit-details');
                const outfitTitle = document.getElementById('outfit-title');
                const outfitImg = document.querySelector('#outfit-details .outfit-img');

                if (outfitDetails && outfitTitle && outfitImg) {
                    // Update with the first (active) slide's outfit
                    const activeSlideData = mapping.slide1; // Always use the first slide as active
                    outfitImg.src = `{{ asset('image/') }}/${activeSlideData.png}`;
                    outfitTitle.textContent = `${activeSlideData.alt} Checklist`;

                    // Update jewellery positions for the new image
                    const fileName = `${activeSlideData.png}`;
                    updateJewelleryPositions(fileName);

                    // FIXED: Wait for image to load before positioning labels
                    outfitImg.onload = () => {
                        // Use requestAnimationFrame to ensure layout is complete
                        requestAnimationFrame(() => {
                            requestAnimationFrame(() => {
                                positionLabelsAndCreateLines();
                            });
                        });
                    };

                    // Handle case where image is already cached and loaded
                    if (outfitImg.complete && outfitImg.naturalHeight !== 0) {
                        // Use requestAnimationFrame to ensure layout is complete
                        requestAnimationFrame(() => {
                            requestAnimationFrame(() => {
                                positionLabelsAndCreateLines();
                            });
                        });
                    }
                }
            }

            // Initialize with default community (Tamil Bride)
            updateModelImages('Tamil Bride');

            // Add event listener for community changes
            if (languageSelect) {
                languageSelect.addEventListener('change', function() {
                    const selectedCommunity = this.value;
                    updateModelImages(selectedCommunity);
                    updateEventOptions(selectedCommunity);
                });
            }

            // Add event listener for tablet community changes
            if (tabletLanguageSelect) {
                tabletLanguageSelect.addEventListener('change', function() {
                    const selectedCommunity = this.value;
                    updateEventOptions(selectedCommunity);
                });
            }
        }

        // ========== NEW LABEL POSITIONING FUNCTIONS ==========
        let labelPositions = {}; // Store custom label positions

        // Add device detection
        function getDeviceType() {
            return window.innerWidth <= 768 ? 'mobile' : 'desktop';
        }

        // Load saved label positions from server
        async function loadLabelPositions() {
            try {
                const response = await fetch('/api/jewellery/load-positions');
                const data = await response.json();

                if (data.success) {
                    labelPositions = data.positions;
                    console.log('Loaded saved label positions:', labelPositions);
                } else {
                    console.error('Failed to load label positions:', data.message);
                }
            } catch (error) {
                console.error('Error loading label positions:', error);
                labelPositions = {};
            }
        }

        // Position labels and create connecting lines
        function positionLabelsAndCreateLines() {
            const jewelleryTypes = [
                'forehead-pendant', 'hair-jewellery', 'earrings-stud', 'earrings-drops',
                'ear-loops', 'nose-pin', 'choker-necklace', 'short-necklace',
                'long-necklace', 'multiple-bangles', 'bracelet', 'single-bangle',
                'rings', 'waist-belt', 'anklet', 'toe-ring'
            ];

            const rightSideTypes = [
                'hair-jewellery', 'earrings-stud', 'earrings-drops', 'ear-loops',
                'short-necklace', 'rings', 'bracelet', 'waist-belt', 'anklet', 'toe-ring'
            ];

            const svg = document.getElementById('connecting-lines');
            if (svg) {
                svg.innerHTML = ''; // Clear existing lines
            }

            // Get current model image path
            const currentImageSrc = document.querySelector('#jewellery-container .outfit-img')?.src;
            if (!currentImageSrc) return;

            // Check if current image ends with "others" - if so, hide all jewellery labels
            const imageFilename = currentImageSrc.split('/').pop().toLowerCase();
            const isOthersImage = imageFilename.includes('-others');

            if (isOthersImage) {
                // Hide all jewellery labels and position dots for "others" images
                jewelleryTypes.forEach(type => {
                    const positionDot = document.querySelector(`.jewellery-position[data-type="${type}"]`);
                    const label = document.querySelector(`.jewellery-label[data-type="${type}"]`);

                    if (positionDot) positionDot.style.display = 'none';
                    if (label) label.style.display = 'none';
                });
                return; // Exit early for "others" images
            }

            // Ensure container has proper dimensions before positioning
            const container = document.getElementById('jewellery-container');
            const containerRect = container.getBoundingClientRect();

            if (containerRect.width === 0 || containerRect.height === 0) {
                console.log('Container not ready, retrying...');
                setTimeout(() => positionLabelsAndCreateLines(), 50);
                return;
            }

            // Get current device type
            const deviceType = getDeviceType();

            // Extract image filename for saved positions lookup
            const imagePath = currentImageSrc.split('/').pop();
            const imagePositions = labelPositions[imagePath] || labelPositions[`bystate/${imagePath}`] || {};
            const savedPositions = imagePositions[deviceType] || {};

            jewelleryTypes.forEach(type => {
                const positionDot = document.querySelector(`.jewellery-position[data-type="${type}"]`);
                const label = document.querySelector(`.jewellery-label[data-type="${type}"]`);

                if (positionDot && label) {
                    // Make sure labels are visible for non-"others" images
                    positionDot.style.display = 'block';
                    label.style.display = 'flex';

                    let labelX, labelY;

                    // Check if we have saved positions for this label
                    if (savedPositions[type]) {
                        // Use saved positions (convert from percentage to pixels)
                        labelX = (savedPositions[type].x / 100) * containerRect.width;
                        labelY = (savedPositions[type].y / 100) * containerRect.height;
                        console.log(`Using saved ${deviceType} position for ${type}:`, savedPositions[type]);
                    } else {
                        // Use default positioning logic
                        const isRightSide = rightSideTypes.includes(type);
                        const offsetDistance = 100; // Distance from the dot

                        const dotRect = positionDot.getBoundingClientRect();
                        const dotX = dotRect.left - containerRect.left + dotRect.width / 2;
                        const dotY = dotRect.top - containerRect.top + dotRect.height / 2;

                        if (isRightSide) {
                            labelX = dotX + offsetDistance;
                            labelY = dotY - label.offsetHeight / 2;
                        } else {
                            labelX = dotX - offsetDistance - label.offsetWidth;
                            labelY = dotY - label.offsetHeight / 2;
                        }
                        console.log(`Using default position for ${type}`);
                    }

                    // Constrain within container
                    labelX = Math.max(0, Math.min(labelX, containerRect.width - label.offsetWidth));
                    labelY = Math.max(0, Math.min(labelY, containerRect.height - label.offsetHeight));

                    label.style.left = labelX + 'px';
                    label.style.top = labelY + 'px';

                    // Create connecting line
                    if (svg) {
                        const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                        line.id = `line-${type}`;
                        line.classList.add('connecting-line');
                        svg.appendChild(line);

                        // Update line position with delay to ensure layout is complete
                        setTimeout(() => {
                            updateConnectingLine(type);
                        }, 10);
                    }
                }
            });
        }

        // Update connecting line between position dot and label
        function updateConnectingLine(jewelleryType) {
            const positionDot = document.querySelector(`.jewellery-position[data-type="${jewelleryType}"]`);
            const label = document.querySelector(`.jewellery-label[data-type="${jewelleryType}"]`);
            const line = document.querySelector(`#line-${jewelleryType}`);

            if (!positionDot || !label || !line) return;

            const container = document.getElementById('jewellery-container');
            const containerRect = container.getBoundingClientRect();

            // Get position dot center
            const dotRect = positionDot.getBoundingClientRect();
            const dotX = dotRect.left - containerRect.left + dotRect.width / 2;
            const dotY = dotRect.top - containerRect.top + dotRect.height / 2;

            // Get label center - try to use saved position first, fallback to current UI position
            let labelX, labelY;

            // Check if we have saved positions for this label
            const currentImageSrc = document.querySelector('#jewellery-container .outfit-img')?.src;
            if (currentImageSrc) {
                const imagePath = currentImageSrc.split('/').pop();
                const deviceType = getDeviceType();
                const imagePositions = labelPositions[imagePath] || labelPositions[`bystate/${imagePath}`] || {};
                const savedPositions = imagePositions[deviceType] || {};

                if (savedPositions[jewelleryType]) {
                    // Use saved position from JSON (convert from percentage to pixels)
                    labelX = (savedPositions[jewelleryType].x / 100) * containerRect.width + label.offsetWidth / 2;
                    labelY = (savedPositions[jewelleryType].y / 100) * containerRect.height + label.offsetHeight / 2;
                    console.log(`Using saved position for line endpoint for ${jewelleryType}:`, savedPositions[jewelleryType]);
                } else {
                    // Fallback to current UI position
                    const labelRect = label.getBoundingClientRect();
                    labelX = labelRect.left - containerRect.left + labelRect.width / 2;
                    labelY = labelRect.top - containerRect.top + labelRect.height / 2;
                }
            } else {
                // Fallback to current UI position if no image source
                const labelRect = label.getBoundingClientRect();
                labelX = labelRect.left - containerRect.left + labelRect.width / 2;
                labelY = labelRect.top - containerRect.top + labelRect.height / 2;
            }

            // Update line
            line.setAttribute('x1', dotX);
            line.setAttribute('y1', dotY);
            line.setAttribute('x2', labelX);
            line.setAttribute('y2', labelY);
        }

        // Update all connecting lines
        function updateAllConnectingLines() {
            const jewelleryTypes = [
                'forehead-pendant', 'hair-jewellery', 'earrings-stud', 'earrings-drops',
                'ear-loops', 'nose-pin', 'choker-necklace', 'short-necklace',
                'long-necklace', 'multiple-bangles', 'bracelet', 'single-bangle',
                'rings', 'waist-belt', 'anklet', 'toe-ring'
            ];

            // Use requestAnimationFrame to ensure layout is complete before updating lines
            requestAnimationFrame(() => {
                jewelleryTypes.forEach(type => {
                    updateConnectingLine(type);
                });
            });
        }

        // Debug function to help troubleshoot line positioning
        function debugLinePositions() {
            const jewelleryTypes = [
                'forehead-pendant', 'hair-jewellery', 'earrings-stud', 'earrings-drops',
                'ear-loops', 'nose-pin', 'choker-necklace', 'short-necklace',
                'long-necklace', 'multiple-bangles', 'bracelet', 'single-bangle',
                'rings', 'waist-belt', 'anklet', 'toe-ring'
            ];

            console.log('=== LINE POSITION DEBUG ===');

            jewelleryTypes.forEach(type => {
                const positionDot = document.querySelector(`.jewellery-position[data-type="${type}"]`);
                const label = document.querySelector(`.jewellery-label[data-type="${type}"]`);
                const line = document.querySelector(`#line-${type}`);

                if (positionDot && label && line) {
                    const container = document.getElementById('jewellery-container');
                    const containerRect = container.getBoundingClientRect();

                    const dotRect = positionDot.getBoundingClientRect();
                    const dotX = dotRect.left - containerRect.left + dotRect.width / 2;
                    const dotY = dotRect.top - containerRect.top + dotRect.height / 2;

                    const labelRect = label.getBoundingClientRect();
                    const labelX = labelRect.left - containerRect.left + labelRect.width / 2;
                    const labelY = labelRect.top - containerRect.top + labelRect.height / 2;

                    const lineX1 = parseFloat(line.getAttribute('x1'));
                    const lineY1 = parseFloat(line.getAttribute('y1'));
                    const lineX2 = parseFloat(line.getAttribute('x2'));
                    const lineY2 = parseFloat(line.getAttribute('y2'));

                    console.log(`${type}:`, {
                        dot: { x: dotX.toFixed(1), y: dotY.toFixed(1) },
                        label: { x: labelX.toFixed(1), y: labelY.toFixed(1) },
                        line: { x1: lineX1.toFixed(1), y1: lineY1.toFixed(1), x2: lineX2.toFixed(1), y2: lineY2.toFixed(1) },
                        dotMatches: Math.abs(dotX - lineX1) < 1 && Math.abs(dotY - lineY1) < 1,
                        labelMatches: Math.abs(labelX - lineX2) < 1 && Math.abs(labelY - lineY2) < 1
                    });
                }
            });

            console.log('=== END DEBUG ===');
        }

        // Make debug function available globally for console testing
        window.debugLinePositions = debugLinePositions;
        // ========== END NEW LABEL POSITIONING FUNCTIONS ==========

        // Load jewellery position data and generate dynamic CSS
        //
        // HOW TO ADD NEW IMAGES:
        // 1. Create a new annotation file (e.g., /public/data/mynewimage-annotations.json)
        // 2. Add the file path to the knownFiles array below
        // 3. Update the community mapping in communityModelMapping to reference your new image
        // 4. The system will automatically handle positioning for the new image!
        //
        async function loadJewelleryPositions() {
            try {
                // Try to automatically discover annotation files, with fallback to known files
                let annotationFiles = [];

                // First, try to get list of files from the server (if we implement this endpoint)
                // For now, use the known files list and make it easy to extend
                const knownFiles = [
                    '/data/jewellery-positions.json', // Fallback to clean format
                    '/data/lehnga-annotations.json',   // Lehnga positioning data
                    '/data/saree-annotations.json',    // Saree positioning data (contains both lehnga and saree)
                    '/data/gown-annotations.json',     // Gown positioning data
                    '/data/anarkali-annotations.json', // Anarkali positioning data
                    '/data/new-annotations.json',      // New image positioning data

                    // State-specific annotation files
                    '/data/telegu-saree-annotations.json', // Telugu saree specific positioning
                    '/data/telugu-lehnga-annotations.json',
                    '/data/telugu-gown-annotations.json',
                    '/data/gujarati-lehnga-annotations.json',
                    '/data/gujarati-gown-annotations.json',
                    '/data/bengali-lehnga-annotations.json',
                    '/data/bengali-saree-annotations.json',
                    '/data/punjabi-lehnga-annotations.json',
                    '/data/punjabi-saree-annotations.json',
                    '/data/marathi-lehnga-annotations.json',
                    '/data/marathi-saree-annotations.json',
                    '/data/tamil-gown-annotations.json',
                    '/data/bihari-lehnga-annotations.json',
                    '/data/bihari-saree-annotations.json',
                    '/data/kannadiga-lehnga-annotations.json',
                    '/data/kannadiga-saree-annotations.json',
                    '/data/jharkhand-lehnga-annotations.json',
                    '/data/jharkhand-saree-annotations.json',
                    '/data/jharkhand-gown-annotations.json',
                    '/data/odiya-lehnga-annotations.json',
                    '/data/odiya-saree-annotations.json',
                    '/data/up-lehnga-annotations.json'
                ];

                // All annotation files are now in knownFiles
                annotationFiles = knownFiles;

                let positionData = {};
                let loadedCount = 0;

                for (const file of annotationFiles) {
                    try {
                        const response = await fetch(file);
                        const data = await response.json();

                        // Check if it's annotation format or clean format
                        if (Array.isArray(data) && data[0] && data[0].file_upload) {
                            // Parse annotation format
                            console.log(`Loading annotation file: ${file}`);
                            const parsed = parseAnnotationData(data);
                            positionData = { ...positionData, ...parsed };
                            loadedCount++;
                        } else if (typeof data === 'object' && !Array.isArray(data)) {
                            // Use clean format directly
                            console.log(`Loading clean format file: ${file}`);
                            positionData = { ...positionData, ...data };
                            loadedCount++;
                        }
                    } catch (fileError) {
                        console.log(`Could not load ${file}:`, fileError.message);
                    }
                }

                console.log(`Loaded ${loadedCount} position data files`);
                console.log('Position data keys:', Object.keys(positionData));

                // Generate CSS for each image and jewellery combination
                generateJewelleryCSSRules(positionData);

                // Don't initialize positions here - they are handled by setupCommunityModelMapping()
                // which calls updateModelImages('Tamil Bride') and sets the correct jewellery positions

            } catch (error) {
                console.error('Failed to load jewellery positions:', error);
                // Fallback to default positioning
            }
        }

        // Parse annotation data format into clean position data
        function parseAnnotationData(annotationArray) {
            const positionData = {};

            annotationArray.forEach(item => {
                if (!item.file_upload || !item.annotations || !item.annotations[0]) {
                    return;
                }

                // Extract image name from file_upload (e.g., "84716555-lahnga.jpeg")
                const fileUpload = item.file_upload;
                const imageName = extractImageName(fileUpload);

                // console.log(`Processing annotation: ${fileUpload} -> ${imageName}`);

                if (!imageName) return;

                // Parse annotations to extract coordinates
                const annotation = item.annotations[0];
                if (!annotation.result) return;

                const positions = {};

                annotation.result.forEach(point => {
                    if (!point.value || !point.value.keypointlabels || !point.value.keypointlabels[0]) {
                        return;
                    }

                    const jewelleryType = point.value.keypointlabels[0];
                    const x = point.value.x;
                    const y = point.value.y;

                    positions[jewelleryType] = { x, y };
                });

                positionData[imageName] = positions;
                // console.log(`Added ${Object.keys(positions).length} jewellery items for ${imageName}:`, positions);
            });

            return positionData;
        }

        // Extract image name from file upload and map to bystate PNG format
        function extractImageName(fileUpload) {
            // Extract base name from file upload (e.g., "84716555-lahnga.jpeg" -> "lahnga")
            const fileName = fileUpload.split('/').pop(); // Get filename from path

            // Remove ID prefix and get the actual name (e.g., "84716555-lahnga.jpeg" -> "lahnga.jpeg")
            const baseName = fileName.replace(/^[a-f0-9-]+-/, ''); // Remove alphanumeric prefix and dash

            // console.log(`extractImageName: ${fileUpload} -> ${fileName} -> ${baseName}`);

            // Map to actual bystate PNG file names used in the system
            const nameMapping = {
                // Generic mappings (fallback)
                'lahnga.jpeg': 'lehnga.png',
                'gown.jpeg': 'gown.png',
                'saree.jpeg': 'saree.png',
                'saree.png': 'saree.png',
                'anarkali.jpeg': 'anarkali.png',
                'new.jpeg': 'new.png',
                'new.png': 'new.png',

                // State-specific mappings (priority) - handle both formats
                'telugu-saree.png': 'bystate/telugu-saree.png',
                'telugu-lehnga.png': 'bystate/telugu-lehnga.png',
                'telugu-gown.png': 'bystate/telugu-gown.png',
                'gujarati-lehnga.png': 'bystate/gujarati-lehnga.png',
                'gujarati-gown.png': 'bystate/gujarati-gown.png',
                'bengali-lehnga.png': 'bystate/bengali-lehnga.png',
                'bengali-saree.png': 'bystate/bengali-saree.png',
                'punjabi-lehnga.png': 'bystate/punjabi-lehnga.png',
                'punjabi-saree.png': 'bystate/punjabi-saree.png',
                'marathi-lehnga.png': 'bystate/marathi-lehnga.png',
                'marathi-saree.png': 'bystate/marathi-saree.png',
                'tamil-gown.png': 'bystate/tamil-gown.png',
                'bihari-lehnga.png': 'bystate/bihari-lehnga.png',
                'bihari-saree.png': 'bystate/bihari-saree.png',
                'kannadiga-lehnga.png': 'bystate/kannadiga-lehnga.png',
                'kannadiga-saree.png': 'bystate/kannadiga-saree.png',
                'jharkhand-lehnga.png': 'bystate/jharkhand-lehnga.png',
                'jharkhand-saree.png': 'bystate/jharkhand-saree.png',
                'jharkhand-gown.png': 'bystate/jharkhand-gown.png',
                'odiya-lehnga.png': 'bystate/odiya-lehnga.png',
                'odiya-saree.png': 'bystate/odiya-saree.png',
                'up-lehnga.png': 'bystate/up-lehnga.png'
            };

            // For future images, automatically convert extensions and handle dynamic mapping
            let result = nameMapping[baseName];
            if (!result) {
                // Check if this is a state-specific image name pattern
                if (baseName.includes('-') && (baseName.includes('saree') || baseName.includes('lehnga') || baseName.includes('gown'))) {
                    // This looks like a state-specific image, map it to bystate directory
                    result = `bystate/${baseName}`;
                } else {
                    // Dynamic mapping: replace .jpeg with .png, keep .png as is
                    result = baseName.replace(/\.jpeg$/, '.png');
                }
            }

            // console.log(`Final mapping: ${baseName} -> ${result}`);
            return result;
        }

        // Generate CSS rules for jewellery positioning (updated for new label system)
        function generateJewelleryCSSRules(positionData) {
            const style = document.createElement('style');
            style.id = 'dynamic-jewellery-css';

            let cssRules = `
                /* Ensure outfit-details centers its children */
                #outfit-details {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    width: 100%;
                }

                /* Center the animated-image-container horizontally within outfit-details */
                #outfit-details .animated-image-container {
                    margin: 0 auto;
                    display: flex;
                    justify-content: center;
                    width: 100%;
                    max-width: 500px; /* Optional: limit max width */
                }

                /* Ensure the image container is the positioning context and matches image size */
                #jewellery-container {
                    position: relative;
                    display: inline-block;
                    width: 100%;
                    margin: 0 auto;
                }

                /* Image should fill the container completely */
                #jewellery-container .outfit-img {
                    display: block;
                    width: 100%;
                    height: auto;
                    position: relative;
                }
            `;

            // Generate CSS classes for each image type - positioning the dots
            Object.keys(positionData).forEach(imageFileName => {
                const positions = positionData[imageFileName];
                // Create sanitized class name by removing file extension and bystate path
                let sanitizedClassName = imageFileName.replace(/\.[^/.]+$/, "");

                // Handle bystate paths: "bystate/telugu-saree.png" -> "telugu-saree"
                if (sanitizedClassName.includes('bystate/')) {
                    sanitizedClassName = sanitizedClassName.replace('bystate/', '');
                }

                // console.log(`Generating CSS for image: ${imageFileName} -> class: ${sanitizedClassName}`);

                Object.keys(positions).forEach(jewelleryType => {
                    const position = positions[jewelleryType];

                    // Position the dots using the annotation data
                    const cssRule = `
                        #jewellery-container.${sanitizedClassName} .jewellery-position[data-type="${jewelleryType}"] {
                            left: ${position.x}%;
                            top: ${position.y}%;
                        }
                    `;
                    cssRules += cssRule;
                    // console.log(`Generated CSS rule: #jewellery-container.${sanitizedClassName} .jewellery-position[data-type="${jewelleryType}"]`);
                });
            });

            style.textContent = cssRules;
            document.head.appendChild(style);
        }

        // Update jewellery positions for specific image type
        function updateJewelleryPositions(imageTypeOrFileName) {
            const container = document.getElementById('jewellery-container');
            if (!container) return;

            // Remove all existing image type classes
            const imageTypes = ['lehnga', 'gown', 'saree', 'anarkali', 'others'];
            // Also remove state-specific classes
            const stateSpecificClasses = ['telugu-saree', 'telugu-lehnga', 'telugu-gown', 'gujarati-lehnga', 'gujarati-gown',
                                        'bengali-lehnga', 'bengali-saree', 'punjabi-lehnga', 'punjabi-saree',
                                        'marathi-lehnga', 'marathi-saree', 'tamil-gown', 'bihari-lehnga', 'bihari-saree',
                                        'kannadiga-lehnga', 'kannadiga-saree', 'jharkhand-lehnga', 'jharkhand-saree',
                                        'jharkhand-gown', 'odiya-lehnga', 'odiya-saree', 'up-lehnga'];

            [...imageTypes, ...stateSpecificClasses].forEach(type => container.classList.remove(type));

            // Extract the appropriate class name from the image path
            let className = imageTypeOrFileName;

            // Handle bystate paths (e.g., "bystate/telugu-saree.png" -> "telugu-saree")
            if (className.includes('bystate/')) {
                const fileName = className.split('/').pop(); // Get filename from path
                className = fileName.replace(/\.[^/.]+$/, ""); // Remove extension: "telugu-saree.png" -> "telugu-saree"
            } else {
                // Handle regular paths (remove extension)
                className = className.includes('.') ?
                    className.replace(/\.[^/.]+$/, "") :
                    className;
            }

            // Add new image type class
            container.classList.add(className);
            // console.log(`Updated jewellery container class to: ${className}`);
        }

        // Handle window resize to update lines and device changes
        window.addEventListener('resize', debounce(() => {
            positionLabelsAndCreateLines();
        }, 250));

        // Debounce utility function
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Multi-selection functionality for jewellery labels
        document.addEventListener('DOMContentLoaded', function() {
            // Setup jewellery selection functionality
            function setupJewellerySelection() {
                const jewelleryLabels = document.querySelectorAll('.jewellery-label');

                jewelleryLabels.forEach(label => {
                    label.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const checkbox = this.querySelector('.jewellery-checkbox');

                        if (checkbox) {
                            // Toggle checkbox state
                            checkbox.checked = !checkbox.checked;

                            // Toggle visual state
                            if (checkbox.checked) {
                                this.classList.add('selected');
                                // Trigger PostHog event
                                if (typeof posthog !== 'undefined') {
                                    const category = checkbox.value || this.getAttribute('data-type');
                                    const activeOutfit = document.querySelector('.jewelry-card.active');
                                    const model = activeOutfit ? activeOutfit.getAttribute('data-outfit') : 'unknown';
                                    posthog.capture('category-selected', {
                                        category: category,
                                        model: model,
                                        page: 'form',
                                        action: 'selected'
                                    });
                                }
                            } else {
                                this.classList.remove('selected');
                                // Trigger PostHog event for deselection
                                if (typeof posthog !== 'undefined') {
                                    const category = checkbox.value || this.getAttribute('data-type');
                                    const activeOutfit = document.querySelector('.jewelry-card.active');
                                    const model = activeOutfit ? activeOutfit.getAttribute('data-outfit') : 'unknown';
                                    posthog.capture('category-deselected', {
                                        category: category,
                                        model: model,
                                        page: 'form',
                                        action: 'deselected'
                                    });
                                }
                            }

                            // Update selection count display
                            updateSelectionCount();
                        }
                    });

                    // Also handle direct checkbox clicks
                    const checkbox = label.querySelector('.jewellery-checkbox');
                    if (checkbox) {
                        checkbox.addEventListener('change', function(e) {
                            e.stopPropagation();

                            if (this.checked) {
                                label.classList.add('selected');
                            } else {
                                label.classList.remove('selected');
                            }

                            updateSelectionCount();
                        });
                    }
                });
            }

            // Update selection count
            function updateSelectionCount() {
                const selectedCount = document.querySelectorAll('.jewellery-checkbox:checked').length;
                const countDisplay = document.getElementById('selection-count');
                if (countDisplay) {
                    countDisplay.textContent = `${selectedCount} item(s) selected`;
                }

                // Enable/disable next button based on selection
                const nextButton = document.querySelector('button[onclick="nextStep(3)"]');
                if (nextButton) {
                    if (selectedCount > 0) {
                        nextButton.disabled = false;
                        nextButton.classList.remove('opacity-50');
                    } else {
                        nextButton.disabled = true;
                        nextButton.classList.add('opacity-50');
                    }
                }
            }

            // Clear all selections when outfit changes
            function clearAllSelections() {
                const checkboxes = document.querySelectorAll('.jewellery-checkbox');
                const labels = document.querySelectorAll('.jewellery-label');

                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });

                labels.forEach(label => {
                    label.classList.remove('selected');
                });

                updateSelectionCount();
            }

            // Initialize selection functionality
            setupJewellerySelection();

            // Reset selections when outfit changes (attach to existing outfit card click handlers)
            document.addEventListener('click', function(e) {
                if (e.target.closest('.jewelry-card')) {
                    // Optional: Clear selections when changing outfits
                    // Uncomment the next line if you want to clear selections on outfit change
                    // clearAllSelections();
                }
            });

            // Initialize selection count
            updateSelectionCount();

            // Make updateSelectionCount available globally for other functions
            window.updateSelectionCount = updateSelectionCount;
        });

    </script>
</body>

</html>
