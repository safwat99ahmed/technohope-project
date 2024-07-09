<template>
    <section id="ResearchsSection" class="py-12">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2
                    class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"
                >
                    Popular <span class="text-teal-500"> researchs</span> on
                    Technohope
                </h2>
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
                    :postUrl="'/ResearchPage'"
                />
            </div>
            <div class="mt-5 w-full text-end">
                <router-link
                    to="/TechnologyTree"
                    class="inline-block text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-6 py-4 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                >
                    Show more → </router-link
                >v
            </div>
        </div>
    </section>
</template>
<script>
import PostCard from "@/components/global/PostCard.vue";
import axios from "axios";
//Researchs.length = 4;
export default {
    name: "ResearchsSection",
    components: {
        PostCard,
    },
    data() {
        return {
            Researchs: [],
        };
    },
    mounted() {
        this.myresearsch();
    },
    methods: {
        async myresearsch() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=showResearch"
            );
            const resData = res.data;

            this.Researchs = resData.Researchs;
        },
    },
};
</script>

<style></style>
