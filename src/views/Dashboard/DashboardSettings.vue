<template>
    <div id="DashboardSettings">
        <DashboardLayout :title="'Settings'" :subtitle="''">
            <div class="space-y-8">
                <div
                    class="flex gap-8 items-center"
                    v-for="user in users"
                    :key="user.id"
                >
                    <div class="rounded-full max-w-40">
                        <img
                            class="rounded-full"
                            src="../../assets/user.png"
                            alt="Avatar"
                        />
                    </div>
                    <div class="">
                        <h2 class="text-3xl font-extrabold">
                            {{ user.firstName }}
                        </h2>
                        <span class="text-xl text-gray-500">{{
                            user.Specialization
                        }}</span>
                    </div>
                </div>
                <div class="border-2 border-gray-300 rounded-xl p-6 space-y-5">
                    <h3 class="text-xl font-extrabold border-b mb-6">
                        Information
                    </h3>

                    <form @submit.prevent="update">
                        <div class="grid gap-6 mb-6">
                            <div>
                                <label
                                    for="FullName"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Full Name</label
                                >
                                <input
                                    type="text"
                                    id="FullName"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    placeholder="Full Name"
                                    v-model="users[0].full_name"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="JobTitle"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Job Title</label
                                >
                                <input
                                    type="text"
                                    id="JobTitle"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    placeholder="Job Title"
                                    v-model="users[0].Specialization"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    placeholder="Email"
                                    v-model="users[0].Email"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Phone number</label
                                >
                                <input
                                    type="tel"
                                    id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    placeholder="Phone number"
                                    v-model="users[0].Phone"
                                    required
                                />
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                        >
                            Save
                        </button>
                    </form>
                </div>
                <div class="border-2 border-gray-300 rounded-xl p-6 space-y-5">
                    <h3 class="text-xl font-extrabold border-b mb-6">About</h3>
                    <form>
                        <div class="grid gap-6 mb-6">
                            <div>
                                <textarea
                                    id="AboutField"
                                    rows="6"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    placeholder="Tell people about you..."
                                    v-model="about"
                                ></textarea>
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                        >
                            Save
                        </button>
                    </form>
                </div>
                <div class="border-2 border-gray-300 rounded-xl p-6 space-y-5">
                    <h3 class="text-xl font-extrabold border-b mb-6">
                        Qualifications
                    </h3>
                    <form>
                        <div class="grid gap-6 mb-6">
                            <div>
                                <textarea
                                    id="QualificationsField"
                                    rows="6"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    placeholder="Tell people about your qualifications..."
                                    v-model="qualifications"
                                ></textarea>
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                        >
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </DashboardLayout>
    </div>
</template>

<script>
import axios from "axios";
import DashboardLayout from "@/layouts/DashboardLayout.vue";

export default {
    name: "DashboardSettings",
    components: {
        DashboardLayout,
    },
    data() {
        return {
            users: [],
            about: "",
            qualifications: "",
        };
    },
    created() {
        const userData = localStorage.getItem("Users");
        if (userData) {
            this.users = JSON.parse(userData);
        }
    },
    methods: {
        update() {
            let user = this.users[0]; // Assuming updating the first user for simplicity
            let data = new FormData();
            data.append("id", user.user_id);
            data.append("fullname", user.firstName);
            data.append("email", user.Email);
            data.append("jop", user.Specialization);
            data.append("phone", user.Phone);
            axios
                .post(
                    "http://localhost/php/technohope-project/src/api/api.php?action=UpdateUser",
                    data
                )
                .then((res) => {
                    if (res.data.error) {
                        console.log("Error", res.data.message);
                    } else {
                        console.log("Success", res.data.message);
                        alert(res.data.message);
                        this.$router.push("../Login");
                    }
                })
                .catch((err) => {
                    console.log("Error", err);
                });
        },
    },
};
</script>
