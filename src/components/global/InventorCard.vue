<template>
    <div class="InventorCard">
        <div class="flex items-center gap-3 px-4 py-2 rounded-lg border">
            <div class="text-center">
                <h3
                    class="text-xl font-bold tracking-tight text-gray-900 dark:text-white"
                >
                    <a href="/UserProfile">{{ name }}</a>
                </h3>

                <p
                    class="font-bold text-sm text-start text-gray-500 dark:text-gray-400"
                >
                    {{ belonging }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "InventorCard",
    props: ["name", "belonging"],
    components: {},
    data() {
        return {
            Users: [],
        };
    },
    mounted() {
        this.myuser();
    },
    methods: {
        async myuser() {
            let res = await axios.get(
                "http://localhost/php/technohope-project/src/api/api.php?action=showUser"
            );
            const resData = res.data;

            this.Users = resData.Users;
        },
    },
};
</script>
