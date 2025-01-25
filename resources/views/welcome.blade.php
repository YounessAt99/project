<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    

    <body class="bg-gray-50 font-sans leading-relaxed">
        <header class="bg-indigo-600 text-white">
            <div class="container mx-auto flex justify-between items-center p-6">
                <h1 class="text-2xl font-bold flex">
                    Asheel <img class="w-6" src="{{ asset('images/logo.png') }}" alt="logo">
                </h1>
                <nav>
                    <a href="#services" class="text-white hover:text-indigo-200 px-4 transition duration-300">Services</a>
                    <a href="#about" class="text-white hover:text-indigo-200 px-4 transition duration-300">À propos</a>
                    <a href="#contact" class="text-white hover:text-indigo-200 px-4 transition duration-300">Contact</a>
                </nav>
            </div>
        </header>
    
        <!-- Hero Section -->
        <section id="hero" class="bg-gray-100 py-24">
            <div class="container mx-auto text-center">
                <h2 class="text-5xl font-extrabold text-gray-800">Protégez vos compagnons</h2>
                <p class="text-lg text-gray-600 mt-4">Découvrez nos assurances spécialement conçues pour les chats et les chiens.</p>
                <a href="#services" class="mt-6 inline-block bg-indigo-600 text-white px-8 py-4 rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">Découvrir nos offres</a>
            </div>
        </section>
    
        <!-- Services Section -->
        <section id="services" class="max-w-screen-xl mx-auto px-6 py-16">
            <div class="text-center">
                <h2 class="text-4xl font-extrabold text-gray-800">Nos Services</h2>
                <p class="mt-4 text-lg text-gray-500">Choisissez l'assurance qui convient le mieux à votre animal.</p>
            </div>
        
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
                <!-- Service Card - Confort -->
                <div class="bg-white border border-indigo-100 rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-indigo-700 text-white p-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-2xl font-semibold">Confort</h3>
                            <div class="text-right">
                                <h4 class="text-4xl font-bold">75%</h4>
                                <span class="text-sm">par mois</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 bg-gray-50">
                        <p class="text-gray-700 mb-4">Couverture jusqu'à 75% des frais vétérinaires.</p>
                        <p class="text-gray-700 mb-4">Limite annuelle : 10,000 DH</p>
                        <p class="text-gray-700 mb-6">Non applicable pour les soins dentaires et préventifs.</p>
                        <ul class="space-y-3 text-gray-700">
                            <li>Consultations : Inclus</li>
                            <li>Hospitalisation : Inclus</li>
                            <li>Pharmacie : Inclus</li>
                            <li>Stérilisation : Non inclus</li>
                            <li>Vaccins : Non inclus</li>
                            <li>Vermifuges : Non inclus</li>
                            <li>Compléments alimentaires : Non inclus</li>
                            <li>Détartrage : Non inclus</li>
                        </ul>
                    </div>
                </div>
        
                <!-- Service Card - Complet -->
                <div class="bg-white border border-indigo-100 rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-indigo-700 text-white p-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-2xl font-semibold">Complet</h3>
                            <div class="text-right">
                                <h4 class="text-4xl font-bold">80%</h4>
                                <span class="text-sm">par mois</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 bg-gray-50">
                        <p class="text-gray-700 mb-4">Couverture jusqu'à 80% des frais vétérinaires.</p>
                        <p class="text-gray-700 mb-4">Limite annuelle : 12,000 DH</p>
                        <p class="text-gray-700 mb-6">Inclut les soins dentaires, mais non applicable pour les soins préventifs.</p>
                        <ul class="space-y-3 text-gray-700">
                            <li>Consultations : Inclus</li>
                            <li>Hospitalisation : Inclus</li>
                            <li>Pharmacie : Inclus</li>
                            <li>Stérilisation : Inclus</li>
                            <li>Vaccins : Inclus</li>
                            <li>Vermifuges : Inclus</li>
                            <li>Compléments alimentaires : Non inclus</li>
                            <li>Détartrage : Non inclus</li>
                        </ul>
                    </div>
                </div>
        
                <!-- Service Card - Premium -->
                <div class="bg-white border border-indigo-100 rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="bg-indigo-700 text-white p-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-2xl font-semibold">Premium</h3>
                            <div class="text-right">
                                <h4 class="text-4xl font-bold">90%</h4>
                                <span class="text-sm">par mois</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 bg-gray-50">
                        <p class="text-gray-700 mb-4">Couverture jusqu'à 90% des frais vétérinaires.</p>
                        <p class="text-gray-700 mb-4">Limite annuelle : 15,000 DH</p>
                        <p class="text-gray-700 mb-6">Inclut tous les soins vétérinaires, y compris dentaires et préventifs.</p>
                        <ul class="space-y-3 text-gray-700">
                            <li>Consultations : Inclus</li>
                            <li>Hospitalisation : Inclus</li>
                            <li>Pharmacie : Inclus</li>
                            <li>Stérilisation : Inclus</li>
                            <li>Vaccins : Inclus</li>
                            <li>Vermifuges : Inclus</li>
                            <li>Compléments alimentaires : Inclus</li>
                            <li>Détartrage : Inclus</li>
                        </ul>
                    </div>
                </div>
            </div>
        
            <div class="mt-10 text-center">
                <a href="{{url('register/step/1')}}" class="text-indigo-700 font-semibold text-xl hover:underline">Choisissez votre offre</a>
            </div>
        </section>
    
        <!-- About Section -->
        <section id="about" class="bg-gray-100 py-24">
            <div class="container mx-auto text-center">
                <h3 class="text-3xl font-semibold text-gray-800">À propos de nous</h3>
                <p class="text-lg text-gray-600 mt-4 max-w-3xl mx-auto">Nous sommes une entreprise dédiée à offrir les meilleures solutions d'assurance pour vos compagnons à quatre pattes. Notre mission est de garantir leur bien-être tout en vous offrant la tranquillité d'esprit.</p>
            </div>
        </section>
    
        <!-- Contact Section -->
        <section id="contact" class="py-24 bg-indigo-50">
            <div class="container mx-auto text-center">
                <h3 class="text-3xl font-semibold text-gray-800">Contactez-nous</h3>
                <p class="text-lg text-gray-600 mt-4">Vous avez une question ? N'hésitez pas à nous écrire.</p>
                <form action="#" class="mt-6 max-w-xl mx-auto">
                    <div class="grid grid-cols-1 gap-6">
                        <input type="text" name="name" placeholder="Votre nom" class="w-full border border-gray-300 rounded-lg p-4 text-gray-700" required>
                        <input type="email" name="email" placeholder="Votre email" class="w-full border border-gray-300 rounded-lg p-4 text-gray-700" required>
                        <textarea name="message" placeholder="Votre message" rows="6" class="w-full border border-gray-300 rounded-lg p-4 text-gray-700" required></textarea>
                    </div>
                    <button type="submit" class="mt-6 bg-indigo-600 text-white px-8 py-4 rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">Envoyer</button>
                </form>
            </div>
        </section>
    
        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="container mx-auto text-center">
                <p>&copy; 2025 Asheel. Tous droits réservés.</p>
            </div>
        </footer>
    </body>
    
</html>
