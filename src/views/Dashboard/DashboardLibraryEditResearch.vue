<template>
    <div id="DashboardLibraryEditResearch">
        <DashboardLayout
            :title="'Edit research'"
            :subtitle="'Library / Research'"
        >
            <div v-for="(eachResearch, i) in Researchs" :key="i">
                <div @click="selectResearch(eachResearch.addResearsch_id)">
                    <!-- Clickable div to select research -->
                    <ResearchItem
                        :research="eachResearch"
                        :deleteResearch="() => deleteResearch(i)"
                        :updatePatent="() => updatePatent(eachResearch)"
                        :showDetails="
                            selectedResearchId === eachResearch.addResearsch_id
                        "
                        @update-research="updateResearchField(i, $event)"
                    />
                </div>
            </div>
        </DashboardLayout>
    </div>
</template>

<script>
import DashboardLayout from "@/layouts/DashboardLayout.vue";
import ResearchItem from "@/components/ResearchItem.vue"; // Adjust the path as needed
import axios from "axios";

export default {
    name: "DashboardLibraryEditResearch",
    components: {
        DashboardLayout,
        ResearchItem,
    },
    data() {
        return {
            Researchs: [],
            selectedResearchId: null,
        };
    },
    mounted() {
        this.myresearsch();
    },
    methods: {
        async myresearsch() {
            try {
                let res = await axios.get(
                    "http://localhost/php/technohope-project/src/api/api.php?action=showResearch"
                );
                this.Researchs = res.data.Researchs.map((research) => ({
                    ...research,
                    related_technology: research.Related_technology || [],
                }));
            } catch (error) {
                console.error("Error fetching research:", error);
            }
        },
        async updatePatent(research) {
            console.log("Patent data to be updated:", research);
            if (
                !research.Title ||
                !research.Summary_AR ||
                !research.Summary_EN ||
                !research.related_technology
            ) {
                alert("All fields are required.");
                return;
            }
            try {
                let res = await axios.post(
                    "http://localhost/php/technohope-project/src/api/api.php?action=updateresearch",
                    {
                        research_id: research.addResearsch_id,
                        research_Title: research.Title,
                        ar_summary: research.Summary_AR,
                        en_summary: research.Summary_EN,
                        related_technology: research.related_technology,
                    }
                );
                if (res.data.success) {
                    alert("Research updated successfully!");
                } else {
                    console.error("Failed to update Research:", res.data);
                    alert(
                        `Failed to update Research. Server response: ${res.data.error}`
                    );
                }
            } catch (error) {
                console.error(
                    "Error updating Research:",
                    error.response ? error.response.data : error
                );
                alert("An error occurred while updating the Research.");
            }
        },
        async deleteResearch(index) {
            try {
                // Implement delete logic using axios to delete the research
                // Example:
                // await axios.delete(`http://localhost/php/technohope-project/src/api/api.php?action=deleteResearch&id=${this.Researchs[index].id}`);
                this.Researchs.splice(index, 1);
                console.log("Research deleted at index", index);
            } catch (error) {
                console.error("Error deleting research:", error);
            }
        },
        updateResearchField(index, { field, value }) {
            this.$set(this.Researchs[index], field, value);
        },
        selectResearch(researchId) {
            this.selectedResearchId = researchId;
        },
    },
};
</script>
