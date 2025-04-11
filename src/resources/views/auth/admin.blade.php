@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection


@section('pagetitle')
<a class="header__logo" href="/">
    FashionablyLate
</a>

<div class="header-nav">
    <form action="/logout" method="get">
        <button type="submit">
            logout
        </button>
    </form>
</div>


@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__heading">
        <h2>Admin</h2>
    </div>
</div>

<form method="GET" action="/admin" class="search-form">
    <input type="text" name="name" placeholder="名前を入力" value="">
    <input type="text" name="email" placeholder="メールアドレスを入力" value="">
    <select name="gender">
        <option value="">性別</option>
        <option value=""></option>
    </select>

    <select name="category_id">
        <option value="">お問い合わせの種類</option>
    </select>

    <select name="created_at">
        <option value="">年/月/日</option>
    </select>

    <button>検索</button>
    <button>リセット</button>
    <button>エクスポート</button>

    <table>
        <tr>
            <th></th>
        </tr>
    </table>

    @endsection