@extends('layouts.v-app')

@section('content')
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <v-col cols="12" lg="6" md="10" sm="10">
                    <v-card elevation="0" tile>
                        <div class="pa-8">
                            <form method="POST" action="{{ route('register') }}" class="py-3">
                                @csrf
                                <v-text-field
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    v-bind:error="@error('name') true @else false @enderror"
                                    error-messages="@error('name') {{$message}} @enderror"
                                    required
                                    autocomplete="name"
                                    label={{ __('Name') }}
                                    autofocus
                                ></v-text-field>
                                <v-text-field
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    v-bind:error="@error('email') true @else false @enderror"
                                    error-messages="@error('email') {{$message}} @enderror"
                                    required
                                    autocomplete="email"
                                    label={{ __('E-Mail Address') }}
                                    placeholder="test@hoge.com"
                                ></v-text-field>
                                <v-text-field
                                    type="password"
                                    name="password"
                                    id="password"
                                    v-bind:error="@error('password') true @else false @enderror"
                                    error-messages="@error('password') {{$message}} @enderror"
                                    required
                                    autocomplete="new-password"
                                    label={{ __('Password') }}
                                ></v-text-field>
                                <v-text-field
                                    type="password"
                                    name="password_confirmation"
                                    id="password-confirm"
                                    required
                                    autocomplete="new-password"
                                    label={{ __('Confirm Password') }}
                                ></v-text-field>

                                <div class="px-4 mb-4">
                                    <v-btn type="submit" color="primary" elevation="0" block large>
                                        {{ __('Register') }}
                                    </v-btn>
                                </div>

                            </form>
                            <div class="separator separator_login_page">
                                <div class="middle_separator">または</div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <v-btn
                                    class="fill-width text-capitalize caption mt-3 mb-16"
                                    height="48px"
                                    outlined
                                    style="border-color:#979797;"
                                    tile
                                >
                                    <img
                                        class="button-logo-img mr-4"
                                        src="https://madeby.google.com/static/images/google_g_logo.svg"
                                        style="height:24px;"
                                    />
                                    Googleアカウントで新規登録
                                </v-btn>
                            </div>
                            <div class="">
                                <v-btn
                                    class="fill-width overline auth-to-btn"
                                    outlined
                                    style="border-color:#979797;"
                                    tile
                                    href="{{ route('login') }}"
                                >
                                    <v-icon class="pe-5">mdi-chevron-right</v-icon>
                                    <span class="auth-text">ログイン</span>
                                </v-btn>
                            </div>
                        </div>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
@endsection
