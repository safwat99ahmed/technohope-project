<template>
    <div id="Researchers-page">
        <MianLayout>
            <div class="p-4 mx-auto max-w-screen-xl">
                <h2
                    class="my-8 text-center text-4xl font-extrabold tracking-tight"
                >
                    Accredited <span class="text-teal-500">Researchers</span>
                </h2>
                <form class="w-full md:w-1/2 mx-auto">
                    <input
                        type="search"
                        id="researchers-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                        placeholder="Are you looking for someone?"
                        v-model="search"
                    />
                </form>
                <div class="grid gap-8 my-8 lg:mb-16 md:grid-cols-3">
                    <UserCard
                        v-for="user in users"
                        :key="user.id"
                        :name="user.firstName"
                    />
                </div>
            </div>
        </MianLayout>
    </div>
</template>
<script>
import MianLayout from "@/layouts/MianLayout.vue";
import UserCard from "@/components/global/UserCard.vue";
import axios from "axios";
UserCard.length = 6;
export default {
    name: "ResearchersPage",
    components: { MianLayout, UserCard },
    data() {
        return { search: "", users: [] };
    },
    computed: {
        filteredUsers() {
            return this.users.filter((user) => {
                return user.name.toLowerCase().match(this.search.toLowerCase());
            });
        },
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
