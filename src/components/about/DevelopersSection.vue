<template>
    <section id="DevelopersSection">
        <div class="bg-white drop-shadow-lg p-8 rounded-[32px]">
            <h2 class="mb-4 text-4xl font-extrabold">Developers</h2>
            <hr />
            <div class="pt-8">
                <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
                    <UserCard
                        v-for="User in Users"
                        :key="User.id"
                        :name="User.name"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import UserCard from "@/components/global/UserCard.vue";

import Users from "../../../server/json/users.json";
Users.length = 4;
export default {
    name: "DevelopersSection",
    components: {
        UserCard,
    },
    data() {
        return {
            Users,
        };
    },
};
</script>
