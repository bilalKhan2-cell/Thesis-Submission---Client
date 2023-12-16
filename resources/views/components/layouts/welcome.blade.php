<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Sindh University Online Thesis Submission Portal') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />


    @livewire('footer')
    @livewireStyles
</head>

<body class="bg-white">
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">{{ __('Thesis Submission Portal') }}</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{route('supervisors.login')}}" wire:navigate>{{ __('Team/Supervisor Login') }}</a></li>
                    <li><a class="nav-link scrollto" href="{{route('members.page')}}" wire:navigate>{{ __('Team Member Login') }}</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>

    <main id="main">
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{ __('About Us') }}</h2>
                    <p>{{ __('An Online and Easy-To-Use Solutions For Management of Your Thesis') }} </p>
                </div>

                <div class="row content">
                    <div class="col-lg-12">
                        <p>
                            {{ __('A Portal With Different Users and Their Roles Management.') }}
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i>
                                {{ __('Team Lead: Can See Its Team Memebers Name and Roll No. Can Submit can Check Thesis Status and Result') }}
                            </li>
                            <li><i class="ri-check-double-line"></i>
                                {{ __('Supervisor: Can See What Teams for Current Years are Assigned To It and Manage Their Thesis Checking and Result Submission') }}
                            </li>
                            <li><i class="ri-check-double-line"></i>
                                {{ __('Team Member: Can See On Which Team They Are, Their Thesis Status and Check Result') }}
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
    </main>

    {{ $slot }}
</body>
@livewireScripts

</html>
