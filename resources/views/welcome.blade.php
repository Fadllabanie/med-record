<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tails Downloaded File</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css">
</head>
<body>

<!-- Section 1 -->
<section class="w-full antialiased bg-cover bg-center" style="background-image: url('images/hero.png'); background-color: #673eb1;">
    <div class="mx-auto max-w-7xl">
        <nav class="flex items-center w-full h-24 select-none" x-data="{ showMenu: false }">
            <div class="relative flex flex-wrap items-center justify-between w-full h-24 mx-auto font-medium md:justify-center">
                <a href="#_" class="w-1/4 px-2 md:px-2 sm:mx-0">
                    <img src="images/logo.svg" />
                </a>
                <div class="fixed top-0 left-0 z-40 items-center hidden w-full h-full p-3 text-xl bg-gray-900 bg-opacity-50 md:text-sm lg:text-base md:w-3/4 md:bg-transparent md:p-0 md:relative md:flex" :class="{'flex': showMenu, 'hidden': !showMenu }">
                    <div class="flex-col w-full h-auto h-full overflow-hidden bg-white rounded-lg select-none md:bg-transparent md:rounded-none md:relative md:flex md:flex-row md:overflow-auto">
                        <div class="flex flex-col items-center justify-center w-full h-full mt-12 text-center text-indigo-700 md:text-indigo-200 md:w-2/3 md:mt-0 md:flex-row md:items-center uppercase">
                            <a href="#" class="inline-block px-4 py-2 mx-2 font-medium text-left text-indigo-500 md:text-yellow-500 md:px-0 lg:mx-3 md:text-center">Home</a>
                            <a href="#" class="inline-block px-0 px-4 py-2 mx-2 font-medium text-left md:px-0 hover:text-yellow-500 lg:mx-3 md:text-center">About</a>
                            <a href="#" class="inline-block px-0 px-4 py-2 mx-2 font-medium text-left md:px-0 hover:text-yellow-500 lg:mx-3 md:text-center">Features</a>
                            <a href="#" class="inline-block px-0 px-4 py-2 mx-2 font-medium text-left md:px-0 hover:text-yellow-500 lg:mx-3 md:text-center">Services</a>
                            <a href="#" class="inline-block px-0 px-4 py-2 mx-2 font-medium text-left md:px-0 hover:text-yellow-500 lg:mx-3 md:text-center">Contact us</a>
                        </div>
                    </div>
                </div>
                <div @click="showMenu = !showMenu" class="absolute right-0 z-50 flex flex-col items-end w-10 h-10 p-2 mr-4 rounded-full cursor-pointer md:hidden hover:bg-gray-900 hover:bg-opacity-10" :class="{ 'text-gray-400': showMenu, 'text-gray-100': !showMenu }">
                    <svg class="w-6 h-6" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak="">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-6 h-6" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak="">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </div>
        </nav>
        <div class="container py-32 mx-auto text-left sm:px-4 px-2">
            <h1 class="text-3xl font-bold leading-10 tracking-tight text-white sm:leading-none md:text-5xl">
                <span class="block">All your</span>
                <span class="relative block mt-3 text-transparent text-white">medical records</span>
                <span class="relative block mt-3 text-transparent text-white">in one place</span>
            </h1>
            <button class="px-20 py-2 mt-8 text-base font-medium leading-6 text-white whitespace-no-wrap bg-yellow-500 border border-transparent rounded-xl shadow-xl hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-600">Get App</button>
        </div>
    </div>
</section>

