<template>
    <div id="Login-page">
        <MianLayout>
            <div
                class="max-w-screen-xl mx-auto grid grid-cols-6 gap-6 my-12 p-4"
            >
                <div
                    class="loging-img hidden md:block md:col-span-3 lg:col-span-4 drop-shadow-lg rounded-[32px] overflow-hidden"
                >
                    <img
                        class="object-cover w-full h-full"
                        src="../assets/loging-img.jpg"
                        alt=""
                    />
                </div>
                <div
                    class="login-form col-span-6 md:col-span-3 lg:col-span-2 drop-shadow-lg rounded-[32px] bg-white p-8 text-center"
                >
                    <h2
                        class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"
                    >
                        <span class="text-teal-500">Log</span>in
                    </h2>
                    <hr />

                    <form class="text-start my-8">
                        <div class="mb-5">
                            <label
                                for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Email</label
                            >
                            <input
                                type="email"
                                id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                required
                                v-model="email"
                            />
                        </div>
                        <div class="mb-5">
                            <label
                                for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Password</label
                            >
                            <input
                                type="password"
                                id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                required
                                v-model="password"
                            />
                        </div>
                        <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                                <input
                                    id="remember"
                                    type="checkbox"
                                    value=""
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-teal-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-teal-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                />
                            </div>
                            <label
                                for="remember"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                >Remember me</label
                            >
                        </div>
                        <div class="w-full flex justify-between items-center">
                            <span class="text-teal-500 hover:underline"
                                ><a
                                    href="#"
                                    data-modal-target="password-modal"
                                    data-modal-toggle="password-modal"
                                    >Forgot password?</a
                                ></span
                            >
                            <button
                                type="submit"
                                @click.prevent="Onlogin()"
                                class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                            >
                                Login
                            </button>
                        </div>
                    </form>
                    <hr />
                    <div class="signup-field pt-8">
                        <div
                            class="w-full flex justify-between items-center flex-row"
                        >
                            <span>Don't have an account?</span>
                            <router-link
                                to="/Signup"
                                class="text-teal-800 border border-teal-700 hover:text-white hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                            >
                                Sign up
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- forgot password Model -->

            <div id="PasswordModelField">
                <!-- Main modal -->
                <div
                    id="password-modal"
                    tabindex="-1"
                    aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                >
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div
                            class="relative bg-white rounded-lg shadow dark:bg-gray-700"
                        >
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600"
                            >
                                <h3
                                    class="text-xl font-semibold text-gray-900 dark:text-white"
                                >
                                    Set a new password
                                </h3>
                                <button
                                    type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="password-modal"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 14 14"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                        />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <p>
                                    Please enter your email address below. We
                                    will send you instructions on how to reset
                                    your password.
                                </p>
                                <form class="max-w-sm mx-auto">
                                    <div class="mb-5">
                                        <input
                                            type="email"
                                            id="SuggestionsEmail"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                            placeholder="Email"
                                            required
                                        />
                                    </div>

                                    <button
                                        type="submit"
                                        class="block mx-auto text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-6 py-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                                    >
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </MianLayout>
    </div>
</template>
<script>
import MianLayout from "@/layouts/MianLayout.vue";
import axios from "axios";
export default {
    name: "LoginPage",
    components: { MianLayout },
    data() {
        return {
            email: null,
            password: null,
        };
    },
    methods: {
        Onlogin() {
            let data = new FormData();
            data.append("email", this.email);
            data.append("password", this.password);
            axios
                .post(
                    "http://localhost/php/technohope-project/src/api/api.php?action=login",
                    data
                )
                .then((res) => {
                    if (res.data.error) {
                        console.log("Error", res.data);
                        alert("Your Login Email or password is invalid");
                    } else {
                        console.log("Success", res.data);
                        alert(res.data.message);
                        localStorage.setItem(
                            "Users",
                            JSON.stringify(res.data.Users)
                        );
                        this.$router.push("/Dashboard");
                    }
                })
                .catch((err) => {
                    console.log("Error", err);
                });
        },
    },
};
</script>
