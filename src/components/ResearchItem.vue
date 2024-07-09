<template>
    <div
        class="my-4 p-5 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="delete">
            <button
                @click="deleteResearch"
                class="text-red-500 border border-red-500 rounded-lg py-1 px-2 hover:bg-red-500 hover:text-white"
            >
                Delete
            </button>
        </div>
        <div id="IdNumber">
            <h3 class="text-lg font-bold tracking-tight">ID Number:</h3>
            <p>{{ research.addResearsch_id }}</p>
        </div>
        <form @submit.prevent="updatePatent" v-if="showDetails">
            <div id="title" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight">Title:</h3>
                <div class="mb-6">
                    <input
                        type="text"
                        id="title_input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                        placeholder="Title"
                        required
                        :value="research.Title"
                        @input="updateField('Title', $event.target.value)"
                    />
                </div>
            </div>
            <div id="Summary" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight">Summary:</h3>
                <div class="mb-6">
                    <label
                        for="arSummary"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Arabic summary:
                    </label>
                    <textarea
                        dir="rtl"
                        id="arSummary"
                        rows="10"
                        :value="research.Summary_AR"
                        @input="updateField('Summary_AR', $event.target.value)"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    ></textarea>
                </div>
                <div class="mb-6">
                    <label
                        for="enSummary"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        English summary:
                    </label>
                    <textarea
                        id="enSummary"
                        rows="10"
                        :value="research.Summary_EN"
                        @input="updateField('Summary_EN', $event.target.value)"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    ></textarea>
                </div>
            </div>
            <div id="Attachment" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight">Attachment:</h3>
                <div class="mb-6">
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="Attachment_input"
                        type="file"
                        ref="attachment"
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
                        v-model="localRelatedTechnology"
                        @change="
                            updateField(
                                'related_technology',
                                localRelatedTechnology
                            )
                        "
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full h-64 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    >
                        <optgroup class="font-bold" label="Computer science:">
                            <option value="Artificial Intelligence (AI)">
                                Artificial Intelligence (AI)
                            </option>
                            <option value="Information Technology (IT)">
                                Information Technology (IT)
                            </option>
                            <option value="Software development">
                                Software development
                            </option>
                            <option value="Communication Technology">
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
                            <option value="Medical Imaging Technology">
                                Medical Imaging Technology
                            </option>
                            <option value="Medical Devices Technology">
                                Medical Devices Technology
                            </option>
                            <option
                                value="Prosthetics and Artificial Organs Technology"
                            >
                                Prosthetics and Artificial Organs Technology
                            </option>
                            <option value="Tissue Engineering">
                                Tissue Engineering
                            </option>
                        </optgroup>
                        <optgroup
                            class="font-bold mt-3"
                            label="Energy and environmental technology:"
                        >
                            <option value="Renewable Energy Technology">
                                Renewable Energy Technology
                            </option>
                            <option value="Nuclear Energy Technology">
                                Nuclear Energy Technology
                            </option>
                            <option value="Thermal Energy Technology">
                                Thermal Energy Technology
                            </option>
                            <option value="Energy Management Technology">
                                Energy Management Technology
                            </option>
                            <option value="Waste Management Technology">
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
</template>

<script>
export default {
    name: "ResearchItem",
    props: {
        research: Object,
        deleteResearch: Function,
        updatePatent: Function,
        showDetails: Boolean,
    },
    data() {
        return {
            localRelatedTechnology: this.research.related_technology || [],
        };
    },
    methods: {
        updateField(field, value) {
            this.$emit("update-research", { field, value });
        },
    },
};
</script>
