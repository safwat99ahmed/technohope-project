<template>
    <section id="ContactUsSection">
        <div class="bg-white drop-shadow-lg p-8 rounded-[32px]">
            <h2 class="mb-4 text-4xl font-extrabold">Contact Us</h2>
            <hr />
            <div class="pt-8">
                <h3 class="mb-4 text-xl font-extrabold">Keep in touch</h3>
                <form class="grid grid-cols-2 gap-6 my-8">
                    <div class="mb-5">
                        <input
                            type="text"
                            id="FistName"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full py-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            placeholder="Fist Name"
                            required
                            v-model.trim="fistName"
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

                    <div class="mb-5">
                        <input
                            type="email"
                            id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full py-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            placeholder="Your email"
                            required
                            v-model.trim="email"
                        />
                    </div>

                    <div class="mb-5">
                        <input
                            type="text"
                            id="PhoneInput"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-teal-500 focus:border-teal-500 block w-full py-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            placeholder="Phone"
                            required
                            v-model.trim="phone"
                        />
                    </div>

                    <div class="mb-5 col-span-2">
                        <textarea
                            id="SuggestionsMessage"
                            rows="6"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            placeholder="Type your message here..."
                            required
                            v-model.trim="myMessage"
                        ></textarea>
                    </div>
                    <div class="col-span-2 text-center">
                        <button
                            type="submit"
                            class="text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                            @click.prevent="Onsubmit()"
                        >
                            Submit
                        </button>
                    </div>
                </form>
                <hr />
                <div
                    class="flex flex-col gap-4 mt-4 text-xl text-teal-500 font-bold"
                >
                    <span>example@demo.com</span>
                    <span>+20 11x xxx xxxx</span>
                    <div class="">
                        <div class="flex">
                            <a href="#" class="hover:text-teal-800">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="w-5 h-5"
                                >
                                    <path
                                        d="M6.94048 4.99993C6.94011 5.81424 6.44608 6.54702 5.69134 6.85273C4.9366 7.15845 4.07187 6.97605 3.5049 6.39155C2.93793 5.80704 2.78195 4.93715 3.1105 4.19207C3.43906 3.44699 4.18654 2.9755 5.00048 2.99993C6.08155 3.03238 6.94097 3.91837 6.94048 4.99993ZM7.00048 8.47993H3.00048V20.9999H7.00048V8.47993ZM13.3205 8.47993H9.34048V20.9999H13.2805V14.4299C13.2805 10.7699 18.0505 10.4299 18.0505 14.4299V20.9999H22.0005V13.0699C22.0005 6.89993 14.9405 7.12993 13.2805 10.1599L13.3205 8.47993Z"
                                    ></path>
                                </svg>
                            </a>
                            <a href="#" class="ms-5 hover:text-teal-800">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="w-5 h-5"
                                >
                                    <path
                                        d="M12.001 2C6.47813 2 2.00098 6.47715 2.00098 12C2.00098 16.9913 5.65783 21.1283 10.4385 21.8785V14.8906H7.89941V12H10.4385V9.79688C10.4385 7.29063 11.9314 5.90625 14.2156 5.90625C15.3097 5.90625 16.4541 6.10156 16.4541 6.10156V8.5625H15.1931C13.9509 8.5625 13.5635 9.33334 13.5635 10.1242V12H16.3369L15.8936 14.8906H13.5635V21.8785C18.3441 21.1283 22.001 16.9913 22.001 12C22.001 6.47715 17.5238 2 12.001 2Z"
                                    ></path>
                                </svg>
                            </a>
                            <a href="#" class="ms-5 hover:text-teal-800">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="w-5 h-5"
                                >
                                    <path
                                        d="M13.0281 2.00073C14.1535 2.00259 14.7238 2.00855 15.2166 2.02322L15.4107 2.02956C15.6349 2.03753 15.8561 2.04753 16.1228 2.06003C17.1869 2.1092 17.9128 2.27753 18.5503 2.52503C19.2094 2.7792 19.7661 3.12253 20.3219 3.67837C20.8769 4.2342 21.2203 4.79253 21.4753 5.45003C21.7219 6.0867 21.8903 6.81337 21.9403 7.87753C21.9522 8.1442 21.9618 8.3654 21.9697 8.58964L21.976 8.78373C21.9906 9.27647 21.9973 9.84686 21.9994 10.9723L22.0002 11.7179C22.0003 11.809 22.0003 11.903 22.0003 12L22.0002 12.2821L21.9996 13.0278C21.9977 14.1532 21.9918 14.7236 21.9771 15.2163L21.9707 15.4104C21.9628 15.6347 21.9528 15.8559 21.9403 16.1225C21.8911 17.1867 21.7219 17.9125 21.4753 18.55C21.2211 19.2092 20.8769 19.7659 20.3219 20.3217C19.7661 20.8767 19.2069 21.22 18.5503 21.475C17.9128 21.7217 17.1869 21.89 16.1228 21.94C15.8561 21.9519 15.6349 21.9616 15.4107 21.9694L15.2166 21.9757C14.7238 21.9904 14.1535 21.997 13.0281 21.9992L12.2824 22C12.1913 22 12.0973 22 12.0003 22L11.7182 22L10.9725 21.9993C9.8471 21.9975 9.27672 21.9915 8.78397 21.9768L8.58989 21.9705C8.36564 21.9625 8.14444 21.9525 7.87778 21.94C6.81361 21.8909 6.08861 21.7217 5.45028 21.475C4.79194 21.2209 4.23444 20.8767 3.67861 20.3217C3.12278 19.7659 2.78028 19.2067 2.52528 18.55C2.27778 17.9125 2.11028 17.1867 2.06028 16.1225C2.0484 15.8559 2.03871 15.6347 2.03086 15.4104L2.02457 15.2163C2.00994 14.7236 2.00327 14.1532 2.00111 13.0278L2.00098 10.9723C2.00284 9.84686 2.00879 9.27647 2.02346 8.78373L2.02981 8.58964C2.03778 8.3654 2.04778 8.1442 2.06028 7.87753C2.10944 6.81253 2.27778 6.08753 2.52528 5.45003C2.77944 4.7917 3.12278 4.2342 3.67861 3.67837C4.23444 3.12253 4.79278 2.78003 5.45028 2.52503C6.08778 2.27753 6.81278 2.11003 7.87778 2.06003C8.14444 2.04816 8.36564 2.03847 8.58989 2.03062L8.78397 2.02433C9.27672 2.00969 9.8471 2.00302 10.9725 2.00086L13.0281 2.00073ZM12.0003 7.00003C9.23738 7.00003 7.00028 9.23956 7.00028 12C7.00028 14.7629 9.23981 17 12.0003 17C14.7632 17 17.0003 14.7605 17.0003 12C17.0003 9.23713 14.7607 7.00003 12.0003 7.00003ZM12.0003 9.00003C13.6572 9.00003 15.0003 10.3427 15.0003 12C15.0003 13.6569 13.6576 15 12.0003 15C10.3434 15 9.00028 13.6574 9.00028 12C9.00028 10.3431 10.3429 9.00003 12.0003 9.00003ZM17.2503 5.50003C16.561 5.50003 16.0003 6.05994 16.0003 6.74918C16.0003 7.43843 16.5602 7.9992 17.2503 7.9992C17.9395 7.9992 18.5003 7.4393 18.5003 6.74918C18.5003 6.05994 17.9386 5.49917 17.2503 5.50003Z"
                                    ></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import axios from "axios";
export default {
    name: "ContactUsSection",
    data() {
        return {
            fistName: "",
            lastName: "",
            email: "",
            phone: "",
            myMessage: "",
        };
    },
    methods: {
        Onsubmit() {
            let data = new FormData();
            data.append("firstName", this.firstName);
            data.append("lastName", this.lastName);
            data.append("email", this.email);
            data.append("phone", this.phone);
            data.append("myMessage", this.myMessage);
            axios
                .post(
                    "http://localhost/php/technohope-project/src/api/api.php?action=create",
                    data
                )
                .then((res) => {
                    if (res.error) {
                        console.log("Error", res);
                        alert("Your Login Email or password is invalid");
                    } else {
                        console.log("Success", res.data);
                        alert(res.data.message);
                        // this.$router.push("/Dashboard");
                    }
                })
                .catch((err) => {
                    console.log("Error", err);
                });
        },
    },
};
</script>
