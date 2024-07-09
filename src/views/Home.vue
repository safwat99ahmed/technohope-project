<template>
    <div id="Home-page">
        <MianLayout>
            <HeroSection />
            <GetStartedSection />
            <PatentsSection />
            <ResearchsSection />
            <ResearchersSection />
            <FAQsSection />
        </MianLayout>
    </div>
</template>
<script>
import MianLayout from "@/layouts/MianLayout.vue";
import HeroSection from "@/components/home/HeroSection.vue";
import GetStartedSection from "@/components/home/GetStartedSection.vue";
import ResearchsSection from "@/components/home/ResearchsSection.vue";
import PatentsSection from "@/components/home/PatentsSection.vue";
import ResearchersSection from "@/components/home/ResearchersSection.vue";
import FAQsSection from "@/components/home/FAQsSection.vue";
export default {
    name: "HomePage",
    components: {
        MianLayout,
        HeroSection,
        GetStartedSection,
        ResearchsSection,
        PatentsSection,
        ResearchersSection,
        FAQsSection,
    },
};
</script>
