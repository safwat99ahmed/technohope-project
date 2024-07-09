<template>
    <div id="ResearchPage">
        <MianLayout>
            <div class="p-4 mx-auto max-w-screen-xl">
                <!-- Breadcrumb Start -->
                <nav
                    class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                    aria-label="Breadcrumb"
                >
                    <ol
                        class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse"
                    >
                        <li class="inline-flex items-center">
                            <a
                                href="/"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-teal-600 dark:text-gray-400 dark:hover:text-white"
                            >
                                <svg
                                    class="w-3 h-3 me-2.5"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
                                    />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg
                                    class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 6 10"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m1 9 4-4-4-4"
                                    />
                                </svg>
                                <a
                                    href="#"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-teal-600 md:ms-2 dark:text-gray-400 dark:hover:text-white"
                                    >Technology Tree</a
                                >
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg
                                    class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 6 10"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m1 9 4-4-4-4"
                                    />
                                </svg>
                                <a
                                    href="#"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-teal-600 md:ms-2 dark:text-gray-400 dark:hover:text-white"
                                    >Computer Science</a
                                >
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg
                                    class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 6 10"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m1 9 4-4-4-4"
                                    />
                                </svg>
                                <a
                                    href="#"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-teal-600 md:ms-2 dark:text-gray-400 dark:hover:text-white"
                                    >Artificial Intelligence (AI)</a
                                >
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg
                                    class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 6 10"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m1 9 4-4-4-4"
                                    />
                                </svg>
                                <span
                                    class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"
                                    >{{ title }}</span
                                >
                            </div>
                        </li>
                    </ol>
                </nav>
                <!-- Breadcrumb End -->

                <div
                    v-for="(eachResearch, i) in Researchs"
                    :key="i"
                    class="my-4 px-5 py-8 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700"
                >
                    <div class="heading flex">
                        <h2 class="grow text-xl font-bold tracking-tight">
                            {{ eachResearch.Title }}
                        </h2>
                        <div class="Favorite">
                            <i
                                @click="isFavorite = !isFavorite"
                                :class="[
                                    isFavorite
                                        ? 'text-teal-500 ri-star-fill'
                                        : 'text-gray-600 ri-star-line',
                                ]"
                                class="text-2xl cursor-pointer"
                            ></i>
                        </div>
                    </div>
                    <hr
                        class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700"
                    />
                    <div id="authors" class="mt-8">
                        <h3 class="text-lg font-bold tracking-tight">
                            authors:
                        </h3>
                        <div class="flex gap-4 mb-8 lg:mb-16">
                            <InventorCard
                                :name="eachResearch.Researchers"
                                :belonging="eachResearch.belong"
                            />
                        </div>
                    </div>
                    <div id="ResearchNumber" class="mt-8">
                        <h3 class="text-lg font-bold tracking-tight">
                            Research link:
                        </h3>
                        <a
                            href="#"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                            >{{ eachResearch.Research_Link }}</a
                        >
                    </div>
                    <div id="Summary" class="mt-8">
                        <h3 class="text-lg font-bold tracking-tight">
                            Summary:
                        </h3>
                        <div>
                            <h3 class="text-lg font-bold tracking-tight">
                                Summary English:
                            </h3>
                        </div>
                        <p class="text-lg">
                            {{ eachResearch.Summary_EN }}
                        </p>
                        <div>
                            <h3 class="text-lg font-bold tracking-tight">
                                Summary Arabic:
                            </h3>
                        </div>
                        <p dir="rtl" class="text-lg mb-4">
                            {{ eachResearch.Summary_AR }}
                        </p>
                    </div>
                    <div id="Attachment" class="mt-8">
                        <h3 class="text-lg font-bold tracking-tight">
                            Attachment:
                        </h3>
                        <div class="">
                            <video class="w-full rounded-lg" controls>
                                <source
                                    :src="eachResearch.video_link"
                                    type="video/mp4"
                                />
                                Your browser does not support the video tag.
                            </video>
                            <img
                                class="w-full rounded-lg"
                                :src="eachResearch.logeImg"
                                alt="Research Logo"
                                v-if="eachResearch.logeImg"
                            />
                        </div>
                    </div>
                    <div id="Evaluation" class="border rounded-lg mt-8 p-3">
                        <h3 class="text-lg font-bold tracking-tight">
                            Evaluation:
                        </h3>
                        <div class="p-4">
                            <form action="">
                                <div class="relative mb-6">
                                    <input
                                        id="evaluation-range"
                                        type="range"
                                        value="1"
                                        min="1"
                                        max="5"
                                        step="1"
                                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                    />
                                    <span
                                        class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -translate-x-[-6px] rtl:translate-x-[-6px] -bottom-6"
                                        >1</span
                                    >
                                    <span
                                        class="text-sm text-gray-500 dark:text-gray-400 absolute start-[25%] -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"
                                        >2</span
                                    >
                                    <span
                                        class="text-sm text-gray-500 dark:text-gray-400 absolute start-[50%] -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"
                                        >3</span
                                    >
                                    <span
                                        class="text-sm text-gray-500 dark:text-gray-400 absolute start-[75%] -translate-x-3/4 rtl:translate-x-1/2 -bottom-6"
                                        >4</span
                                    >
                                    <span
                                        class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -translate-x-[6px] -bottom-6"
                                        >5</span
                                    >
                                </div>
                                <button
                                    type="submit"
                                    class="text-white mt-4 bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                                >
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </MianLayout>
    </div>
</template>
<script>
import "remixicon/fonts/remixicon.css";
import MianLayout from "@/layouts/MianLayout.vue";
import InventorCard from "@/components/global/InventorCard.vue";
import authors from "../../server/json/users.json";
import axios from "axios";
authors.length = 1;
export default {
    name: "ResearchPage",
    components: { MianLayout, InventorCard },
    data() {
        return {
            //title: "The standard Lorem Ipsum passage, used since the 1500s",
            authors,
            Researchs: [],
            isFavorite: false,
        };
    },
    mounted() {
        this.myresearsch();
    },
    methods: {
        async myresearsch() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=showResearch"
            );
            const resData = res.data;

            this.Researchs = resData.Researchs;
            this.Researchs = resData.Researchs.map((Research) => {
                return {
                    ...Research,
                    video_link: `http://localhost/php/technohope-project/src/assets/${Research.attachmentFile}`,
                    logeImg: `http://localhost/php/technohope-project/src/assets/${Research.picResarch}`,
                };
            });
            console.log(this.Patents);
        },
    },
};
</script>
