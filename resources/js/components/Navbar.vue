<template>
    <header>
        <v-app-bar
            color="white"
            height="80"
            app
            clipped-left
            elevate-on-scroll
        >
            <v-container>
                <v-row>
                    <div class="d-flex align-center">
                        <v-app-bar-nav-icon @click="drawer = true" v-if="$mq === 'sm'"/>
                        <v-toolbar-title class="primary--text headline font-italic">
                            <a href="/" class="font-weight-bold">urulab</a>
                        </v-toolbar-title>
                        <v-spacer/>
                        <v-tabs v-if="$mq === 'md'">
                            <v-tab>アイテム1</v-tab>
                            <v-tab>アイテム2</v-tab>
                            <v-tab>アイテム3</v-tab>
                        </v-tabs>
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
                    </div>
                </v-row>
            </v-container>
        </v-app-bar>
        <v-navigation-drawer
            v-model="drawer"
            absolute
            temporary
        >
            <v-list
                nav
                dense
            >
                <v-list-item-group
                    active-class="cyan--text text--accent-4"
                >
                    <v-list-item>
                        <v-list-item-title>アイテム1</v-list-item-title>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-title>アイテム2</v-list-item-title>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-title>アイテム3</v-list-item-title>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-navigation-drawer>
    </header>
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
		},
		data () {
			return {
				drawer: false,
                dialog: false,
            }
		}
	}
</script>

<style lang="scss" scoped>
    html {
        overflow: auto !important;
    }

    .v-toolbar__title {
        overflow: visible !important;
        margin-right: 50px !important;
    }
</style>
