<x-guest-layout>

<div class="container mx-auto px-4">
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-center">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mx-auto px-4">
        <div class="text-center pt-10">
            <h2 class="text-2xl font-bold">
                Je souhaite <span class="text-indigo-600">assurer</span>
            </h2>
            <form method="POST" action="{{ route('register.step', ['step' => 1]) }}" class="mt-6">
                @csrf
                <div class="flex justify-center items-center gap-6">
                    <!-- Chat option -->
                    <div class="text-center ">
                        <label for="inlineRadio1" class="block cursor-pointer ">
                            <img src="{{ asset('images/cat_off.png') }}" alt="Chat" id="animalImageChat" class="w-48 mx-auto" />
                            <p id="nameChat" class="font-bold mt-2">Un chat</p>
                            <input type="radio" name="animal_type" id="inlineRadio1" value="1" hidden />
                        </label>
                    </div>

                    <!-- Chien option -->
                    <div class="text-center">
                        <label for="inlineRadio2" class="block cursor-pointer">
                            <img src="{{ asset('images/dog_off.png') }}" alt="Chien" id="animalImageChien" class="w-48 mx-auto" />
                            <p id="nameChien" class="font-bold mt-2">Un chien</p>
                            <input type="radio" name="animal_type" id="inlineRadio2" value="2" hidden />
                        </label>
                    </div>
                </div>
                @error('animal_type')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror

                <div class="mt-8">
                    <label for="inputName" class="block text-indigo-600">Quel est son nom ?</label>
                    <input type="text" id="inputName" name="animal_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" value="{{ old('animal_name') }}" required />
                    @error('animal_name')
                        <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-6">
                    {{-- <button type="submit" id="submitBtn" class="bg-indigo-600 text-white px-6 py-2 rounded-md w-full disabled:opacity-50" disabled hidden> --}}
                    <button type="submit" style="background-color: #4A36F1" id="submitBtn" class="bg-indigo-600 text-white px-6 py-2 rounded-md w-full disabled:opacity-50" disabled hidden>
                        JE CONTINUE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Script functionality remains unchanged
    const radioChat = document.getElementById('inlineRadio1');
    const radioChien = document.getElementById('inlineRadio2');
    const animalImageChat = document.getElementById('animalImageChat');
    const animalImageChien = document.getElementById('animalImageChien');
    const nameChat = document.getElementById('nameChat');
    const nameChien = document.getElementById('nameChien');
    const submitBtn = document.getElementById('submitBtn');
    const inputName = document.getElementById('inputName');

    function updateImage(srcChat, srcChien) {
        animalImageChat.src = srcChat;
        animalImageChien.src = srcChien;
        nameChat.style.color = radioChat.checked ? '#4A36F1' : '#ABBBFF';
        nameChien.style.color = radioChien.checked ? '#4A36F1' : '#ABBBFF';
    }

    radioChat.addEventListener('click', () => updateImage('/images/cat_on.png', '/images/dog_off.png'));
    radioChien.addEventListener('click', () => updateImage('/images/cat_off.png', '/images/dog_on.png'));

    document.addEventListener('DOMContentLoaded', () => {
        if (!radioChat.checked && !radioChien.checked) {
            updateImage('/images/cat_off.png', '/images/dog_off.png');
        }
    });

    inputName.addEventListener('input', () => {
        submitBtn.disabled = !inputName.value.trim() || (!radioChat.checked && !radioChien.checked);
        submitBtn.hidden = submitBtn.disabled;
    });

    [radioChat, radioChien].forEach(radio => {
        radio.addEventListener('change', () => {
            submitBtn.disabled = !inputName.value.trim() || (!radioChat.checked && !radioChien.checked);
            submitBtn.hidden = submitBtn.disabled;
        });
    });
</script>

</x-guest-layout>
