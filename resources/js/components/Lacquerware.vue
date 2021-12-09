<template>
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <h1 class="font-weight-bold text-h4 basil--text my-10 page-title">
                    漆器について
                </h1>
                <v-card class="w-100 my-5">
                    <v-tabs
                        v-model="tab"
                        background-color="transparent"
                        grow
                        class="border-bottom"
                    >
                        <v-tab
                            v-for="item in items"
                            :key="item"
                        >
                            {{ item }}
                        </v-tab>
                    </v-tabs>

                    <v-tabs-items v-model="tab">
                        <v-tab-item>
                            <v-card class="pa-10">
                                <v-card-text>
                                    <AboutKinds></AboutKinds>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                        <v-tab-item>
                            <v-card class="pa-10">
                                <v-card-text>
                                    <AizuColor></AizuColor>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                        <v-tab-item>
                            <v-card class="pa-10">
                                <v-card-text>
                                    <AizuShape></AizuShape>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                        <v-tab-item>
                            <v-card class="pa-10">
                                <v-card-text>
                                    <AizuTechnique></AizuTechnique>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                    </v-tabs-items>
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	import AboutKinds from './about-lacquerware/Kinds.vue';
	import AizuColor from './about-lacquerware/AizuColor.vue';
	import AizuShape from './about-lacquerware/AizuShape';
	import AizuTechnique from './about-lacquerware/AizuTechnique';

	export default {
		name: "lacquerware",
		components: {
			AboutKinds,
			AizuColor,
			AizuShape,
			AizuTechnique,
		},
		data () {
			return {
				tab: null,
				items: [
					'漆器の種類', '会津漆器の色', '会津漆器の形', '会津漆器の技法',
				],
				text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
			}
		},
	}
</script>

<style scoped>
.v-tab--active {
    background-color: #E7EFFA!important;
}
</style>
