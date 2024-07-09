<template>
    <div id="patents-page">
        <MianLayout>
            <div class="p-4 mx-auto max-w-screen-xl">
                <h2
                    class="my-8 text-center text-4xl font-extrabold tracking-tight"
                >
                    <span class="text-teal-500">Patents</span>
                </h2>

                <div class="mb-8">
                    <div>
                        <ul
                            class="flex flex-wrap -mb-px text-sm font-medium text-center"
                            id="Patents-tab"
                            data-tabs-toggle="#Patents-tab-content"
                            role="tablist"
                        >
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 rounded-t-lg"
                                    id="computer-science-tab"
                                    data-tabs-target="#computer-science"
                                    type="button"
                                    role="tab"
                                    aria-controls="computer-science"
                                    aria-selected="false"
                                >
                                    computer science
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="electronic-engineering-tab"
                                    data-tabs-target="#electronic-engineering"
                                    type="button"
                                    role="tab"
                                    aria-controls="electronic-engineering"
                                    aria-selected="false"
                                >
                                    Electrical and electronic engineering
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="Medicine-health-tab"
                                    data-tabs-target="#Medicine-health"
                                    type="button"
                                    role="tab"
                                    aria-controls="Medicine-health"
                                    aria-selected="false"
                                >
                                    Medicine and health
                                </button>
                            </li>
                            <li role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="Energy-environmental-tab"
                                    data-tabs-target="#Energy-environmental"
                                    type="button"
                                    role="tab"
                                    aria-controls="Energy-environmental"
                                    aria-selected="false"
                                >
                                    Energy and environmental technology
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div id="Patents-tab-content">
                        <div
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
                            id="computer-science"
                            role="tabpanel"
                            aria-labelledby="computer-science-tab"
                        >
                            <ul class="flex flex-wrap gap-4">
                                <li>
                                    <a
                                        href="#"
                                        class="text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                                        >Artificial Intelligence (AI)</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Information Technology (IT)</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Software development</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Communication Technology</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Data technology</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
                            id="electronic-engineering"
                            role="tabpanel"
                            aria-labelledby="electronic-engineering-tab"
                        >
                            <ul class="flex flex-wrap gap-4">
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Electrical Engineering
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Electronic Engineering</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Power Engineering
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
                            id="Medicine-health"
                            role="tabpanel"
                            aria-labelledby="Medicine-health-tab"
                        >
                            <ul class="flex flex-wrap gap-4">
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Medical Imaging Technology
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Medical Devices Technology
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Prosthetics and Artificial Organs
                                        Technology
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Tissue Engineering
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div
                            class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
                            id="Energy-environmental"
                            role="tabpanel"
                            aria-labelledby="Energy-environmental-tab"
                        >
                            <ul class="flex flex-wrap gap-4">
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Renewable Energy Technology
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Nuclear Energy Technology
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Thermal Energy Technology
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Energy Management Technology
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                                        >Waste Management Technology</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <form class="w-full mx-auto">
                    <input
                        type="search"
                        id="researchers-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                        placeholder="Find patents related to your field..."
                        v-model="search"
                    />
                </form>
                <div class="grid gap-8 my-8">
                    <PostCard
                        v-for="Patent in Patents"
                        :key="Patent.id"
                        :title="Patent.pantent_Titel"
                        :content="Patent.summary_EN"
                        :author="Patent.InventorName"
                        :category="Patent.Related_technology"
                        :views="Patent.views"
                        :postUrl="'/PatentPage'"
                    />
                </div>
            </div>
        </MianLayout>
    </div>
</template>
<script>
import MianLayout from "@/layouts/MianLayout.vue";
import PostCard from "@/components/global/PostCard.vue";
import axios from "axios";
export default {
    name: "PatentsPage",
    components: { MianLayout, PostCard },
    data() {
        return {
            Patents: [],
        };
    },
    mounted() {
        this.mypatent();
    },
    methods: {
        async mypatent() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=showPatent"
            );
            const resData = res.data;

            this.Patents = resData.Patents;
        },
    },
};
</script>
