<template>
    <div>
        <AppHeader />
        <slot />
        <AppFooter />
    </div>
</template>

<script>
import AppHeader from "@/components/global/AppHeader.vue";
import AppFooter from "@/components/global/AppFooter.vue";
export default {
    name: "MianLayout",
    components: {
        AppHeader,
        AppFooter,
    },
};
</script>
