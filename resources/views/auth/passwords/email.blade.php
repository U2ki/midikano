@extends('layouts.v-app')

@section('content')
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <v-col cols="12" lg="6" md="10" sm="10">
                    <v-card elevation="0" tile>
                        <div class="pa-8">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}" class="py-3">
                                @csrf

                                <v-text-field
                                    type="email"
                                    name="email"
                                    id="email"
                                    value="{{ old('email') }}"
                                    v-bind:error="@error('email') true @else false @enderror"
                                    error-messages="@error('email') {{$message}} @enderror"
                                    required
                                    autocomplete="email"
                                    label={{ __('E-Mail Address') }}
                                        placeholder="test@hoge.com"
                                ></v-text-field>

                                <div class="px-4 mb-4 mt-10">
                                    <v-btn type="submit" color="primary" elevation="0" block large>
                                        {{ __('Send Password Reset Link') }}
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
