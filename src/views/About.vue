<template>
    <div id="About-page">
        <MianLayout>
            <div
                class="max-w-screen-xl mx-auto flex flex-col-reverse md:flex-row gap-6 my-12 p-4"
            >
                <div id="aboutContent" class="grow space-y-8">
                    <AboutUsSection />
                    <OurMissionSection />
                    <DevelopersSection />
                    <ContactUsSection />
                </div>
                <div>
                    <ul
                        id="aboutLinks"
                        class="flex justify-around md:w-36 mx-auto md:block sticky top-4 md:space-y-6 font-medium text-gray-900 rounded-[16px] p-6 text-center"
                    >
                        <li>
                            <a href="#AboutUsSection" class="active"
                                >About Us</a
                            >
                        </li>
                        <li><a href="#OurMissionSection">Our Mission</a></li>
                        <li><a href="#DevelopersSection">Developers</a></li>
                        <li><a href="#ContactUsSection">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </MianLayout>
    </div>
</template>
<script>
import MianLayout from "@/layouts/MianLayout.vue";
import AboutUsSection from "@/components/about/AboutUsSection.vue";
import OurMissionSection from "@/components/about/OurMissionSection.vue";
import DevelopersSection from "@/components/about/DevelopersSection.vue";
import ContactUsSection from "@/components/about/ContactUsSection.vue";

export default {
    name: "AboutPage",
    components: {
        MianLayout,
        AboutUsSection,
        OurMissionSection,
        DevelopersSection,
        ContactUsSection,
    },
};

window.onload = () => {
    let navLinks = document.querySelectorAll("#aboutLinks li a");
    let sections = document.querySelectorAll("section");
    window.onscroll = () => {
        sections.forEach((sec) => {
            let top = window.scrollY;
            let offset = sec.offsetTop - 150;
            let height = sec.offsetHeight;
            let curlink = document.querySelector(
                "#aboutLinks li a[href*=" + sec.getAttribute("id") + "]"
            );
            if (top >= offset && top < offset + height) {
                navLinks.forEach((links) => {
                    links.classList.remove("active");
                    curlink.classList.add("active");
                });
            }
        });
    };
};
</script>

<style scoped>
.active {
    color: rgb(6 148 162 / var(--tw-text-opacity));
    text-decoration: underline;
}
</style>
