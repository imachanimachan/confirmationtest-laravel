@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('pagetitle')
<a class="header__logo" href="/">
    FashionablyLate
</a>
@endsection


@section('content')



<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content--a">
                <div class="form__input--text form__input--name">
                    <input type="text" name="last_name" value="{{ old('last_name', $contact['last_name'] ?? '') }}" placeholder="例:山田" />
                </div>
                <div class="form__input--text form__input--name">
                    <input type="text" name="first_name" value="{{ old('first_name', $contact['first_name'] ?? '') }}" placeholder="例:太郎" />
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>

            <div class="form__group-content">
                @foreach ($genders as $value => $label)
                <div class="form__input--radio">
                    <input type="radio" name="gender" value="{{ $value }}" id="gender_{{ $value }}" {{ $value == 1 ? 'checked' : '' }}{{ old('gender', $contact['gender'] ?? '') == $value ? 'checked' : '' }}>
                    <label for="gender_{{ $value }}">{{ $label }}</label>
                </div>
                @endforeach

                <div class=" form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>


        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" value="{{ old('email', $contact['email'] ?? '') }}" placeholder="例:test@example.com" />
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class=" form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content--tel--center">
                <div class="form__input--text">
                    <div class="phone-input">
                        <input type="tel" name="tel1" maxlength="5" value="{{ old('tel1', $contact['tel1'] ?? '') }}" placeholder="080" />
                        <span>-</span>
                        <input type="tel" name="tel2" maxlength="5" value="{{ old('tel2', $contact['tel2'] ?? '') }}" placeholder="1234" />
                        <span>-</span>
                        <input type="tel" name="tel3" maxlength="5" value="{{ old('tel3', $contact['tel3'] ?? '') }}" placeholder="5678" />
                    </div>
                </div>
                <div class="form__error">
                    @error('tel')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class=" form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" value="{{ old('address', $contact['address'] ?? '') }}" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" />
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="tel" name="building" value="{{ old('building', $contact['building'] ?? '') }}" placeholder="例:千駄ヶ谷マンション101" />
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content--center">
                <div class="form__input--text">
                    <select name="category_id">
                        <option class="glay" value="" disabled {{ empty(old('category_id', $contact['category_id'] ?? '')) ? 'selected' : '' }}>選択してください</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $contact['category_id'] ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                        @endforeach
                    </select>
                    <div class="form__error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>


        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail', $contact['detail'] ?? '') }}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>

            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
        </div>
    </form>
</div>
@endsection