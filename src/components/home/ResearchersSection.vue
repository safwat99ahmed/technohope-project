<template>
    <section id="ResearchersSection" class="bg-white py-12">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2
                    class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"
                >
                    Accredited <span class="text-teal-500">Researchers</span>
                </h2>
            </div>
            <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-3">
                <UserCard
                    v-for="user in users"
                    :key="user.id"
                    :name="user.firstName"
                    :email="user.Email"
                    :specialization="user.Specialization"
                />
            </div>
            <div class="mt-5 w-full text-end">
                <router-link
                    to="/Researchers"
                    class="inline-block text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-6 py-4 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                >
                    Show more →
                </router-link>
            </div>
        </div>
    </section>
</template>
<script>
import UserCard from "@/components/global/UserCard.vue";

import axios from "axios";
export default {
    name: "ResearchersSection",
    components: {
        UserCard,
    },
    data() {
        return {
            users: [],
        };
    },
    mounted() {
        this.Users();
    },
    methods: {
        async Users() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=showUser"
            );
            const resData = res.data;

            this.users = resData.users;
        },
    },
};
</script>
