<template>
    <div id="SuggestionsModelField">
        <!-- Main modal -->
        <div
            id="Suggestions-modal"
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
                            Suggestions
                        </h3>
                        <button
                            type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="Suggestions-modal"
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
                        <form class="max-w-sm mx-auto">
                            <div class="mb-5">
                                <input
                                    type="text"
                                    id="SuggestionsName"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    placeholder="Name"
                                    v-model.trim="name"
                                />
                            </div>
                            <div class="mb-5">
                                <input
                                    type="email"
                                    id="SuggestionsEmail"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    placeholder="Email"
                                    required
                                    v-model.trim="email"
                                />
                            </div>
                            <div class="mb-5">
                                <textarea
                                    id="SuggestionsMessage"
                                    rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    placeholder="Leave a Suggestions..."
                                    required
                                    v-model.trim="suggestions"
                                ></textarea>
                            </div>

                            <button
                                type="submit"
                                @click="sendsuggestions()"
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
</template>
<script>
import axios from "axios";
export default {
    name: "SuggestionsModel",
    components: {},
    data() {
        return {
            name: "",
            email: "",
            suggestions: "",
        };
    },
    methods: {
        sendsuggestions() {
            let data = new FormData();
            data.append("name", this.name);
            data.append("email", this.email);
            data.append("suggestions", this.suggestions);
            axios
                .post(
                    "http://localhost/php/technohope-project/src/api/api.php?action=addsuggestions",
                    data
                )
                .then((res) => {
                    if (res.error) {
                        console.log("Error", res);
                    } else {
                        console.log("Success", res.data);
                        //alert(res.data.message);
                    }
                })
                .catch((err) => {
                    console.log("Error", err);
                });
        },
    },
};
</script>
