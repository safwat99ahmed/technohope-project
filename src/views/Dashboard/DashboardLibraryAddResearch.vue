<template>
    <div id="DashboardLibraryAddResearch">
        <DashboardLayout
            :title="'Add research'"
            :subtitle="'Library / Research'"
        >
            <div>
                <div
                    class="my-4 p-5 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700"
                >
                    <form>
                        <div id="title" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight">
                                Title:
                            </h3>
                            <div class="mb-6">
                                <input
                                    type="text"
                                    id="title_input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    required
                                    v-model="title"
                                />
                            </div>
                        </div>
                        <div id="Researchers" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight">
                                Researchers:
                            </h3>
                            <div class="mb-6">
                                <fieldset
                                    v-for="Num in researchersNumber"
                                    :key="Num"
                                    class="border rounded p-4 mb-5"
                                >
                                    <legend class="px-3 font-bold">
                                        Researcher {{ Num }}
                                    </legend>

                                    <div class="mb-5">
                                        <label
                                            :for="'researcher_name_' + Num"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            >Name:</label
                                        >
                                        <input
                                            type="text"
                                            v-model="researchersData"
                                            :id="'researcher_name_' + Num"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        />
                                    </div>
                                    <div class="mb-5">
                                        <label
                                            :for="'researcher_belonging_' + Num"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            >Belonging:</label
                                        >
                                        <input
                                            type="text"
                                            v-model="belongingData"
                                            :id="'researcher_belonging_' + Num"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        />
                                    </div>
                                </fieldset>
                                <div class="btns">
                                    <button
                                        type="button"
                                        @click="addResearcher"
                                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800"
                                    >
                                        Add researcher
                                    </button>
                                    <button
                                        type="button"
                                        v-if="researchersNumber > 1"
                                        @click="removeResearcher"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    >
                                        remove researcher
                                    </button>
                                </div>
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
                                    v-model.trim="arSummary"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
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
                                    rows="10"
                                    v-model.trim="enSummary"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                ></textarea>
                            </div>
                        </div>
                        <div id="researchLink" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight mb-5">
                                Paper link:
                            </h3>
                            <div class="mb-6">
                                <input
                                    type="url"
                                    id="research_link_input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    required
                                    v-model.trim="researchLink"
                                />
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
                                    @input="validateattachment($event)"
                                    @change="validateattachment($event)"
                                    ref="attachment"
                                />
                            </div>
                        </div>
                        <div class="mb-6">
                            <input
                                type="file"
                                id="logo_input"
                                accept="image/png, image/jpg, image/jpeg"
                                ref="imgattac"
                                @input="validatepic($event)"
                                @change="validatepic($event)"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            />
                            <span class="text-gray-500"
                                >Olny ( Png, Jpg, Jpeg)</span
                            >
                        </div>
                        <div id="Related_technology" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight">
                                Related technology:
                            </h3>
                            <span class="text-gray-500"
                                >(For multi-selection, hold down Ctrl key)</span
                            >
                            <div class="mb-6">
                                <select
                                    multiple
                                    v-model.trim="RrlTechnology"
                                    id="related_technology_multiple"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full h-64 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                >
                                    <optgroup
                                        class="font-bold"
                                        label="Computer science:"
                                    >
                                        <option
                                            value="Artificial Intelligence (AI)"
                                        >
                                            Artificial Intelligence (AI)
                                        </option>
                                        <option
                                            value="Information Technology (IT)"
                                        >
                                            Information Technology (IT)
                                        </option>
                                        <option value="Software development">
                                            Software development
                                        </option>
                                        <option
                                            value="Communication Technology"
                                        >
                                            Communication Technology
                                        </option>
                                        <option value="Data technology">
                                            Data technology
                                        </option>
                                    </optgroup>
                                    <optgroup
                                        class="font-bold mt-3"
                                        label="Electrical and electronic engineering:"
                                    >
                                        <option value="Electrical Engineering">
                                            Electrical Engineering
                                        </option>
                                        <option value=" Electronic Engineering">
                                            Electronic Engineering
                                        </option>
                                        <option value="Power Engineering">
                                            Power Engineering
                                        </option>
                                    </optgroup>
                                    <optgroup
                                        class="font-bold mt-3"
                                        label="Medicine and health:"
                                    >
                                        <option
                                            value=" Medical Imaging Technology"
                                        >
                                            Medical Imaging Technology
                                        </option>
                                        <option
                                            value="Medical Devices Technology"
                                        >
                                            Medical Devices Technology
                                        </option>
                                        <option
                                            value="Prosthetics and Artificial Organs Technology"
                                        >
                                            Prosthetics and Artificial Organs
                                            Technology
                                        </option>
                                        <option value="Tissue Engineering">
                                            Tissue Engineering
                                        </option>
                                    </optgroup>
                                    <optgroup
                                        class="font-bold mt-3"
                                        label="Energy and environmental technology:"
                                    >
                                        <option
                                            value="Renewable Energy Technology"
                                        >
                                            Renewable Energy Technology
                                        </option>
                                        <option
                                            value="Nuclear Energy Technology"
                                        >
                                            Nuclear Energy Technology
                                        </option>
                                        <option
                                            value=" Thermal Energy Technology"
                                        >
                                            Thermal Energy Technology
                                        </option>
                                        <option
                                            value="Energy Management Technology"
                                        >
                                            Energy Management Technology
                                        </option>
                                        <option
                                            value="Waste Management Technology"
                                        >
                                            Waste Management Technology
                                        </option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <button
                            type="submit"
                            @click.prevent="uplaodResearch()"
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
    name: "DashboardLibraryAddResearch",
    components: {
        DashboardLayout,
    },
    data() {
        return {
            title: "",
            arSummary: "",
            enSummary: "",
            attachment: "",
            RrlTechnology: [],
            researchLink: "",
            researchersNumber: 1,
            researchersData: "",
            belongingData: "",
        };
    },
    methods: {
        addResearcher() {
            this.researchersNumber++;
        },
        removeResearcher() {
            this.researchersNumber--;
        },
        validateattachment() {
            this.attachment = this.$refs.attachment.files[0];
        },
        validatepic() {
            this.imgattac = this.$refs.imgattac.files[0];
        },
        uplaodResearch() {
            let data = new FormData();
            data.append("title", this.title);
            data.append("arSummary", this.arSummary);
            data.append("enSummary", this.enSummary);
            data.append("attachment", this.attachment);
            data.append("researchLink", this.researchLink);
            data.append("researchersData", this.researchersData);
            data.append("belongingData", this.belongingData);
            data.append("RrlTechnology", this.RrlTechnology);
            data.append("image", this.imgattac);
            axios
                .post(
                    "http://localhost/php/technohope-project/src/api/api.php?action=UplaodResersh",
                    data
                )
                .then((res) => {
                    if (res.error) {
                        console.log("Error", res.data);
                    } else {
                        console.log("Success", res.data);
                        alert(res.data.message);
                    }
                })
                .catch((err) => {
                    console.log("Error", err);
                });
        },
    },
};
</script>
