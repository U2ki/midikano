<template>
    <v-app-bar color="white" height="65" app clipped-left>
        <v-toolbar-title>
            <a href="/">urulab</a>
    <!--    <img src="{{ asset('assets/logo.png') }}" alt="logo" class="logo-img">-->
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <div v-if="isGuest">
            <v-btn text v-bind:href="href.login">{{ name.login }}</v-btn>
            <div v-if="route">
                <v-btn text v-bind:href="href.register">{{ name.register }}</v-btn>
            </div>
        </div>
        <div v-else>
            <v-menu offset-y>
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        text
                        v-bind="attrs"
                        v-on="on"
                    >
                        {{ user.name }}
                    </v-btn>
                </template>
                <v-list>
                    <v-list-item v-bind:href="href.logout"
                                 onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                        <v-list-item-title>
                            {{ name.logout }}
                        </v-list-item-title>
                    </v-list-item>
                </v-list>
                <form id="logout-form" v-bind:action="href.logout" method="POST" class="d-none">
                    <input type="hidden" name="_token" v-bind:value="csrf">
                </form>
            </v-menu>
        </div>
    </v-app-bar>
</template>

<script>
	export default {
		props: {
			isGuest: {},
					csrf: {
					type: String,
					required: true,
				    },
            href: {},
			name: {},
            route: {},
			user: {},
		}
	}
</script>
