<template>
    <header>
        <v-app-bar
            color="white"
            height="80"
            app
            clipped-left
            elevate-on-scroll
            id="header"
        >
            <v-container>
                <v-row>
                    <div class="d-flex align-center">
                        <v-toolbar-title class="primary--text headline font-italic">
                            <a href="/" class="font-weight-bold">MiDIKAno</a>
                        </v-toolbar-title>
                    </div>
                    <nav v-if="$mq === 'md' ||$mq === 'lg' ">
                        <v-btn href="/gallery" class="mx-1" text tile>ギャラリー</v-btn>
                        <v-btn href="/about-lacquerware" class="mx-1" text tile>漆器について</v-btn>
                        <v-btn href="/news" class="mx-1" text tile>ニュース</v-btn>
                        <v-btn href="/contact" class="mx-1" text tile>お問い合わせ</v-btn>
                    </nav>
                    <div class="ml-auto">
                        <v-app-bar-nav-icon @click="drawer = true" v-if="$mq === 'sm'"/>
                        <div v-if="$mq === 'md' ||$mq === 'lg' ">
                            <div v-if="isGuest">
                                <v-btn text v-bind:href="href.login" class="px-5">{{ name.login }}</v-btn>
                            </div>
                            <div v-else class="list-item">
                                <v-menu offset-y>
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-btn
                                            text
                                            v-bind="attrs"
                                            v-on="on"
                                            class="item"
                                        >
                                            {{ user.name }}
                                        </v-btn>
                                    </template>
                                    <v-list>
                                        <v-list-item href="/mypage">
                                            <v-list-item-icon>
                                                <v-icon class="login-icon">mdi-account</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-title>マイページ</v-list-item-title>
                                        </v-list-item>
                                        <v-list-item v-bind:href="href.logout"
                                                     onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">
                                            <v-list-item-icon>
                                                <v-icon class="login-icon">mdi-logout</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-title>{{ name.logout }}</v-list-item-title>
                                        </v-list-item>
                                    </v-list>
                                    <form id="logout-form" v-bind:action="href.logout" method="POST" class="d-none">
                                        <input type="hidden" name="_token" v-bind:value="csrf">
                                    </form>
                                </v-menu>
                            </div>
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
            <v-list-item class="py-5">
                <v-list-item-content>
                    <v-list-item-title class="text-h6">
                        MiDIKAno
                    </v-list-item-title>
                    <v-list-item-subtitle class="p-1 text-caption">
                        大津山研究室
                    </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
            <v-divider></v-divider>
            <v-list
                nav
                dense
            >
                <v-list-item-group
                    active-class="cyan--text text--accent-4"
                >
                    <v-list-item class="py-2 px-5" href="/gallery">
                        <v-list-item-icon>
                            <v-icon class="login-icon">mdi-image-multiple</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>ギャラリー</v-list-item-title>
                    </v-list-item>
                    <v-list-item class="py-2 px-5" href="/about-lacquerware">
                        <v-list-item-icon>
                            <v-icon class="login-icon">mdi-bowl-mix</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>漆器について</v-list-item-title>
                    </v-list-item>
                    <v-list-item class="py-2 px-5" href="/news">
                        <v-list-item-icon>
                            <v-icon class="login-icon">mdi-newspaper</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>ニュース</v-list-item-title>
                    </v-list-item>
                    <v-list-item class="py-2 px-5" href="/contact">
                        <v-list-item-icon>
                            <v-icon class="login-icon">mdi-forum</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>お問い合わせ</v-list-item-title>
                    </v-list-item>
                    <v-list-item v-if="!isGuest" class="py-2 px-5" href="/mypage">
                        <v-list-item-icon>
                            <v-icon class="login-icon">mdi-account</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>マイページ</v-list-item-title>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
            <template>
                <div class="px-5 py-10">
                    <v-btn block class="drawer-btn" v-bind:href="href.login" v-if="isGuest">
                        ログイン
                    </v-btn>
                    <v-btn block class="drawer-btn" v-bind:href="href.logout"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" v-else >
                            ログアウト
                        <form id="logout-form" v-bind:action="href.logout" method="POST" class="d-none">
                            <input type="hidden" name="_token" v-bind:value="csrf">
                        </form>
                    </v-btn>
                </div>
            </template>
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
		data() {
			return {
				drawer: false,
				dialog: false,
			}
		}
	}
</script>

<style lang="scss" scoped>
    #header {
        z-index: 9999;
        position: fixed;
        top: 0px;
        left: 0px;
    }

    .login-icon {
        padding-right: 1rem;
    }

    .v-toolbar__title {
        overflow: visible !important;
        margin-right: 50px !important;
    }

    .list-item > button::after {
        content: "▼";
        position: absolute;
        top: 10px;
        right: 14px;
        font-size: 10px;
    }

    .item {
        padding: 0px 42px 0px 18px !important;
    }

    .drawer-btn {
        background-color: rgba(0, 0, 0, .24) !important;
    }
</style>
