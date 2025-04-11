@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection


@section('pagetitle')
<a class="header__logo" href="/">
    FashionablyLate
</a>
@endsection

@section('content')

<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="/thanks" method="post">
        @csrf
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
        <input type="hidden" name="email" value="{{ $contact['email'] }}">
        <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
        <input type="hidden" name="address" value="{{ $contact['address'] }}">
        <input type="hidden" name="building" value="{{ $contact['building'] }}">
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text--name">
                        <p>{{$contact['last_name']}}</p>
                        <p>{{$contact['first_name']}}</p>
                    </td>
                </tr>


                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text-gender">
                        <p>{{$contact['gender']}}</p>
                    </td>
                </tr>


                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <p>{{$contact['email']}}</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <p>{{$contact['tel']}}</p>
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <p>{{$contact['address']}}</p>
                    </td>
                </tr>


                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <p>{{$contact['building']}}</p>
                    </td>
                </tr>


                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <p>{{ $category->content }}</p>
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <p>{{$contact['detail']}}</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="button">
            <div class="form__button">
                <button class="form__button-submit" type="submit">送信</button>
            </div>
            <div class="syuusei">
                <a href="{{ route('contact.form') }}">修正</a>
            </div>
        </div>
    </form>
</div>
@endsection