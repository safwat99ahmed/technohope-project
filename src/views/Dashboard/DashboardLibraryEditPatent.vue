<template>
    <div
        v-for="(eachPatent, i) in Patents"
        :key="i"
        id="DashboardLibraryEditPatent"
    >
        <DashboardLayout :title="'Edit patent'" :subtitle="'Library / Patents'">
            <div>
                <div class="delete">
                    <button
                        class="text-red-500 border border-red-500 rounded-lg py-1 px-2 hover:bg-red-500 hover:text-white"
                    >
                        Delete
                    </button>
                </div>
                <div
                    class="my-4 p-5 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700"
                >
                    <div id="IdNumber">
                        <h3 class="text-lg font-bold tracking-tight">
                            ID Number:
                        </h3>
                        <p>{{ eachPatent.pantent_id }}</p>
                    </div>
                    <form @submit.prevent="updatePatent(eachPatent)">
                        <div id="title" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight">
                                Title:
                            </h3>
                            <div class="mb-6">
                                <input
                                    type="text"
                                    id="title_input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    placeholder="Title"
                                    v-model="eachPatent.pantent_Titel"
                                    required
                                />
                            </div>
                        </div>
                        <div id="Summary" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight">
                                Summary:
                            </h3>

                            <div class="mb-6">
                                <label
                                    for="arSummary"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Arabic summary:
                                </label>
                                <textarea
                                    dir="rtl"
                                    id="arSummary"
                                    rows="10"
                                    v-model="eachPatent.summary_AR"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    value="هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع. ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق."
                                ></textarea>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="enSummary"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >English summary:
                                </label>
                                <textarea
                                    id="enSummary"
                                    v-model="eachPatent.summary_EN"
                                    rows="10"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    value=" ipsum dolor, sit amet consectetu elit. Nam animi optio voluptatum quo autem ex eaque quaerat quibusdam tenetur. Id hic, iure consequatur in deserunt ea sequi dolore, aut temporibus, alias tempora accusantium accusamus amet. Quas ex velit non pariatur amet, libero, iste ipsam perspiciatis labore nostrum repellat aliquam! Consectetur molestias, nostrum optio voluptates, harum reprehenderit quasi sed quam in assumenda iure cum vel? Asperiores obcaecati deserunt veniam id deleniti sapiente, possimus iusto facilis laboriosam placeat non blanditiis enim dolore! Soluta consequatur voluptate voluptas quae ipsum autem ut officia itaque obcaecati eveniet sint ducimus dolore, veniam nihil suscipit nobis quisquam!"
                                ></textarea>
                            </div>
                        </div>
                        <div id="Attachment" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight">
                                Attachment:
                            </h3>
                            <div class="mb-6">
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="Attachment_input"
                                    type="file"
                                />
                            </div>
                        </div>
                        <div id="Related_technology" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight">
                                Related technology:
                            </h3>
                            <span>(multiple selection)</span>
                            <div class="mb-6">
                                <select
                                    multiple
                                    id="related_technology_multiple"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full h-64 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                >
                                    <optgroup
                                        class="font-bold"
                                        label="Computer science:"
                                    >
                                        <option
                                            value="Artificial Intelligence (AI)"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Artificial Intelligence (AI)'
                                                )
                                            "
                                        >
                                            Artificial Intelligence (AI)
                                        </option>
                                        <option
                                            value="Information Technology (IT)"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Information Technology (IT)'
                                                )
                                            "
                                        >
                                            Information Technology (IT)
                                        </option>
                                        <option
                                            value="Software development"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Software development'
                                                )
                                            "
                                        >
                                            Software development
                                        </option>
                                        <option
                                            value="Communication Technology"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Communication Technology'
                                                )
                                            "
                                        >
                                            Communication Technology
                                        </option>
                                        <option
                                            value="Data technology"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Data technology'
                                                )
                                            "
                                        >
                                            Data technology
                                        </option>
                                    </optgroup>
                                    <optgroup
                                        class="font-bold mt-3"
                                        label="Electrical and electronic engineering:"
                                    >
                                        <option
                                            value="Electrical Engineering"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Electrical Engineering'
                                                )
                                            "
                                        >
                                            Electrical Engineering
                                        </option>
                                        <option
                                            value="Electronic Engineering"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Electronic Engineering'
                                                )
                                            "
                                        >
                                            Electronic Engineering
                                        </option>
                                        <option
                                            value="Power Engineering"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Power Engineering'
                                                )
                                            "
                                        >
                                            Power Engineering
                                        </option>
                                    </optgroup>
                                    <optgroup
                                        class="font-bold mt-3"
                                        label="Medicine and health:"
                                    >
                                        <option
                                            value="Medical Imaging Technology"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Medical Imaging Technology'
                                                )
                                            "
                                        >
                                            Medical Imaging Technology
                                        </option>
                                        <option
                                            value="Medical Devices Technology"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Medical Devices Technology'
                                                )
                                            "
                                        >
                                            Medical Devices Technology
                                        </option>
                                        <option
                                            value="Prosthetics and Artificial Organs Technology"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Prosthetics and Artificial Organs Technology'
                                                )
                                            "
                                        >
                                            Prosthetics and Artificial Organs
                                            Technology
                                        </option>
                                        <option
                                            value="Tissue Engineering"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Tissue Engineering'
                                                )
                                            "
                                        >
                                            Tissue Engineering
                                        </option>
                                    </optgroup>
                                    <optgroup
                                        class="font-bold mt-3"
                                        label="Energy and environmental technology:"
                                    >
                                        <option
                                            value="Renewable Energy Technology"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Renewable Energy Technology'
                                                )
                                            "
                                        >
                                            Renewable Energy Technology
                                        </option>
                                        <option
                                            value="Nuclear Energy Technology"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Nuclear Energy Technology'
                                                )
                                            "
                                        >
                                            Nuclear Energy Technology
                                        </option>
                                        <option
                                            value="Thermal Energy Technology"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Thermal Energy Technology'
                                                )
                                            "
                                        >
                                            Thermal Energy Technology
                                        </option>
                                        <option
                                            value="Energy Management Technology"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Energy Management Technology'
                                                )
                                            "
                                        >
                                            Energy Management Technology
                                        </option>
                                        <option
                                            value="Waste Management Technology"
                                            :selected="
                                                eachPatent.related_technology?.includes(
                                                    'Waste Management Technology'
                                                )
                                            "
                                        >
                                            Waste Management Technology
                                        </option>
                                    </optgroup>
                                </select>
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
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import axios from "axios";
export default {
    name: "DashboardLibraryEditPatent",
    components: {
        DashboardLayout,
    },
    data() {
        return {
            Patents: [],
            selectedPatent: null,
        };
    },
    mounted() {
        this.mypatent();
        const storedPatent = localStorage.getItem("selectedPatent");
        if (storedPatent) {
            this.selectedPatent = JSON.parse(storedPatent);
        }
    },
    methods: {
        async mypatent() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=showPatent"
            );
            const resData = res.data;

            this.Patents = resData.Patents;
            // Ensure related_technology is initialized as an array if it doesn't exist
            this.Patents = resData.Patents.map((patent) => ({
                ...patent,
                related_technology: patent.Related_technology || [],
            }));
            console.log(this.Patents);
        },
        async updatePatent(patent) {
            console.log("Patent data to be updated:", patent);
            if (
                !patent.patent_Title ||
                !patent.ar_summary ||
                !patent.en_summary ||
                !patent.related_technology
            ) {
                alert("All fields are required.");
                return;
            }
            try {
                let res = await axios.post(
                    "http://localhost/php/technohope-project/src/api/api.php?action=updatePatent",
                    {
                        patent_id: patent.patent_id,
                        patent_Title: patent.patent_Title,
                        ar_summary: patent.ar_summary,
                        en_summary: patent.en_summary,
                        related_technology: patent.related_technology,
                    }
                );
                if (res.data.success) {
                    alert("Patent updated successfully!");
                } else {
                    console.error("Failed to update patent:", res.data);
                    alert(
                        `Failed to update patent. Server response: ${res.data.error}`
                    );
                }
            } catch (error) {
                console.error(
                    "Error updating patent:",
                    error.response ? error.response.data : error
                );
                alert("An error occurred while updating the patent.");
            }
        },
    },
};
</script>
