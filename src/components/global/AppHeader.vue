<template>
    <div id="AppHeader">
        <nav
            class="shadow-lg bg-white dark:bg-gray-900 w-full z-20 top-0 start-0 mb-5 border-b border-gray-200 dark:border-gray-600"
        >
            <div
                class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-between p-4"
            >
                <a
                    href="/"
                    class="flex items-center space-x-3 rtl:space-x-reverse"
                >
                    <img
                        id="AppLogo"
                        src="../../assets/logo.svg"
                        class="h-8"
                        alt="Logo"
                    />
                    <img
                        id="DarkAppLogo"
                        src="../../assets/dark-logo.svg"
                        class="h-8 hidden"
                        alt="DarkLogo"
                    />
                </a>
                <div class="flex lg:order-2 space-x-3 rtl:space-x-reverse">
                    <!-- <DarkMode /> -->
                    <router-link
                        to="/Login"
                        class="btl-link text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                    >
                        Log in
                    </router-link>
                    <router-link
                        to="/Signup"
                        class="btl-link text-white bg-teal-500 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-4 py-2 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                    >
                        Sign up
                    </router-link>

                    <button
                        data-collapse-toggle="navbar-sticky"
                        type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky"
                        aria-expanded="false"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 17 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15"
                            />
                        </svg>
                    </button>
                </div>
                <div
                    class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1"
                    id="navbar-sticky"
                >
                    <ul
                        class="flex flex-col p-4 lg:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 lg:bg-white dark:bg-gray-800 lg:dark:bg-gray-900 dark:border-gray-700"
                    >
                        <router-link
                            to="/"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-teal-700 lg:p-0 lg:dark:hover:text-teal-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                        >
                            Home
                        </router-link>
                        <router-link
                            to="/About"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-teal-700 lg:p-0 lg:dark:hover:text-teal-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                        >
                            About
                        </router-link>
                        <router-link
                            to="/Patents"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-teal-700 lg:p-0 lg:dark:hover:text-teal-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                        >
                            Patents
                        </router-link>
                        <router-link
                            to="/TechnologyTree"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-teal-700 lg:p-0 lg:dark:hover:text-teal-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                        >
                            Technology Tree
                        </router-link>
                        <router-link
                            to="/Researchers"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-teal-700 lg:p-0 lg:dark:hover:text-teal-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                        >
                            Researchers
                        </router-link>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
// import DarkMode from "@/components/global/DarkMode.vue";
export default {
    name: "AppHeader",
    components: {
        // DarkMode,
    },
};
</script>

<style scoped>
.router-link-active {
    color: #0f766e !important;
}

.router-link-active.btl-link {
    color: #fff !important;
    text-decoration: underline;
}
</style>
