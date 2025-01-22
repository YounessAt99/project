<x-guest-layout>
    <style>
        /* General styles */
        .cards-container {
            max-width: 900px;
            margin: 0 auto;
            /* background: #F1F1F1; */
            padding: 50px 10px 10px 10px;
        }

        .title {
            text-align: center;
            font-size: 40px;
            max-width: 550px;
            margin: 0 auto;
        }

        /* Radio tile styles */
        .radio-tile-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        @media screen and (max-width: 990px) {
            .radio-tile-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media screen and (max-width: 780px) {
            .radio-tile-cards {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .bull-container {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F1F1F1;
            border: 1px solid #ddd;
        }

        .bull-container .bull {
            transition: all 0.3s ease;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        /* Radio input styles */
        .radio-tile-cards input[type="radio"] {
            display: none;
        }

        .radio-tile {
            position: relative;
            border: 2px solid #ddd;
            background: white;
            border-radius: 8px;
            padding: 15px;
            height: 340px;
            width: 100%;
            display: block;
            transition: all 0.5s ease-in-out;
        }

        .head-card {
            border-bottom: 2px solid #ddd;
            display: flex;
            justify-content: space-between;
        }

        .head-card .left {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .head-card .left .fav {
            border: 1px solid #ddd;
            background: #de969629;
            color: deeppink;
            border-radius: 30px;
            font-size: 8px;
            padding: 1px 5px;
            /* margin-bottom: 0px */
        }

        .head-card .price {
            color: #4A36F1;
        }

        .body-card {
            /* padding-top: 30px; */
            /* border-top:  2px solid #ddd;  */
            font-size: 12px;
        }

        .body-card .item {
            display: flex;
            gap: 8px;
            margin-bottom: 5px;
        }

        .body-card .item.desactive {
            color: #bbb;
        }

        .footer-card {
            border-top: 2px solid #ddd;
            padding-top: 10px;
            margin-top: 5px;
            font-size: 12px;
        }

        .footer-card .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 2px;
        }

        .footer-card .row .titre {
            display: inline-block;
            color: #bbb;
        }

        .input-container label {
            cursor: pointer;
        }

        /* Radio input checked styles */
        .input-container input:checked+.radio-tile {
            border-color: #4A36F1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .input-container input:checked+.radio-tile .bull-container {
            border-color: #4A36F1;
        }

        .input-container input:checked+.radio-tile .bull-container .bull {
            background: #4A36F1;
            width: 18px;
            height: 18px;
        }
    </style>
    <div class="container">
        <div class="text-center pt-3">
            <div class="text-start w-full max-w-4xl">
                <a href="/register/step/4" class="inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="text-gray-700 hover:text-gray-900" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </a>
            </div>
            
            <h1 class="text-muted">Il est temps de choisir votre plan de couverture</h1>
        </div>
        <form method="POST" action="{{ route('register.step', ['step'=> 5]) }}">
            @csrf
            <div class="cards-container">
                <div class="radio-tile-cards ">
                    {{-- {/* card 1 */} --}}
                    <div class="input-container">
                        <input type="radio" id="one" name="pack" value="{{$data[1]['id']}}"  />
                        <label for="one" class="radio-tile pb-4">
                            {{-- {/* head card */} --}}
                            <div class="head-card">
                                <b>Confort</b>
                                <p class="price basic"> {{ $data[1]['value'] }}
                                    DH/mois</p>
                            </div>
                            {{-- {/* body card */} --}}
                            <div class="body-card">
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="bi bi-check-circle"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Consultations</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="bi bi-check-circle"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Hospitalisation</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="bi bi-check-circle"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Pharmacie</span>
                                </div>
                                <div class="item desactive">
                                    <span><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Stérilisation</span>
                                </div>
                                <div class="item desactive">
                                    <span><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Vaccins</span>
                                </div>
                                <div class="item desactive">
                                    <span><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Vermifuges</span>
                                </div>
                                <div class="item desactive">
                                    <span><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Compléments alimentaires </span>
                                </div>
                                <div class="item desactive">
                                    <span><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Détartrage</span>
                                </div>
                            </div>
                            {{-- {/* footer card */} --}}
                            <div class="footer-card">
                                <div class="row ">
                                    <div class="titre col">On rembourse</div>
                                    <div class="col text-end">75%</div>
                                </div>
                                <div class="row">
                                    <div class="titre col">Jusqu’à</div>
                                    <div class="col text-end">10000 DH/an</div>
                                </div>
                            </div>
                            {{-- {/* bull top */} --}}
                            <div class="bull-container">
                                <span class="bull" />
                            </div>
                        </label>
                    </div>
                    {{-- {/* card 2 */} --}}
                    <div class="input-container ">
                        <input class="form-check-input" type="radio" id="two" name="pack" value="{{$data[2]['id']}}"  />
                        <label for="two" class="radio-tile ">
                            {{-- {/* head card */} --}}
                            <div class="head-card">
                                <div class="left">
                                    <p><b>Complète</b></p>
                                    <p class="fav"><b>FAVORITE</b></p>
                                </div>
                                <p class="price w-100"> {{ $data[2]['value'] }}DH/mois</p>
                            </div>
                            {{-- {/* body card */} --}}
                            <div class="body-card">
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Consultations</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Hospitalisation</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Pharmacie</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Stérilisation</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Vaccins</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Vermifuges</span>
                                </div>
                                <div class="item desactive">
                                    <span><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Compléments alimentaires
                                    </span>
                                </div>
                                <div class="item desactive">
                                    <span><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Détartrage</span>
                                </div>
                            </div>
                            {{-- {/* footer card */} --}}
                            <div class="footer-card">
                                <div class="row ">
                                    <div class="titre col">On rembourse </div>
                                    <div class="col text-end">80%</div>
                                </div>
                                <div class="row">
                                    <div class="titre col">Jusqu’à</div>
                                    <div class="col text-end">12000 DH/an</div>
                                </div>
                            </div>
                            {{-- {/* bull top */} --}}
                            <div class="bull-container">
                                <span class="bull" />
                            </div>
                        </label>
                    </div>
                    {{-- {/* card 3 */} --}}
                    <div class="input-container ">
                        <input type="radio" id="three" name="pack" value="{{$data[3]['id']}}"  />
                        <label for="three" class="radio-tile">
                            {{-- {/* head card */} --}}
                            <div class="head-card">
                                <b>Premium</b>
                                <p class="price basic"> {{ $data[3]['value'] }} DH/mois</p>
                            </div>
                            {{-- {/* body card */} --}}
                            <div class="body-card">
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Consultations</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Hospitalisation</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Pharmacie</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Stérilisation</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Vaccins</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Vermifuges</span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Compléments alimentaires </span>
                                </div>
                                <div class="item">
                                    <span><i class="" style="color:#4A36F1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg></i></span>
                                    <span>Détartrage</span>
                                </div>
                            </div>
                            {{-- {/* footer card */} --}}
                            <div class="footer-card">
                                <div class="row ">
                                    <div class="titre col">On rembourse</div>
                                    <div class="col text-end">90%</div>
                                </div>
                                <div class="row">
                                    <div class="titre col">Jusqu’à</div>
                                    <div class="col text-end">15000 DH/an</div>
                                </div>
                            </div>
                            {{-- {/* bull top */} --}}
                            <div class="bull-container">
                                <span class="bull" />
                            </div>
                        </label>
                    </div>
                </div>
                @error('pack')
                    <div class="text-center text-red-500">{{ $message }}</div>
                @enderror
                <div class="text-center py-4">
                    <button type="submit" class="px-5 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Suivant
                    </button>
                </div>
            </div>
        </form>
    </div>
    
</x-guest-layout>