<!-- Section 2 -->
<section class="py-8 leading-7 text-gray-900 bg-white sm:py-12 md:py-16 lg:py-24">
    <div class="box-border px-4 mx-auto border-solid sm:px-6 md:px-6 lg:px-8 max-w-7xl">
        <div class="flex flex-col items-center leading-7 text-center text-gray-900 border-0 border-gray-200">
            <h2 class="box-border m-0 text-3xl font-medium leading-tight tracking-tight text-black border-solid sm:text-4xl md:text-5xl">
                Our Services
            </h2>
        </div>
        <div class="grid grid-cols-1 gap-4 mt-4 leading-7 text-gray-900 border-0 border-gray-200 sm:mt-6 sm:gap-6 md:mt-8 md:gap-0 lg:grid-cols-3">
            <!-- Price 1 -->
            <div class="relative z-10 flex flex-col items-center max-w-md p-4 mx-auto my-0 rounded-lg lg:-mr-3 sm:my-0 sm:p-6 md:my-8 md:p-8 shadow-2xl">
                <img src="images/reliable.svg" class="h-32 mb-5"  />
                <h3 class="m-0 text-2xl leading-tight tracking-tight text-black sm:text-3xl uppercase">
                    Reliable
                </h3>
                <p class="mt-6 mb-5 text-base leading-normal text-center text-gray-500">
                    customize app according to your specialization and your own vision
                </p>
            </div>
            <!-- Price 2 -->
            <div class="relative z-20 flex flex-col items-center max-w-md p-4 mx-auto my-0 bg-gradient-to-b from-purple-800 to-purple-500 rounded-lg sm:p-6 md:px-8 md:py-16 shadow-2xl">
                <img src="images/quick.svg" class="h-32 mb-5"  />
                <h3 class="m-0 text-2xl leading-tight tracking-tight text-indigo-50 sm:text-3xl uppercase">
                    Quick & Easy
                </h3>
                <p class="mt-6 mb-5 text-base leading-normal text-center text-indigo-50">
                    follow up on patient records offline and respond to their inquiries at any time and from anywhere
                </p>
            </div>
            <!-- Price 3 -->
            <div class="relative z-10 flex flex-col items-center max-w-md p-4 mx-auto my-0 rounded-lg lg:-ml-3 sm:my-0 sm:p-6 md:my-8 md:p-8 shadow-2xl">
                <img src="images/secure.svg" class="h-32 mb-5"  />
                <h3 class="m-0 text-2xl leading-tight tracking-tight text-black sm:text-3xl uppercase">
                    Secure
                </h3>
                <p class="mt-6 mb-5 text-base leading-normal text-left text-gray-500 border-0">
                    Secure and confidential cloud storage of all records
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section 3 -->
<section class="w-full bg-gray-50 pt-7 pb-7 md:pt-20 md:pb-24">
    <div class="box-border flex flex-col items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16">

        <!-- Image -->
        <div class="box-border relative w-full max-w-md px-4 mt-5 mb-4 -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 ">
            <img src="https://cdn.devdojo.com/images/december2020/productivity.png" class="p-2 pl-6 pr-5   ">
        </div>

        <!-- Content -->
        <div class="box-border order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
            <h2 class="m-0 text-xl font-semibold leading-tight lg:text-3xl md:text-2xl text-indigo-900">
                About medreco
            </h2>
            <p class="pt-4 pb-8 m-0 leading-7 text-gray-500 sm:pr-12  lg:text-lg">
                follow up on patient records offline and respond to their inquiries at any time and from anywhere
            </p>
        </div>
        <!-- End  Content -->
    </div>
</section>

<section class="w-full bg-white pb-7 md:pb-24">
<div class="box-border flex flex-col items-center content-center px-8 mx-auto mt-2 leading-6 text-black border-0 border-gray-300 border-solid md:mt-20  md:flex-row max-w-7xl lg:px-16">

        <!-- Content -->
        <div class="box-border w-full text-black border-solid md:w-1/2 md:pl-6 ">
            <h2 class="m-0 text-xl font-semibold leading-tight text-indigo-900 lg:text-3xl md:text-2xl">
                Features
            </h2>
            <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-10 lg:text-lg">
                follow up on patient records offline and respond to their inquiries at any time and from anywhere
            </p>
            <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-indigo-900"><span class="text-sm font-bold">✓</span></span> Backup Data
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-indigo-900"><span class="text-sm font-bold">✓</span></span> Attatch Documents
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-indigo-900"><span class="text-sm font-bold">✓</span></span> Export Data To Excel
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-indigo-900"><span class="text-sm font-bold">✓</span></span> Multible Search Techniques
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-indigo-900"><span class="text-sm font-bold">✓</span></span> Printing Reprots
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-indigo-900"><span class="text-sm font-bold">✓</span></span> Managing Appointments
                </li>
            </ul>
        </div>
        <!-- End  Content -->

        <!-- Image -->
        <div class="box-border relative w-full max-w-md mt-10 text-center bg-left-bottom bg-cover border-solid md:mt-0 md:max-w-none lg:mb-0 md:w-1/2">
            <img src="images/features.png">
        </div>
    </div>
