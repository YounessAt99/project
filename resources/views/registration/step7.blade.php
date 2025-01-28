<x-guest-layout>
    {{-- token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        .payment-wrapper {
            max-width: 1000px;
            width: 100%;
            height: fit-content;
            margin: 0 auto;
            padding: 0 15px;
            /* overflow: hidden; */
        }

        .payment-wrapper .header {
            text-align: center;
        }

        .payment-wrapper .header .title {
            font-size: 25px;
            font-weight: bold;
        }

        .payment-wrapper .header .title span {
            color: #4A36F1;
        }

        .payment-wrapper .header .desc {
            max-width: 600px;
            margin: 0 auto;
        }

        .payment-wrapper .header .desc span {
            font-weight: bold;
        }

        .payment-wrapper .card-wrapper {
            position: relative;
            width: 100%;
            border: 2px solid #A3D9FC;
            border-radius: 10px;
            padding: 2px 15px;
            margin-top: 30px;
            background-color: #f6fafd
            /* overflow: hidden; */
        }

        .payment-wrapper .card-wrapper .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #DEE6EC;
            height: 50px;
            margin-bottom: 25px;
        }

        .payment-wrapper .card-wrapper .title h2 {
            font-size: 16px;
            color: #4A36F1;
        }

        .payment-wrapper .card-wrapper .title .price {
            display: flex;
            align-items: center;
        }

        .payment-wrapper .card-wrapper .title .price h4 {
            color: #4A36F1;
            font-weight: bold;
            font-size: 25px;
        }

        .payment-wrapper .card-wrapper .title .price .mois {
            display: flex;
            flex-direction: column;
            font-size: 10px;
            color: #35AAF9;
            padding-left: 5px;
        }

        .payment-wrapper .card-wrapper .title .price .mois span {
            font-size: 15px;
        }

        .payment-wrapper .card-wrapper .card-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        @media screen and (max-width: 990px) {
            .payment-wrapper .card-wrapper .card-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .payment-wrapper .card-wrapper .title .price h4 {
                font-size: 20px;
            }

        }

        @media screen and (max-width: 780px) {
            .payment-wrapper .card-wrapper .card-grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .payment-wrapper .card-wrapper .card-grid .card {
            border: none;
        }

        .payment-wrapper .card-wrapper .card-grid .card:not(:last-child) {
            border-right: 2px solid #E3EBF1;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item {
            display: flex;
            align-items: start;
            gap: 10px;
            margin-bottom: 15px;
            padding-right: 10px;
            font-size: 0.9em;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .start-date label {
            font-weight: bold;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .start-date input {
            width: 90%;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            border: 1px solid #4A36F1;
            margin-top: 4px;
            color: #4A36F1;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .icon,
        .payment-wrapper .card-wrapper .card-grid .card .item-bg .title-flex .icon {
            width: 25px;
            height: 25px;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .icon img,
        .payment-wrapper .card-wrapper .card-grid .card .item-bg .title-flex .icon img {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .me {
            width: 100%;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .me .top-title,
        .payment-wrapper .card-wrapper .card-grid .card .item .me .top-title .right {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .me .top-title .left {
            font-weight: bold;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .me .top-title .right,
        .payment-wrapper .card-wrapper .card-grid .card .item .me .flex-detail .left {
            color: #4A36F1;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .me .desc {
            color: #4A36F1;
            padding-top: 1px;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .me .flex-detail {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4px;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .me .offer-detail {
            display: block;
            margin: 10px 0;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .me .flex-detail .right {
            color: #6985A6;
        }

        .payment-wrapper .card-wrapper .bottom-card {
            margin-top: 24px;
            border-top: 2px solid #E3EBF1;
            padding: 20px 10px 50px 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .payment-wrapper .card-wrapper .bottom-card .agree {
            max-width: 400px;
            margin: 0 auto;
            display: flex;
            align-items: start;
            gap: 10px;
            font-size: 12px;
        }

        .payment-wrapper .card-wrapper .bottom-card .valide-info {
            position: absolute;
            bottom: -35px;
            background: #F5F9FB;
            font-size: 0.8em;
            padding: 20px;
            color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 0 rgba(0, 0, 0, 0.1);
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .promo .input-flex input {
            display: flex;
            border: none;
            outline: none;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .promo .input-flex {
            display: flex;
            justify-content: space-between;
            /* border: 1px solid #C0CBDD; */
            padding: 10px 5px;
            color: #C0CBDD;
            font-weight: bold;
            margin: 5px 0;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .promo label {
            font-weight: bold;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .promo .promo-submit {
            color: #ffffff ;
            background-color: #4A36F1;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item .promo small {
            font-size: 10px;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item-bg {
            background: #F5F9FB;
            padding: 8px;
            border-radius: 6px;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item-bg .title-flex {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item-bg .doc-title {
            font-size: 20px;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item-bg .title-flex .icon {
            /* font-size: 20px; */
        }

        .payment-wrapper .card-wrapper .card-grid .card .item-bg .flex-items {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #4A36F1;
            margin-bottom: 15px;
            font-size: 14px;
            padding-left: 35px;
        }

        .payment-wrapper .card-wrapper .card-grid .card .item-bg .flex-items .right {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20px;
            height: 20px;
            background: #CEECFE;
            border-radius: 50%;
            padding: 2px;
        }
    </style>
    <div class="">
        <div class="mb-5">
            {{--  --}}
            <div class="payment-wrapper">
                <div class="header pt-5">
                    <h1 class="title">Recaputilatif et <span>Paiement</span></h1>
                    <p class="desc">
                        Avant de saisir vos données bancaires, prenez soin de
                        <span>bien vérifier toutes les informations relatives à votre
                            contrat</span>
                        et de les corriger le cas échéant.
                    </p>
                </div>
                <div class="card-wrapper mb-4">
                    {{-- form --}}
                    <form method="POST" action="{{ route('register.step' , ['step'=>7]) }}">
                        @csrf
                        <input type="hidden" name="mantant" value="{{ $data['pack']['value'] + $data['sum_guarantees']}} ">
                        <div class="title">
                            <h2 > <b>Mon Assurance pour {{ $data['animalNameType']['animal_name'] }}</b></h2>
                            <div class="price">
                                <h4 class="mad-price"> <span id="prix_mois">{{ $data['pack']['value'] + $data['sum_guarantees'] }}</span> MAD</h4>
                                <div class="mois">
                                    <span class=""><span class="slache">/ </span>mois</span>
                                    <small>soit <small id="prix_an">{{ ($data['pack']['value'] + $data['sum_guarantees']) * 12 }}</small> mad par an</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-grid">
                            <!-- card one -->
                            <div class="card">
                                <div class="item">
                                    <div class="icon">
                                        <img src="/icons/date.svg" />
                                    </div>
                                    {{-- date --}}
                                    <div class="start-date">
                                        <label for="date">Date de début du contrat</label>
                                        <input name="date" type="date" id="date" value="{{ now()->format('Y-m-d') }}" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="icon">
                                        <img src="/icons/client.svg" />
                                    </div>
                                    <div class="me">
                                        <div class="top-title">
                                            <span class="left">Moi</span>
                                        </div>
                                        <span class="desc">
                                            {{-- user info --}}
                                            <div id="userInfo">
                                                @if (Auth::user())
                                                    {{ Auth::user()->name }}
                                                    <br />{{ Auth::user()->email }} <br />
                                                    {{ Auth::user()->client->phone }}
                                                @else
                                                    {{ $data['userInfo']['first_name'].' '.$data['userInfo']['last_name'] }}
                                                    <br />{{ $data['userInfo']['email'] }} <br />
                                                    {{ $data['userInfo']['phone'] }}
                                                @endif
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="icon">
                                        <img src="/icons/home.svg" alt="icon" />
                                    </div>
                                    {{-- adresse --}}
                                    <div class="me">
                                        <div class="top-title">
                                            <span class="left">Adresse</span>
                                        </div>
                                        <div id="address">
                                            <p class="desc">{{ $data['userInfo']['address'] }} <br /></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card two -->
                            <div class="card card2">
                                <div class="item">
                                    <div class="icon">
                                        @if ($data['animalNameType']['animal_type'] == 1)
                                            <img src="/icons/cat-icon.svg" />
                                        @else
                                            <img src="/icons/dog-icon.svg" />
                                        @endif
                                    </div>
                                    <div class="me">
                                        <div class="top-title">
                                            <span class="left">A propos de {{ $data['animalNameType']['animal_name'] }}</span>
                                        </div>
                                        <span class="desc">
                                            {{ $data['ageBreed']['animal_breed'] }} <br />{{ $data['ageBreed']['animal_age'] }} <br />
                                        </span>
                                        <span class="offer-detail">Détails de l'offre</span>
                                        <div class="flex-detail">
                                            <span class="left">Frais médicaux & chirurgicaux</span>
                                            <span class="right">{{ $data['form']->insurance }}</span>
                                        </div>
                                        <div class="flex-detail">
                                            <span class="left">Plafond / an</span>
                                            <span class="right">{{ $data['form']->annual_limit }}</span>
                                        </div>
                                        <div class="flex-detail">
                                            <span class="left">Prévention</span>
                                            <span class="right">50DH</span>
                                        </div>
                                        <div class="flex-detail">
                                            <span class="left">Franchise / année d'assurance</span>
                                            <span class="right">0DH</span>
                                        </div>
                                        <div class="flex-detail">
                                            <span class="left">Franchise / acte</span>
                                            <span class="right">0DH</span>
                                        </div>
                                        <div class="flex-detail">
                                            <span class="left">Plafond de visites / an</span>
                                            <span class="right">ilimite</span>
                                        </div>
                                        <div class="flex-detail">
                                            <span class="left">Jours de carence</span>
                                            <span class="right">60 jours</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card three -->
                            <div class="card card2">
                                {{-- code promo --}}
                                <div class="item">
                                    <div class="icon">
                                        <img src="/icons/code.svg" />
                                    </div>
                                    <div class="promo">
                                        <label for="promo">Code promo <span id="code_show"
                                                class="text-success"></span> </label>
                                        <div class="input-flex">
                                            <input type="text" id="input_code" placeholder="Mon code promo" />
                                            <button type="button" id="btn_code"
                                                class="text-white p-1 promo-submit">Appliquer</button>
                                        </div>
                                        <small>Saisissez votre code promo, puis cliquez sur
                                            *Appliquer*.
                                        </small> <br>
                                        <span id="code_error" class="text-danger"></span>
                                        <span id="code_success" class="text-success"></span>
                                    </div>
                                </div>
                                {{-- doccuments --}}
                                <div class="item-bg">
                                    <div class="title-flex">
                                        <div class="icon">
                                            <img src="/icons/docs.svg" />
                                        </div>
                                        <h3 class="doc-title">Mes documents à télécharger</h3>
                                    </div>
                                    <div class="flex-items">
                                        <a href=""
                                            style="text-decoration: none">
                                            <div class="left">Conditions Générales</div>
                                        </a>
                                        <div class="right">
                                            <img class="w-100" src="/icons/download.svg" alt="" />
                                        </div>
                                    </div>
                                    <div class="flex-items">
                                        <a href=""
                                            style="text-decoration: none">
                                            <div class="left">Document d'information produit </div>
                                        </a>
                                        <div class="right">
                                            <img class="w-100" src="/icons/download.svg" alt="" />
                                        </div>
                                    </div>
                                    <div class="flex-items">
                                        <a href=""
                                            style="text-decoration: none">
                                            <div class="left">Proposition d'assurance </div>
                                        </a>
                                        <div class="right">
                                            <img class="w-100" src="/icons/download.svg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-card">
                            <div class="agree">
                                <input style="" class="mt-5 cursor-pointer" type="checkbox" id="checkbox" name="accept" />
                                <label for="checkbox" class="cursor-pointer text-xs text-gray-700">Je reconnais avoir reçu et j'accepte les Conditions Générales de
                                    mon contrat d'assurance et la Proposition d'Assurance ainsi que les
                                    <span class="text-[#4A36F1]">Conditions Générales d'utilisation du site.</span></label>
                            </div>
                            <button style="background-color: #4A36F1" type="submit" id="submitBtn"
                                class="valide-info" disabled hidden><b>JE VALIDE MES
                                    INFORMATIONS</b></button>
                        </div>
                    </form>
                </div>
            </div>
            @error('accept')
                <div class="text-red-700">{{$message}}</div>
            @enderror
        </div>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script >
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#btn_code').click(function() {
                    var code = $('#input_code').val();
                    // console.log(code);

                    $.ajax({
                        
                        url: "",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            code: code,
                        },
                        success: function(response) {
                            
                            var value = response.value;
                            // Use the value as needed
                            console.log("Returned value:", value);

                            // console.log(response:response);
                            $('#code_error').empty(); // Clear any previous error messages
                            $('#code_success').text('Code applied successfully!');
                            $('#code_show').text(code);
                            $('#input_code').val(''); // Clear the input field on success
                            $('#prix_an').text({{ $data['pack']['value'] * 11 }}).addClass('text-success');
                            $('#prix_mois').text({{ round(($data['pack']['value'] * 11) / 12, 2) }}).addClass('text-success');
                            $('#btn_code').prop('disabled', true);
                            swal("Félicitation!","Vous avez bénéficié d'une réduction pendant un mois entier.","success");

                        },
                        error: function(error) {
                            // console.log(error:error);
                            $('#code_success').empty(); // Clear any previous success messages
                            if (error.responseJSON.errors) {
                                $('#code_error').html(error.responseJSON.errors.code)
                            }
                        },
                    });

                });
            });
        </script>

        <script>
            
            // button validate
            document.addEventListener('DOMContentLoaded', function() {
                var checkbox = document.getElementById('checkbox');
                var submitBtn = document.getElementById('submitBtn');

                checkbox.addEventListener('change', function() {
                    if (checkbox.checked) {
                        submitBtn.disabled = false;
                        submitBtn.hidden = false;
                    } else {
                        submitBtn.disabled = true;
                        submitBtn.hidden = true;
                    }
                });
            });
        </script>
    </div>
</x-guest-layout>