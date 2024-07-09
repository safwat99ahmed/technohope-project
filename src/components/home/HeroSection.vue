<template>
    <section id="HeroSection">
        <div class="mx-auto max-w-screen-xl text-center p-4 my-52">
            <h1
                class="fs mb-4 text-5xl font-extrabold tracking-tight text-gray-900 md:text-6xl dark:text-white"
            >
                Discover the world <br />
                of
                <span class="text-teal-500">Technohope</span>
            </h1>
            <p
                class="mb-6 text-lg font-normal text-gray-600 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400"
            >
                Promoting innovation by paying attention to new and important
                research by presenting it and highlighting it through the
                platform.
            </p>

            <form
                class="w-full md:w-1/2 mx-auto"
                @submit.prevent="searchDatabase"
            >
                <label
                    for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
                    >Search</label
                >
                <div class="relative">
                    <div
                        class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                    ></div>
                    <input
                        type="search"
                        id="default-search"
                        v-model="searchQuery"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                        placeholder="Find research related to your field..."
                        required
                    />
                    <button
                        type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                    >
                        <svg
                            class="w-4 h-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 20 20"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                            />
                        </svg>
                    </button>
                </div>
                <div v-if="results.length">
                    <ul>
                        <li v-for="result in results" :key="result.id">
                            {{ result.name }}
                        </li>
                    </ul>
                </div>
                <div v-else>No results found.</div>
            </form>
        </div>
    </section>
</template>
<script>
export default {
    name: "HeroSection",
    data() {
        return {
            searchQuery: "",
            results: [],
        };
    },
    methods: {
        async searchDatabase() {
            if (this.searchQuery.length > 2) {
                try {
                    const response = await fetch(
                        `http://localhost/php/technohope-project/src/api/search.php?action=searchit&q=${this.searchQuery}`
                    );
                    this.results = await response.json();
                } catch (error) {
                    console.error("Error fetching search results:", error);
                }
            } else {
                this.results = [];
            }
        },
    },
};
</script>
