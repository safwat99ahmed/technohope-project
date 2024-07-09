<template>
    <div id="Signup-page">
        <MianLayout>
            <div class="max-w-3xl mx-auto p-4">
                .
                <div class="drop-shadow-lg rounded-[32px] bg-white p-8">
                    <h2
                        class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"
                    >
                        <span class="text-teal-500">Sign </span>up
                    </h2>
                    <p class="my-4 text-gray-600 text-xl">
                        Get started absolutely free, Enter your details below.
                    </p>
                    <hr />

                    <form class="grid grid-cols-2 gap-6 my-8">
                        <div class="mb-5">
                            <input
                                type="text"
                                id="FistName"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full py-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                placeholder="Fist Name"
                                required
                                v-model.trim="firstName"
                            />
                        </div>
                        <div class="mb-5">
                            <input
                                type="text"
                                id="LastName"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full py-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                placeholder="Last Name"
                                required
                                v-model.trim="lastName"
                            />
                        </div>

                        <div class="mb-5 col-span-2">
                            <input
                                type="email"
                                id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full py-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                placeholder="Your email"
                                required
                                v-model.trim="email"
                            />
                        </div>
                        <div class="mb-5 col-span-2">
                            <input
                                type="password"
                                id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full py-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                placeholder="Password"
                                required
                                v-model.trim="password"
                            />
                        </div>
                        <div class="mb-5 col-span-2">
                            <input
                                type="password"
                                id="ConfirmPassword"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full py-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                placeholder="Confirm password"
                                required
                                v-model.trim="confirmPassword"
                            />
                        </div>
                        <div class="mb-5">
                            <input
                                type="text"
                                id="FunctionTitle"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full py-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                placeholder="Function"
                                required
                                v-model.trim="funCtion"
                            />
                        </div>
                        <div class="mb-5">
                            <input
                                type="text"
                                id="SpecializationTitle"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full py-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                placeholder="Specialization"
                                required
                                v-model.trim="specialization"
                            />
                        </div>
                        <div class="mb-5 col-span-2">
                            <input
                                type="number"
                                id="PhoneInput"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full py-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                placeholder="Phone"
                                required
                                v-model.trim="phone"
                            />
                        </div>
                        <div class="mb-5 col-span-2">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="cv_input"
                                >Upload CV</label
                            >
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="cv_input_help"
                                id="cv_input"
                                type="file"
                                @input="validatecvfile($event)"
                                @change="validatecvfile($event)"
                                ref="cvfile"
                            />
                            <p
                                class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                id="cv_input_help"
                            >
                                PDF, PNG or JPG (MAX. 1MB).
                            </p>
                        </div>
                        <div class="col-span-2 flex items-start mb-5">
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
                                class="ms-2 text-sm font-medium text-teal-500 dark:text-gray-300"
                                >I agree to Technohub's Terms of Service and
                                Privacy Policy</label
                            >
                        </div>
                        <div class="col-span-2 text-center">
                            <button
                                type="submit"
                                @click.prevent="onSignup()"
                                class="text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                            >
                                Sign up
                            </button>
                        </div>
                    </form>
                    <hr />
                    <div class="signup-field pt-8">
                        <div
                            class="w-full flex justify-between items-center flex-row"
                        >
                            <span>Do have an account?</span>
                            <router-link
                                to="/login"
                                class="text-teal-800 border border-teal-700 hover:text-white hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center"
                            >
                                Login
                            </router-link>
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
    name: "SignupPage",
    components: { MianLayout },
    data() {
        return {
            firstName: "",
            lastName: "",
            email: "",
            password: "",
            confirmPassword: "",
            funCtion: "",
            specialization: "",
            phone: "",
            cvfile: "", // CV file},

            passwordsDoNotMatch: false,
        };
    },
    methods: {
        validatecvfile() {
            this.cvfile = this.$refs.cvfile.files[0];
        },
        onSignup() {
            if (this.password !== this.confirmPassword) {
                this.passwordsDoNotMatch = true;
                // return;
                alert("Password does not match the confirmation!");
            } else {
                // Continue with the signup process, e.g., send data to the backend
                let data = new FormData();
                data.append("firstName", this.firstName);
                data.append("lastName", this.lastName);
                data.append("email", this.email);
                data.append("password", this.password);
                data.append("funCtion", this.funCtion);
                data.append("specialization", this.specialization);
                data.append("phone", this.phone);
                data.append("cvfile", this.cvfile);

                axios
                    .post(
                        "http://localhost/php/technohope-project/src/api/api.php?action=Signup",
                        data
                    )
                    .then((res) => {
                        if (res.data.error) {
                            console.log("Success", res.data);
                            alert(res.data.message);
                        } else {
                            console.log("Error", res.data);
                            alert(res.message);
                            this.$router.push("/Login");
                        }
                    })
                    .catch((err) => {
                        console.log("Error", err);
                    });
            }
        },
    },
};
</script>
