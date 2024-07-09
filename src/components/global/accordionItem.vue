<template>
    <div class="accordionItem">
        <h2 :id="`accordion-flush-heading-${id}`">
            <button
                type="button"
                class="flex items-center justify-between w-full py-5 px-2 font-medium rtl:text-right text-gray-500 dark:text-gray-400 gap-3 rounded-t-lg"
                :data-accordion-target="`#accordion-flush-body-${id}`"
                aria-expanded="false"
                :aria-controls="`accordion-flush-heading-${id}`"
            >
                <span>{{ title }}</span>
                <svg
                    data-accordion-icon
                    class="w-3 h-3 rotate-180 shrink-0"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 10 6"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5 5 1 1 5"
                    />
                </svg>
            </button>
        </h2>
        <div
            :id="`accordion-flush-body-${id}`"
            class="hidden"
            :aria-labelledby="`accordion-flush-body-${id}`"
        >
            <div
                class="py-5 px-2 bg-white border-b rounded-b-lg border-gray-200 dark:border-gray-700"
            >
                <p class="mb-2 text-gray-500 dark:text-gray-400">
                    {{ content }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "accordionItem",
    props: ["id", "title", "content"],

    components: {},
};
</script>
