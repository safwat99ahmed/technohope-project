<template>
    <div id="DashboardLibrary">
        <DashboardLayout :title="'Library'" :subtitle="''">
            <div>
                <div id="pageTabs">
                    <ul class="flex gap-3 mb-6 select-none">
                        <li
                            @click="activeTab = 1"
                            class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center cursor-pointer"
                            :class="[activeTab === 1 ? 'active' : '']"
                        >
                            My research
                        </li>
                        <li
                            @click="activeTab = 2"
                            class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center cursor-pointer"
                            :class="[activeTab === 2 ? 'active' : '']"
                        >
                            My patents
                        </li>
                        <li
                            @click="activeTab = 3"
                            class="text-teal-500 border border-teal-500 hover:text-white hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center cursor-pointer"
                            :class="[activeTab === 3 ? 'active' : '']"
                        >
                            Bookmarks
                        </li>
                    </ul>
                </div>
                <div id="pageContent">
                    <div id="contentOne" v-if="activeTab === 1">
                        <div class="flex mb-6">
                            <div class="grow">
                                <h3
                                    class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                                >
                                    My research
                                </h3>
                            </div>
                            <div>
                                <a
                                    href="http://localhost/php/technohope-project/src/api/Research.php"
                                    class="btl-link text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                                >
                                    Add research
                                </a>
                                <button></button>
                            </div>
                        </div>
                        <div class="grid gap-8 lg:grid-cols-2">
                            <PostCard
                                v-for="Research in Researchs"
                                :key="Research.id"
                                :title="Research.Title"
                                :content="Research.Summary_EN"
                                :author="Research.Researchers"
                                :category="Research.Related_technology"
                                :views="Research.views"
                                :postUrl="'/Dashboard/DashboardLibraryEditResearch'"
                            />
                        </div>
                    </div>
                    <div id="contentTwo" v-if="activeTab === 2">
                        <div class="flex mb-6">
                            <div class="grow">
                                <h3
                                    class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                                >
                                    My patents
                                </h3>
                            </div>
                            <div>
                                <a
                                    href="http://localhost/php/technohope-project/src/api/patent.php"
                                    class="btl-link text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                                >
                                    Add patent
                                </a>
                                <button></button>
                            </div>
                        </div>
                        <div class="grid gap-8 lg:grid-cols-2">
                            <PostCard
                                v-for="Patent in Patents"
                                :key="Patent.id"
                                :title="Patent.pantent_Titel"
                                :content="Patent.summary_EN"
                                :author="Patent.InventorName"
                                :category="Patent.Related_technology"
                                :views="Patent.views"
                                :postUrl="'/Dashboard/DashboardLibraryEditPatent'"
                                @click="showPatentDetails(Patent)"
                            />
                        </div>
                    </div>
                    <div id="contentThree" v-if="activeTab === 3">
                        <div>
                            <h3
                                class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                            >
                                Bookmarks
                            </h3>
                            <div class="grid gap-4 my-8">
                                <div
                                    class="HistoryCard"
                                    v-for="Research in Researchs"
                                    :key="Research.id"
                                >
                                    <div
                                        class="flex p-4 bg-white rounded-full border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"
                                    >
                                        <h2
                                            class="grow px-4 text-lg font-bold tracking-tight text-gray-900 dark:text-white"
                                        >
                                            <a :href="'/ResearchPage'">{{
                                                Research.Title
                                            }}</a>
                                        </h2>
                                        <button
                                            class="w-8 h-8 text-red-500 border border-red-500 rounded-full hover:bg-red-500 hover:text-white"
                                        >
                                            X
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </DashboardLayout>
    </div>
</template>
<script>
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import PostCard from "@/components/global/PostCard.vue";
import axios from "axios";
export default {
    name: "DashboardLibrary",
    components: {
        DashboardLayout,
        PostCard,
    },
    data() {
        return {
            activeTab: 1,
            Patents: [],
            Researchs: [],
            Users: [],
            selectedPatent: null,
        };
    },
    mounted() {
        this.myresearsch();
        this.mypatent();
        this.myuser();
    },
    methods: {
        showPatentDetails(patent) {
            this.selectedPatent = patent;
            localStorage.setItem("selectedPatent", JSON.stringify(patent));
        },
        async myresearsch() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=showResearch"
            );
            const resData = res.data;

            this.Researchs = resData.Researchs;
        },
        async mypatent() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=showPatent"
            );
            const resData = res.data;

            this.Patents = resData.Patents;
        },
        async myuser() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=login"
            );
            const resData = res.data;

            this.Users = resData.Users;
            console.log(this.Userssers);
        },
    },
};
</script>
<style scoped>
.active {
    color: white !important;
    background: #0694a2 !important;
}
</style>
