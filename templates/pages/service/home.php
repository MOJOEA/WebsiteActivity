<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>EventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- HERO SECTION -->
    <?php include __DIR__ . '/../../partials/header.php'; ?>
    <div class="flex bg-gray-100">
        <?php include __DIR__ . '/../../partials/sidebar.php'; ?>
        <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <main class="bg-gray-50 text-gray-800 flex-1 p-8">
            <section class="bg-[radial-gradient(circle_at_center,_#ffffff_0%,_#dbeafe_80%,_#bfdbfe_150%)] py-24">
                <!-- =============================================================================================== -->
                <div class="max-w-6xl mx-auto text-center px-6">
                    <!-- ------------------------------------------------------------------------------------------- -->
                    <span class="inline-block bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm mb-6">
                        ✨ #1 Event Registration Platform
                    </span>
                    <!-- ------------------------------------------------------------------------------------------- -->
                    <h1 class="text-5xl font-bold leading-tight">
                        Discover and Join <br>
                        <span class="text-blue-600">Events You Love</span>
                    </h1>
                    <!-- ------------------------------------------------------------------------------------------- -->
                    <p class="mt-6 text-gray-600 max-w-2xl mx-auto">
                        Create your own events or join exciting ones.
                        Meet new people and build meaningful experiences together.
                    </p>
                    <!-- ------------------------------------------------------------------------------------------- -->
                    <div class="mt-10 flex justify-center gap-4">
                        <a href="#" class="bg-blue-600 text-white px-8 py-4 rounded-xl shadow-lg hover:bg-blue-700 transition">
                            View All Events →
                        </a>
                        <!-- --------------------------------------------------------------------------------------- -->
                        <a href="#" class="border border-gray-300 px-8 py-4 rounded-xl hover:bg-gray-100 transition">
                            Sign Up for Free
                        </a>
                    </div>
                    <!-- ------------------------------------------------------------------------------------------- -->
                </div>
                <!-- =============================================================================================== -->
            </section>
            <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <!-- WHY SECTION -->
            <section class="py-20">
                <!-- =============================================================================================== -->
                <div class="max-w-6xl mx-auto px-6 text-center">
                    <!-- ------------------------------------------------------------------------------------------- -->
                    <h2 class="text-4xl font-bold mb-4">Why Choose EventHub?</h2>
                    <!-- ------------------------------------------------------------------------------------------- -->
                    <p class="text-gray-600 mb-12">
                        We make event management simple, whether you are an organizer or a participant.
                    </p>
                    <!-- ------------------------------------------------------------------------------------------- -->
                    <!-- =============================================================================================== -->
                    <div class="grid md:grid-cols-3 gap-8">
                        <!-- ------------------------------------------------------------------------------------------- -->
                        <div class="bg-gray-100 p-10 rounded-2xl shadow-[0_0_20px_5px_rgba(59,130,246,0.25)]">
                            <div class="text-blue-600 text-4xl mb-4">📅</div>
                            <h3 class="font-bold text-xl mb-3">Easy Event Creation</h3>
                            <p class="text-gray-600">Create your event in just a few clicks with detailed information and images.</p>
                        </div>
                        <!-- ------------------------------------------------------------------------------------------- -->
                        <div class="bg-gray-100 p-10 rounded-2xl shadow-[0_0_20px_5px_rgba(59,130,246,0.25)]">
                            <div class="text-blue-600 text-4xl mb-4">👥</div>
                            <h3 class="font-bold text-xl mb-3">Participant Management</h3>
                            <p class="text-gray-600">View and manage your participants efficiently.</p>
                        </div>
                        <!-- ------------------------------------------------------------------------------------------- -->
                        <div class="bg-gray-100 p-10 rounded-2xl shadow-[0_0_20px_5px_rgba(59,130,246,0.25)]">
                            <div class="text-blue-600 text-4xl mb-4">📍</div>
                            <h3 class="font-bold text-xl mb-3">Discover Events</h3>
                            <p class="text-gray-600">Find interesting events and join instantly.</p>
                        </div>
                    </div>
                    <!-- ------------------------------------------------------------------------------------------- -->
                </div>
                <!-- =============================================================================================== -->
            </section>
            <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <!-- STATS -->
            <section class="bg-blue-600 text-white py-16">
                <!-- =============================================================================================== -->
                <div class="max-w-6xl mx-auto grid md:grid-cols-3 text-center gap-8 px-6">
                    <!-- ------------------------------------------------------------------------------------------- -->
                    <div>
                        <h3 class="text-5xl font-bold">100+</h3>
                        <p class="mt-2">Events Created</p>
                    </div>
                    <!-- ------------------------------------------------------------------------------------------- -->
                    <div>
                        <h3 class="text-5xl font-bold">500+</h3>
                        <p class="mt-2">Registered Users</p>
                    </div>
                    <!-- ------------------------------------------------------------------------------------------- -->
                    <div>
                        <h3 class="text-5xl font-bold">1,000+</h3>
                        <p class="mt-2">Event Participations</p>
                    </div>
                    <!-- ------------------------------------------------------------------------------------------- -->
                </div>
                <!-- =============================================================================================== -->
            </section>
            <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <!-- FEATURE DETAIL -->
            <section class="py-24 bg-gray-50 bg-gradient-to-t from-blue-200 via-blue-100 to-white py-24">
                <!-- =============================================================================================== -->
                <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
                    <div>
                        <!-- ------------------------------------------------------------------------------------------- -->
                        <h2 class="text-4xl font-bold mb-6">
                            Create Great Experiences <br>
                            <span class="text-blue-600">With the Events You Love</span>
                        </h2>
                        <!-- ------------------------------------------------------------------------------------------- -->
                        <p class="text-gray-600 mb-8">
                            Whether it’s a workshop, party, or small group gathering,
                            EventHub helps you manage everything effortlessly.
                        </p>
                        <!-- ------------------------------------------------------------------------------------------- -->
                        <ul class="space-y-6">
                            <li class="flex items-start gap-4 bg-white p-4 rounded-lg shadow-sm">
                                <div class="text-blue-600 text-2xl">✨</div>
                                <div>
                                    <h4 class="font-bold">Free to Use</h4>
                                    <p class="text-gray-600">Create and join unlimited events.</p>
                                </div>
                            </li>
                            <!-- ------------------------------------------------------------------------------------------- -->
                            <li class="flex items-start gap-4 bg-white p-4 rounded-lg shadow-sm">
                                <div class="text-blue-600 text-2xl">🛡</div>
                                <div>
                                    <h4 class="font-bold">Secure</h4>
                                    <p class="text-gray-600">Your data is well protected.</p>
                                </div>
                            </li>
                            <!-- ------------------------------------------------------------------------------------------- -->
                            <li class="flex items-start gap-4 bg-white p-4 rounded-lg shadow-sm">
                                <div class="text-blue-600 text-2xl">⚡</div>
                                <div>
                                    <h4 class="font-bold">Fast & Reliable</h4>
                                    <p class="text-gray-600">The system runs quickly and smoothly.</p>
                                </div>
                            </li>
                        </ul>
                        <!-- ------------------------------------------------------------------------------------------- -->
                    </div>
                    <!-- =============================================================================================== -->
                    <div class="bg-white shadow-xl rounded-2xl p-10">
                        <div class="space-y-6">
                            <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                            <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                            <div class="h-4 bg-gray-200 rounded w-full"></div>
                            <div class="h-4 bg-gray-200 rounded w-2/3"></div>
                            <div class="h-4 bg-gray-200 rounded w-5/6"></div>
                            <div class="h-4 bg-gray-200 rounded w-1/3"></div>
                        </div>
                    </div>
                </div>
                <!-- =============================================================================================== -->
            </section>
            <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <!-- CTA -->
            <section class="py-24 text-center bg-white">
                <!-- ------------------------------------------------------------------------------------------- -->
                <h2 class="text-4xl font-bold mb-4">Ready to Get Started?</h2>
                <!-- ------------------------------------------------------------------------------------------- -->
                <p class="text-gray-600 mb-8">
                    Sign up today and start creating or joining events now.
                </p>
                <!-- ------------------------------------------------------------------------------------------- -->
                <a href="#" class="bg-blue-600 text-white px-10 py-4 rounded-xl shadow-lg hover:bg-blue-700 transition">
                    Start for Free →
                </a>
                <!-- ------------------------------------------------------------------------------------------- -->
            </section>
            <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        </main>
    </div>
    <?php include __DIR__ . '/../../partials/footer.php'; ?>
</body>

</html>