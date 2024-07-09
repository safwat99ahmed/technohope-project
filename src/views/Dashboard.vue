<template>
    <div id="DashboardPage">
        <DashboardLayout
            v-for="users in user"
            :key="users.id"
            :title="users.firstName"
            :subtitle="'Welcome'"
        >
            <div>
                <div id="RelatedTechnology">
                    <h2
                        class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-3"
                    >
                        Related technology
                    </h2>
                    <div class="grid gap-8 my-8 lg:grid-cols-2">
                        <PostCard
                            v-for="Research in Researchs"
                            :key="Research.id"
                            :title="Research.Title"
                            :content="Research.Summary_EN"
                            :author="Research.Researchers"
                            :category="Research.Related_technology"
                            :views="Research.views"
                            :postUrl="'/ResearchPage'"
                        />
                    </div>
                </div>
                <div id="History">
                    <h2
                        class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-3"
                    >
                        History
                    </h2>
                    <div class="grid gap-4 my-8">
                        <div
                            class="HistoryCard"
                            v-for="Research in Researchs"
                            :key="Research.id"
                        >
                            <div
                                class="p-4 bg-white rounded-full border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"
                            >
                                <h2
                                    class="px-4 text-lg font-bold tracking-tight text-gray-900 dark:text-white"
                                >
                                    <a :href="'/ResearchPage'">{{
                                        Research.Title
                                    }}</a>
                                </h2>
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
    name: "DashboardPage",
    components: {
        DashboardLayout,
        PostCard,
    },
    data() {
        return {
            Researchs: [],
            Users: [],
            user: "",
        };
    },
    created() {
        const userData = localStorage.getItem("Users");
        if (userData) {
            this.user = JSON.parse(userData);
        }
    },
    mounted() {
        this.myresearsch();
        this.myuser();
    },
    methods: {
        async myresearsch() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=showResearch"
            );
            const resData = res.data;

            this.Researchs = resData.Researchs;
        },
        async myuser() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=login"
            );
            const resData = res.data;

            this.Users = resData.Users;
            console.log(this.Users);
        },
    },
};
</script>
