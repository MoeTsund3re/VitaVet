@extends('layouts.app')

@section('content')
    <style>
        .profile_page {
            margin-top: 20px;
        }

        .form_card {
            background: #23233a;
            border-radius: 24px;
            padding: 36px 40px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .form_row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form_field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form_field.full {
            grid-column: 1 / -1;
        }

        .form_label {
            font-size: 14px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 0.07em;
        }

        .form_input,
        .form_select {
            height: 52px;
            background: rgba(255, 255, 255, 0.06);
            border: 1.5px solid rgba(255, 255, 255, 0.1);
            border-radius: 14px;
            padding: 0 18px;
            font-size: 16px;
            font-family: Nunito, sans-serif;
            color: #fff;
            transition: border-color 0.2s, background 0.2s;
            outline: none;
        }

        .form_input:focus,
        .form_select:focus {
            border-color: #014bff;
            background: rgba(1, 75, 255, 0.08);
        }

        .form_select option {
            background: #1b1b29;
            color: #fff;
        }

        .emoji_picker {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .emoji_option {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.06);
            border: 2px solid transparent;
            font-size: 26px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .emoji_option:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .emoji_option.selected {
            border-color: #014bff;
            background: rgba(1, 75, 255, 0.15);
        }

        .form_submit {
            height: 56px;
            border-radius: 100px;
            background: #014bff;
            color: #fff;
            font-size: 18px;
            font-family: Nunito, sans-serif;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: background 0.2s, transform 0.18s;
            margin-top: 8px;
        }

        .form_submit:hover {
            background: #0040e0;
            transform: translateY(-2px);
        }

        .create_pet_back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 36px;
            cursor: pointer;
            text-decoration: none;
            transition: color 0.2s;
        }

        .create_pet_back:hover {
            color: #fff;
        }

        .create_pet_title {
            font-size: 38px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 8px;
        }

        .create_pet_sub {
            font-size: 17px;
            color: rgba(255, 255, 255, 0.45);
            margin-bottom: 40px;
        }

        .error-message {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid #ef4444;
            color: #ef4444;
            padding: 12px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .error-field {
            border-color: #ef4444 !important;
        }

        .error-text {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
        }
    </style>

    <body>
        <div class="profile_page" style="margin-top: 20px;">
            <div class="create_pet_page" style="max-width: 800px; margin: 0 auto;">
                <a href="{{ route('profile') }}" class="create_pet_back">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <polyline points="15 18 9 12 15 6" />
                    </svg>
                    Назад к профилю
                </a>

                <h1 class="create_pet_title">Добавить питомца</h1>
                <p class="create_pet_sub">Заполните информацию о вашем питомце</p>

                @if ($errors->any())
                    <div class="error-message">
                        <strong>Пожалуйста, исправьте следующие ошибки:</strong>
                        <ul style="margin-top: 8px; margin-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pets.store') }}" method="POST" id="createPetForm">
                    @csrf
                    <div class="form_card">
                        <div class="form_field">
                            <label class="form_label">Выберите аватар</label>
                            <div class="emoji_picker" id="emojiPicker">
                                <div class="emoji_option selected" data-emoji="🐱" onclick="selectEmoji(this)">🐱</div>
                                <div class="emoji_option" data-emoji="🐶" onclick="selectEmoji(this)">🐶</div>
                                <div class="emoji_option" data-emoji="🐰" onclick="selectEmoji(this)">🐰</div>
                                <div class="emoji_option" data-emoji="🐹" onclick="selectEmoji(this)">🐹</div>
                                <div class="emoji_option" data-emoji="🐦" onclick="selectEmoji(this)">🐦</div>
                                <div class="emoji_option" data-emoji="🐠" onclick="selectEmoji(this)">🐠</div>
                                <div class="emoji_option" data-emoji="🐢" onclick="selectEmoji(this)">🐢</div>
                                <div class="emoji_option" data-emoji="🦜" onclick="selectEmoji(this)">🦜</div>
                                <div class="emoji_option" data-emoji="🐍" onclick="selectEmoji(this)">🐍</div>
                            </div>
                            <input type="hidden" name="emoji" id="selectedEmoji" value="🐱">
                        </div>

                        <div class="form_row">
                            <div class="form_field">
                                <label class="form_label">Имя питомца *</label>
                                <input type="text" name="name" class="form_input @error('name') error-field @enderror"
                                    placeholder="Мурзик" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form_field">
                                <label class="form_label">Вид *</label>
                                <select name="type" class="form_select @error('type') error-field @enderror" required>
                                    <option value="cat" {{ old('type') == 'cat' ? 'selected' : '' }}>Кошка</option>
                                    <option value="dog" {{ old('type') == 'dog' ? 'selected' : '' }}>Собака</option>
                                    <option value="rabbit" {{ old('type') == 'rabbit' ? 'selected' : '' }}>Кролик</option>
                                    <option value="rodent" {{ old('type') == 'rodent' ? 'selected' : '' }}>Грызун</option>
                                    <option value="bird" {{ old('type') == 'bird' ? 'selected' : '' }}>Птица</option>
                                    <option value="reptile" {{ old('type') == 'reptile' ? 'selected' : '' }}>Рептилия
                                    </option>
                                    <option value="fish" {{ old('type') == 'fish' ? 'selected' : '' }}>Рыба</option>
                                    <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>Другое</option>
                                </select>
                                @error('type')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form_row">
                            <div class="form_field">
                                <label class="form_label">Порода</label>
                                <input type="text" name="breed" class="form_input"
                                    placeholder="Метис, Шотландский и т.д." value="{{ old('breed') }}">
                            </div>
                            <div class="form_field">
                                <label class="form_label">Пол</label>
                                <select name="gender" class="form_select">
                                    <option value="">Выберите...</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Кот</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Кошка</option>
                                    <option value="castrated_male"
                                        {{ old('gender') == 'castrated_male' ? 'selected' : '' }}>Кастрированный кот
                                    </option>
                                    <option value="spayed_female" {{ old('gender') == 'spayed_female' ? 'selected' : '' }}>
                                        Стерилизованная кошка</option>
                                    <option value="male_dog" {{ old('gender') == 'male_dog' ? 'selected' : '' }}>Кобель
                                    </option>
                                    <option value="female_dog" {{ old('gender') == 'female_dog' ? 'selected' : '' }}>Сука
                                    </option>
                                    <option value="castrated_dog" {{ old('gender') == 'castrated_dog' ? 'selected' : '' }}>
                                        Кастрированный кобель</option>
                                    <option value="spayed_dog" {{ old('gender') == 'spayed_dog' ? 'selected' : '' }}>
                                        Стерилизованная сука</option>
                                </select>
                            </div>
                        </div>

                        <div class="form_row">
                            <div class="form_field">
                                <label class="form_label">Дата рождения</label>
                                <input type="date" name="birth_date" class="form_input"
                                    value="{{ old('birth_date') }}">
                                @error('birth_date')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form_field">
                                <label class="form_label">Вес (кг)</label>
                                <input type="number" name="weight" class="form_input" placeholder="4.2"
                                    step="0.1" min="0" value="{{ old('weight') }}">
                                @error('weight')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form_row">
                            <div class="form_field">
                                <label class="form_label">Окрас</label>
                                <input type="text" name="color" class="form_input"
                                    placeholder="Рыжий, трёхцветный и т.д." value="{{ old('color') }}">
                            </div>
                            <div class="form_field">
                                <label class="form_label">Номер чипа</label>
                                <input type="text" name="chip_number" class="form_input"
                                    placeholder="985112345678901" value="{{ old('chip_number') }}">
                                @error('chip_number')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form_field full">
                            <label class="form_label">Особые отметки / аллергии</label>
                            <textarea name="notes" class="form_input" rows="3"
                                placeholder="Например: аллергия на пенициллин, хроническая почечная недостаточность..."
                                style="height: auto; padding: 12px 18px;">{{ old('notes') }}</textarea>
                        </div>

                        <button type="submit" class="form_submit">Сохранить питомца</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function selectEmoji(element) {
                document.querySelectorAll('.emoji_option').forEach(opt => opt.classList.remove('selected'));
                element.classList.add('selected');
                document.getElementById('selectedEmoji').value = element.getAttribute('data-emoji');
            }
        </script>
    </body>
@endsection
