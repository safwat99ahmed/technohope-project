<template>
    <div>
        <div id="sidebar">
            <button
                data-drawer-target="default-sidebar"
                data-drawer-toggle="default-sidebar"
                aria-controls="default-sidebar"
                type="button"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            >
                <span class="sr-only">Open sidebar</span>
                <svg
                    class="w-6 h-6"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        clip-rule="evenodd"
                        fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                    ></path>
                </svg>
            </button>

            <aside
                id="default-sidebar"
                class="fixed top-0 left-0 z-40 w-[14rem] md:m-4 h-screen md:h-[96vh] transition-transform -translate-x-full sm:translate-x-0"
                aria-label="Sidebar"
            >
                <div
                    class="h-full px-3 py-4 md:rounded-xl drop-shadow-md overflow-y-auto bg-gray-50 dark:bg-gray-800"
                >
                    <a
                        href="/"
                        class="flex items-center justify-center border-b ps-2.5 pt-3 pb-5 mb-3"
                    >
                        <img
                            src="../assets/logo.svg"
                            class="h-6 me-3 sm:h-7"
                            alt="Logo"
                        />
                    </a>
                    <ul class="space-y-2 font-medium">
                        <li>
                            <router-link
                                to="/Dashboard"
                                class="flex items-center justify-center p-2 text-teal-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                            >
                                <span class="">Home</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/Dashboard/Library"
                                class="flex items-center justify-center p-2 text-teal-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                            >
                                <span class="">Library</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/Dashboard/Settings"
                                class="flex items-center justify-center p-2 text-teal-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                            >
                                <span class="">Settings</span>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
        <div id="content">
            <div class="p-4 sm:ml-64">
                <div id="dashboardHeader" class="flex mb-6">
                    <div class="grow">
                        <span
                            class="block h-6 text-xl tracking-tight text-gray-900 dark:text-white"
                            >{{ subtitle }}</span
                        >
                        <h1
                            class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white"
                        >
                            {{ title }}
                        </h1>
                    </div>
                    <div class="flex gap-5 items-center">
                        <div id="notificationsField">
                            <button
                                id="dropdownNotificationButton"
                                data-dropdown-toggle="dropdownNotification"
                                type="button"
                                class="relative bg-white p-2 rounded-full w-10 h-10 text-center cursor-pointer drop-shadow"
                            >
                                <i class="ri-notification-2-fill"></i>
                                <span
                                    v-if="notificationsArr.length > 0"
                                    class="top-0 start-7 absolute w-3.5 h-3.5 bg-red-500 border-2 border-white dark:border-gray-800 rounded-full"
                                ></span>
                            </button>
                            <!-- Dropdown menu -->
                            <div
                                id="dropdownNotification"
                                class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700"
                                aria-labelledby="dropdownNotificationButton"
                            >
                                <div
                                    class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white"
                                >
                                    Notifications
                                </div>
                                <div
                                    class="divide-y divide-gray-100 dark:divide-gray-700"
                                >
                                    <span
                                        v-if="notificationsArr.length == 0"
                                        class="block px-4 py-3"
                                        >There are no notifications yet</span
                                    >
                                    <a
                                        v-for="(noti, i) in notificationsArr"
                                        :key="i"
                                        href="#"
                                        class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700"
                                    >
                                        {{ noti }}
                                    </a>
                                </div>
                                <button
                                    v-if="notificationsArr.length > 0"
                                    @click="notificationsArr = []"
                                    type="button"
                                    class="block w-full py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white"
                                >
                                    <div class="inline-flex items-center">
                                        <svg
                                            class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 20 14"
                                        >
                                            <path
                                                d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"
                                            />
                                        </svg>
                                        View all
                                    </div>
                                </button>
                            </div>
                        </div>
                        <router-link to="/">
                            <div
                                class="bg-white p-2 rounded-full w-10 h-10 text-center drop-shadow"
                            >
                                <i class="ri-logout-box-r-line"></i>
                            </div>
                        </router-link>
                    </div>
                </div>
                <div id="dashboardbody"><slot /></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "DashboardLayout",
    props: ["title", "subtitle"],
    components: {},
    data() {
        return {
            notificationsArr: [
                "notifications 01",
                "notifications 02",
                "notifications 03",
                "notifications 04",
            ],
        };
    },
};
</script>

<style scoped>
.router-link-active {
    color: white !important;
    background: rgb(6 148 162 / var(--tw-text-opacity)) !important;
}
</style>