</section>

<!-- Section 5 -->
<section class="py-8 leading-7 text-gray-900 bg-gray-50 sm:py-12 md:py-16 lg:py-24">
    <div class="box-border px-4 mx-auto border-solid sm:px-6 md:px-6 lg:px-8 max-w-7xl">
        <div class="flex flex-col items-center leading-7 text-center text-gray-900 border-0 border-gray-200">
            <h2 class="box-border m-0 text-3xl font-medium leading-tight tracking-tight text-black border-solid sm:text-4xl md:text-5xl">
                Pricing Plans
            </h2>
        </div>
        <div class="grid grid-cols-1 gap-4 mt-4 leading-7 text-gray-900 border-0 border-gray-200 sm:mt-6 sm:gap-6 md:mt-8 md:gap-0 lg:grid-cols-3">
            <!-- Price 1 -->
            <div class="relative z-10 flex flex-col items-center max-w-md p-4 mx-auto my-0 rounded-lg lg:-mr-3 sm:my-0 sm:p-6 md:my-8 md:p-8 bg-white shadow">
                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-gray-200 sm:text-3xl md:text-4xl">
                    Starter
                </h3>
                <div class="flex items-end mt-6 leading-7 text-gray-900 border-0 border-gray-200">
                    <p class="box-border m-0 text-6xl font-semibold leading-none border-solid">
                        $5
                    </p>
                    <p class="box-border m-0 border-solid" style="border-image: initial;">
                        / month
                    </p>
                </div>
                <ul class="flex-1 p-0 mt-4 ml-5 leading-7 text-gray-900 border-0 border-gray-200">
                    <li class="inline-flex items-center block w-full mb-2 ml-5 font-semibold text-left border-solid">
                        <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-purple-600 sm:h-5 sm:w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        10 Patients profiles
                    </li>
                </ul>
                <button class="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center bg-purple-700 text-white no-underline border border-purple-600 rounded-md cursor-pointer hover:bg-white hover:border-purple-700 hover:text-purple-700 focus-within:bg-white focus-within:border-purple-700 focus-within:text-purple-700 sm:text-base md:text-lg">
                    Select Plan
                </button>
            </div>
            <!-- Price 2 -->
            <div class="relative z-20 flex flex-col items-center max-w-md p-4 mx-auto my-0 bg-gradient-to-b from-purple-800 to-purple-500  rounded-lg sm:p-6 md:px-8 md:py-16 shadow">
                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-white border-0 border-gray-200 sm:text-3xl md:text-4xl">
                    Basic
                </h3>
                <div class="flex items-end mt-6 leading-7 text-white">
                    <p class="box-border m-0 text-6xl font-semibold leading-none border-solid">
                        $15
                    </p>
                    <p class="box-border m-0 border-solid" style="border-image: initial;">
                        / month
                    </p>
                </div>
                <ul class="flex-1 p-0 mt-4 leading-7 text-white border-0">
                    <li class="inline-flex items-center block w-full mb-2 ml-5 font-semibold text-left border-solid">
                        <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-white sm:h-5 sm:w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        10 Patients profiles
                    </li>
                    <li class="inline-flex items-center block w-full mb-2 ml-5 font-semibold text-left border-solid">
                        <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-white sm:h-5 sm:w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Cloud storage
                    </li>
                </ul>
                <button class="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center text-white no-underline border rounded-md cursor-pointer hover:bg-purple-700 hover:border-purple-700 hover:text-white focus-within:bg-purple-700 focus-within:border-purple-700 focus-within:text-white sm:text-base md:text-lg">
                    Select Plan
                </button>
            </div>
            <!-- Price 3 -->
            <div class="relative z-10 flex flex-col items-center max-w-md p-4 mx-auto my-0 rounded-lg lg:-ml-3 sm:my-0 sm:p-6 md:my-8 md:p-8 bg-white shadow">
                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-gray-200 sm:text-3xl md:text-4xl">
                    Plus
                </h3>
                <div class="flex items-end mt-6 leading-7 text-gray-900 border-0 border-gray-200">
                    <p class="box-border m-0 text-6xl font-semibold leading-none border-solid">
                        $25
                    </p>
                    <p class="box-border m-0 border-solid" style="border-image: initial;">
                        / month
                    </p>
                </div>
                <ul class="flex-1 p-0 mt-4 leading-7 text-gray-900 border-0 border-gray-200">
                    <li class="inline-flex items-center block w-full mb-2 ml-5 font-semibold text-left border-solid">
                        <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-purple-600 sm:h-5 sm:w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        12 month support
                    </li>
                    <li class="inline-flex items-center block w-full mb-2 ml-5 font-semibold text-left border-solid">
                        <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-purple-600 sm:h-5 sm:w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Unlimited patients profiles
                    </li>
                    <li class="inline-flex items-center block w-full mb-2 ml-5 font-semibold text-left border-solid">
                        <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-purple-600 sm:h-5 sm:w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Cloud storage
                    </li>
                </ul>
                <button class="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center bg-purple-700 text-white no-underline border border-purple-600 rounded-md cursor-pointer hover:bg-white hover:border-purple-700 hover:text-purple-700 focus-within:bg-white focus-within:border-purple-700 focus-within:text-purple-700 sm:text-base md:text-lg">
                    Select Plan
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Section 6 -->
<section class="py-8 leading-7 text-gray-900 bg-white sm:py-12 md:py-16 lg:py-24">
    <div class="max-w-6xl px-4 px-10 mx-auto border-solid lg:px-12">
        <div class="flex flex-col items-start leading-7 text-gray-900 border-0 border-gray-200 lg:items-center lg:flex-row">
            <div class="box-border flex-1 text-center border-solid sm:text-left">
                <h2 class="m-0 text-4xl font-medium leading-tight tracking-tight text-left text-black border-0 border-gray-200">
                    Available At Google Play <br> Get It Now
                </h2>
                <p class="mt-5 text-xl text-left text-gray-600">
                    follow up on patient records offline and respond to <br> their inquiries at any time and from anywhere
                </p>
            </div>
            <a href="#_" class="inline-flex items-center justify-center w-full px-8 py-2 mt-6 ml-0 font-sans text-center leading-none text-white no-underline bg-purple-700 border border-purple-700 border-solid rounded-xl shadow-xl cursor-pointer md:w-auto lg:mt-0 hover:bg-purple-800 hover:border-purple-800 hover:text-white focus-within:bg-purple-800 focus-within:border-purple-800 focus-within:text-white sm:text-lg lg:ml-6 md:text-xl">
                <img src="images/google-play.svg" class="mr-5" /> Get it on <br/> Google Play
            </a>
        </div>
    </div>
</section>

<!-- Section 12 -->
<section class="bg-gradient-to-b from-purple-800 to-purple-500">
    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
        <div class="flex justify-center -mx-5 -my-2">
            <img src="images/logo.svg" class="h-10" />
        </div>
        <div class="flex justify-center mt-8 space-x-6">
            <a href="#">
                <img src="images/Facebook.svg" class="h-10">
            </a>
            <a href="#">
                <img src="images/Twitter.svg" class="h-10">
            </a>
            <a href="#">
                <img src="images/Instagram.svg" class="h-10">
            </a>
        </div>
        <p class="mt-8 text-base leading-6 text-center text-white">
            Copyrights 2021 Medreco. All Rights Reserved
        </p>
    </div>
</section>

<!-- AlpineJS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>

</body>
</html>