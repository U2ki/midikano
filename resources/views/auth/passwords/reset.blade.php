@extends('layouts.v-app')

@section('content')
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <v-col cols="12" lg="6" md="10" sm="10">
                    <v-card elevation="0" tile>
                        <div class="pa-8">
                            <form method="POST" action="{{ route('password.update') }}" class="py-3">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <v-text-field
                                    type="email"
                                    name="email"
                                    id="email"
                                    value="{{ $email ?? old('email') }}"
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


                                <div class="px-4 mb-4 mt-10">
                                    <v-btn type="submit" color="primary" elevation="0" block large>
                                        {{ __('Reset Password') }}
                                    </v-btn>
                                </div>
                            </form>
                        </div>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
@endsection
