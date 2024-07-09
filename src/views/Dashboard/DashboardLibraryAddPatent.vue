<template>
    <div id="DashboardLibraryAddPatent">
        <DashboardLayout :title="'Add patent'" :subtitle="'Library / Patents'">
            <div>
                <div
                    class="my-4 p-5 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700"
                >
                    <form method="post" enctype="multipart/form-data">
                        <div id="title" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight">
                                Title:
                            </h3>
                            <div class="mb-6">
                                <input
                                    type="text"
                                    id="title_input"
                                    v-model.trim="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                    required
                                />
                            </div>
                        </div>
                        <div id="PatentLogo" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight">
                                Logo:
                            </h3>
                            <div class="mb-6">
                                <input
                                    type="file"
                                    id="logo_input"
                                    accept="image/png, image/jpg, image/jpeg"
                                    ref="imgName"
                                    @input="validatelogo($event)"
                                    @change="validatelogo($event)"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                />
                                <span class="text-gray-500"
                                    >Olny ( Png, Jpg, Jpeg)</span
                                >
                            </div>
                        </div>
                        <div id="Inventors" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight">
                                Inventors:
                            </h3>
                            <div class="mb-6">
                                <fieldset
                                    v-for="Num in inventorsNumber"
                                    :key="Num"
                                    class="border rounded p-4 mb-5"
                                >
                                    <legend class="px-3 font-bold">
                                        Inventor {{ Num }}
                                    </legend>

                                    <div class="mb-5">
                                        <label
                                            :for="'inventor_name_' + Num"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            >Name:</label
                                        >
                                        <input
                                            type="text"
                                            v-model="inventorsData"
                                            :id="'inventor_name_' + Num"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        />
                                    </div>
                                    <div class="mb-5">
                                        <label
                                            :for="'inventor_belonging_' + Num"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            >Belonging:</label
                                        >
                                        <input
                                            type="text"
                                            v-model="belongData"
                                            :id="'inventor_belonging_' + Num"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        />
                                    </div>
                                </fieldset>
                                <div class="btns">
                                    <button
                                        type="button"
                                        @click="addInventor"
                                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800"
                                    >
                                        Add inventor
                                    </button>
                                    <button
                                        type="button"
                                        v-if="inventorsNumber > 1"
                                        @click="removeInventor"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    >
                                        remove inventor
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
                        <div id="PatentNumber" class="mt-8">
                            <h3 class="text-lg font-bold tracking-tight mb-5">
                                Patent number:
                            </h3>
                            <div class="mb-6">
                                <div class="mb-5">
                                    <label
                                        for="patent_authenticator"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >The name of the authenticator:</label
                                    >
                                    <input
                                        type="text"
                                        id="patent_authenticator"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        required
                                        v-model.trim="pat_authenticator"
                                    />
                                </div>
                                <div class="mb-5">
                                    <label
                                        for="patent_number_input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Patent number:</label
                                    >
                                    <input
                                        type="text"
                                        id="patent_number_input"
                                        v-model.trim="patNumper"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        required
                                    />
                                </div>
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
                                    @input="validatepatent($event)"
                                    @change="validatepatent($event)"
                                    ref="patent"
                                />
                            </div>
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
                                        <option value="Electronic Engineering">
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
                                            value="Medical Imaging Technology"
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
                                            value="Thermal Energy Technology"
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
                            name="submit"
                            @click.prevent="addPataent()"
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
    name: "DashboardLibraryAddPatent",
    components: {
        DashboardLayout,
    },
    data() {
        return {
            title: "",
            arSummary: "",
            enSummary: "",
            pat_authenticator: "",
            patNumper: "",
            belongData: "",
            patent: "",
            imgName: "",
            inventorsData: "",
            RrlTechnology: [],
            inventorsNumber: 1,
        };
    },
    methods: {
        authenticate() {
            // Redirect the user to the Google authentication page
            window.location.href =
                "https://accounts.google.com/o/oauth2/v2/auth?response_type=code&client_id=916625290239-bm2d96ad33am2mcc8cl4vss5m89gdeql.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Fphp%2Ftechnohope-project%2Fsrc%2Fapi%2Fcallback.php&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fyoutube+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fyoutube.upload&access_type=offline&approval_prompt=force";
        },
        addInventor() {
            this.inventorsNumber++;
        },
        removeInventor() {
            this.inventorsNumber--;
        },
        validatepatent() {
            this.patent = this.$refs.patent.files[0];
            //this.files = Array.from(event.target.files);
        },
        validatelogo() {
            this.imgName = this.$refs.imgName.files[0];
        },
        addPataent() {
            let data = new FormData();
            data.append("title", this.title);
            data.append("arSummary", this.arSummary);
            data.append("enSummary", this.enSummary);
            data.append("patent", this.patent);
            data.append("pat_authenticator", this.pat_authenticator);
            data.append("patNumper", this.patNumper);
            data.append("belongData", this.belongData);
            data.append("inventorsData", this.inventorsData);
            data.append("RrlTechnology", this.RrlTechnology);
            data.append("imgdName", this.imgName);
            axios
                .post(
                    "http://localhost/php/technohope-project/src/api/api.php?action=UplaodPatent",
                    data
                )
                .then((response) => {
                    console.log("Success:", response.data);
                    alert(response.data.message);
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        },
    },
};
</script>
