<x-guest-layout>

    <div class="max-w-3xl mx-auto bg-gradient-to-r from-indigo-50 to-white border-2 border-indigo-500 rounded-xl shadow-2xl p-5">
        <div class="text-center">
            <h3 class="text-4xl font-extrabold text-indigo-700 mb-4">Inscription Complétée !</h3>
            <div class="w-24 mx-auto border-b-4 border-indigo-600 mb-6"></div>
            <img src="{{ asset('images/email.webp') }}" alt="Email Sent" class="w-36 mx-auto mb-6" />
        </div>
    
        <div class="space-y-6">
            <p class="text-gray-600 text-xl text-center">
                <span class="font-bold text-indigo-700">Félicitations !</span><br>
                Vous avez complété votre inscription avec succès.
            </p>
    
            <p class="text-gray-500 text-lg text-center">
                Un e-mail contenant les détails pour vous connecter à votre compte a été envoyé à l'adresse que vous avez fournie.
            </p>
    
            <p class="text-gray-500 text-lg text-center">
                Si vous ne voyez pas l'e-mail, n'oubliez pas de vérifier vos spams ou de demander un renvoi du lien de connexion.
            </p>
        </div>
    
        <div class="mt-8">
            <h4 class="font-semibold text-2xl text-indigo-600 text-center mb-6">Prochaines Étapes</h4>
            <div class="space-y-4">
                <p class="text-gray-600 text-lg text-center">1. Vérifiez votre boîte de réception pour l'e-mail de connexion.</p>
                <p class="text-gray-600 text-lg text-center">2. Utilisez les identifiants de connexion pour accéder à votre compte.</p>
            </div>
        </div>
    
        <div class="mt-8 text-center border border-teal-200"> </div>
    
        <div class="mt-4 text-center text-sm text-gray-500">
            <p>Pour toute question, contactez notre support à <span class="text-indigo-600 font-semibold">support@votresite.com</span>.</p>
        </div>
    </div>
    
</x-guest-layout>

