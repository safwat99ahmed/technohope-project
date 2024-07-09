<template>
    <div id="UserProfile">
        <MianLayout>
            <div
                class="max-w-screen-xl mx-auto p-8 space-y-8"
                v-for="(eachuser, i) in users"
                :key="i"
            >
                <div class="flex gap-8 items-center">
                    <div class="rounded-full max-w-40">
                        <img
                            class="rounded-full"
                            src="../assets/user.png"
                            alt="Avatar"
                        />
                    </div>
                    <div class="">
                        <h2 class="text-3xl font-extrabold">
                            {{ eachuser.full_name }}
                        </h2>
                        <span class="text-xl text-gray-500">{{
                            eachuser.Specialization
                        }}</span>
                    </div>
                </div>
                <div class="border-2 border-gray-300 rounded-xl p-6 space-y-5">
                    <h3 class="text-xl font-extrabold border-b mb-6">
                        Information
                    </h3>
                    <div>
                        <h4 class="font-extrabold">Full Name</h4>
                        <p>{{ eachuser.full_name }}</p>
                    </div>
                    <div>
                        <h4 class="font-extrabold">Email</h4>
                        <p>{{ eachuser.Email }}</p>
                    </div>
                    <div>
                        <h4 class="font-extrabold">Phone Number</h4>
                        <p>{{ eachuser.Phone }}</p>
                    </div>
                </div>
                <div class="border-2 border-gray-300 rounded-xl p-6 space-y-5">
                    <h3 class="text-xl font-extrabold border-b mb-6">About</h3>
                    <div>
                        <p>
                            {{ eachuser.About }}
                        </p>
                    </div>
                </div>
                <div class="border-2 border-gray-300 rounded-xl p-6 space-y-5">
                    <h3 class="text-xl font-extrabold border-b mb-6">
                        Qualifications
                    </h3>
                    <div>
                        <p>{{ eachuser.Qualifications }}</p>
                    </div>
                </div>
                <div class="border-2 border-gray-300 rounded-xl p-6 space-y-5">
                    <h3 class="text-xl font-extrabold border-b mb-6">
                        Patents
                    </h3>
                    <div>
                        <div class="grid gap-8">
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
                </div>
                <div class="border-2 border-gray-300 rounded-xl p-6 space-y-5">
                    <h3 class="text-xl font-extrabold border-b mb-6">
                        Researchs
                    </h3>
                    <div>
                        <div class="grid gap-8">
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
    name: "UserProfile",
    components: { MianLayout, PostCard },
    data() {
        return {
            Researchs: [],
            Patents: [],
            users: [],
        };
    },
    mounted() {
        this.myresearsch();
        this.mypatent();
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
        async mypatent() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=showPatent"
            );
            const resData = res.data;

            this.Patents = resData.Patents;
            console.log(this.s);
        },
        async myuser() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=showUsers"
            );
            const resData = res.data;

            this.users = resData.Users;
            console.log(this.users);
        },
    },
};
</script>
