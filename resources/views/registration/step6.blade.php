<x-guest-layout>
    <style>
        .selected-row {
            color: #4A36F1;
        }
    
        .custom-color {
            color: #4A36F1;
        }
    </style>
    
    <div class="bg-gray-100 p-6">
    
        <div class="flex flex-col items-center justify-center py-10">
            <div class="text-start w-full max-w-4xl">
                <a href="/register/step/5" class="inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="text-gray-700 hover:text-gray-900" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </a>
            </div>
            <div class="text-center mt-6">
                <h2 class="text-2xl font-bold text-indigo-600">Les garanties comprises dans l’offre</h2>
                <h6 class="text-gray-600 mt-2">
                    @php
                            $mapping = [
                                1 => 'Confort',
                                2 => 'Complète',
                                3 => 'Premium'
                            ];
                            $formCardId = $data[0][0]['form_card_id'];
                    @endphp
                    L'offre  {{ $mapping[$formCardId] }} accès à des garanties proposées par Acheel pour protéger
                    <span class="text-indigo-600">{{ $data[1] }}</span> :
                </h6>
            </div>
        </div>
    
        <form method="POST" action="{{ route('register.step',['step'=>6]) }}" class="max-w-4xl mx-auto">
            @csrf
            @foreach ($data[0] as $key => $item)
                <div class="flex items-center justify-between bg-white shadow-sm p-4 rounded-lg mt-6 guarantee-row cursor-pointer">
                    <div class="w-16 h-16 flex-shrink-0">
                        <img src="{{ asset($item->logo) }}" alt="Image"
                            class="w-full h-full object-contain opacity-50">
                    </div>
                    <div class="flex-1 px-4">
                        <h5 class="text-lg font-bold clickable-title">{{ $item->title }}</h5>
                        <p class="text-gray-600 mt-1 clickable-description">{{ $item->description }}</p>
                    </div>
                    <div class="pr-4">
                        <b class="text-gray-800 clickable-price">{{ $item->price }} DH/année</b>
                    </div>
                    <div>
                        <input type="checkbox" name="selectedGuarantees[]" value="{{ $item->id }}" id="flex{{ $key }}"
                            class="form-checkbox h-5 w-5 checkbox-input">
                    </div>
                </div>
            @endforeach
    
            <hr class="my-6">
    
            <div class="text-center mt-8">
                <button type="submit" class="bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700">
                    <b>Je valide mon choix</b>
                </button>
            </div>
        </form>


    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const guaranteeRows = document.querySelectorAll('.guarantee-row');
    
            guaranteeRows.forEach(row => {
                const checkboxInput = row.querySelector('.checkbox-input');
                const image = row.querySelector('img');
                const elementsToColor = row.querySelectorAll('.clickable-title, .clickable-description, .clickable-price');
    
                row.addEventListener('click', function(e) {
                    const target = e.target;
                    if (!target.classList.contains('checkbox-input')) {
                        checkboxInput.checked = !checkboxInput.checked;
                        row.classList.toggle('selected-row', checkboxInput.checked);
    

                        image.classList.toggle('opacity-50', !checkboxInput.checked);

                        elementsToColor.forEach(element => {
                            element.classList.toggle('custom-color', checkboxInput.checked);
                        });
                    }
                });
    
                if (checkboxInput) {
                    checkboxInput.addEventListener('change', function() {
                        row.classList.toggle('selected-row', this.checked);

                        elementsToColor.forEach(element => {
                            element.classList.toggle('custom-color', this.checked);
                        });
                    });
                }
            });
        });
    </script>
    
</x-guest-layout>