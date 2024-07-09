<template>
    <section id="FAQsSection" class="py-12">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2
                    class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"
                >
                    FAQs
                </h2>
            </div>
            <div class="bg-myGray p-12 rounded-[40px]">
                <div
                    id="accordion-flush"
                    data-accordion="collapse"
                    data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                    data-inactive-classes="text-gray-500 dark:text-gray-400"
                >
                    <accordionItem
                        v-for="item in accordionItemslist"
                        :key="item.id"
                        :id="item.id"
                        :title="item.title"
                        :content="item.content"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import accordionItem from "@/components/global/accordionItem.vue";
import accordionItemslist from "../../../server/json/accordionItemslist.json";

export default {
    name: "FAQsSection",
    components: {
        accordionItem,
    },
    data() {
        return {
            accordionItemslist,
        };
    },
};
</script>
