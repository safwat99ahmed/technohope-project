<template>
    <div id="PatentPage">
        <MianLayout>
            <div class="p-4 mx-auto max-w-screen-xl">
                <!-- Breadcrumb Start -->
                <nav
                    class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                    aria-label="Breadcrumb"
                >
                    <!-- Breadcrumb Content -->
                </nav>
                <!-- Breadcrumb End -->

                <div
                    v-for="(eachPatent, i) in Patents"
                    :key="i"
                    class="my-4 px-5 py-8 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700"
                >
                    <div class="heading flex">
                        <h2 class="grow text-xl font-bold tracking-tight">
                            {{ eachPatent.pantent_Titel }}
                        </h2>
                        <div class="Favorite">
                            <i
                                @click="toggleFavorite(eachPatent.id)"
                                :class="[
                                    eachPatent.isFavorite
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
                    <div class="flex gap-2 flex-col-reverse md:flex-row">
                        <div class="flex-1">
                            <div id="Inventors" class="mt-8">
                                <h3 class="text-lg font-bold tracking-tight">
                                    Inventors:
                                </h3>
                                <div class="flex gap-4 mb-8 lg:mb-16">
                                    <InventorCard
                                        :name="eachPatent.InventorName"
                                        :belonging="eachPatent.Belong"
                                    />
                                </div>
                            </div>
                            <div id="PatentNumber" class="mt-8">
                                <h3 class="text-lg font-bold tracking-tight">
                                    Patent number:
                                </h3>
                                <p>
                                    {{ eachPatent.pantent_Number }}
                                </p>
                            </div>
                        </div>
                        <div class="w-48 m-auto">
                            <img
                                :src="eachPatent.logeImg"
                                alt="Patent Logo"
                                v-if="eachPatent.logeImg"
                            />
                        </div>
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
                        <p dir="rtl" class="text-lg mb-4">
                            {{ eachPatent.summary_EN }}
                        </p>
                        <div>
                            <h3 class="text-lg font-bold tracking-tight">
                                Summary Arabic:
                            </h3>
                        </div>
                        <p class="text-lg">
                            {{ eachPatent.summary_AR }}
                        </p>
                    </div>
                    <div id="Attachment" class="mt-8">
                        <h3 class="text-lg font-bold tracking-tight">
                            Attachment:
                        </h3>
                        <div class="">
                            <video
                                class="w-full rounded-lg"
                                controls
                                alt="Patent video"
                            >
                                <source
                                    :src="eachPatent.video_link"
                                    type="video/mp4"
                                />
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    >
                </div>
            </div>
        </MianLayout>
    </div>
</template>

<script>
import "remixicon/fonts/remixicon.css";
import MianLayout from "@/layouts/MianLayout.vue";
import InventorCard from "@/components/global/InventorCard.vue";
import axios from "axios";
import Inventors from "../../server/json/users.json";
Inventors.length = 1;

export default {
    name: "PatentPage",
    components: { MianLayout, InventorCard },
    data() {
        return {
            Inventors,
            Patents: [],
        };
    },
    mounted() {
        this.fetchPatents();
    },
    methods: {
        async fetchPatents() {
            try {
                const response = await axios.get(
                    "http://localhost/php/technohope-project/src/api/api.php?action=showPatent"
                );
                const patentsData = response.data.Patents.map((patent) => ({
                    ...patent,
                    video_link: `http://localhost/php/technohope-project/src/assets/${patent.video_link}`,
                    logeImg: `http://localhost/php/technohope-project/src/assets/${patent.logeImg}`,
                }));
                this.Patents = patentsData;
            } catch (error) {
                console.error("Error fetching patents:", error);
            }
        },
        async ratePatent(patentId, rating) {
            try {
                const response = await axios.post(
                    "http://localhost/php/technohope-project/src/api/api.php?action=Uploadrate",
                    {
                        patent_id: patentId,
                        star: rating,
                    },
                    {
                        headers: {
                            "Content-Type": "application/json",
                        },
                    }
                );

                if (response.data.error) {
                    console.error(
                        "Failed to update rating:",
                        response.data.message
                    );
                    // يمكنك إضافة رسالة خطأ للمستخدم هنا إذا لزم الأمر
                } else {
                    // تحديث القيمة المحلية في الأنماط (المصادق)
                    const updatedPatents = this.Patents.map((patent) => {
                        if (patent.id === patentId) {
                            return { ...patent, rating };
                        }
                        return patent;
                    });
                    this.Patents = updatedPatents;

                    console.log("Rating updated successfully!");
                    console.log();
                }
            } catch (error) {
                console.error("Error rating patent:", error);
                // يمكنك إضافة رسالة خطأ للمستخدم هنا إذا لزم الأمر
            }
        },
    },
};
</script>
