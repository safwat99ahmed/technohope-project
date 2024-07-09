<template>
    <div class="UserCard">
        <div
            class="flex flex-col items-center p-5 bg-gray-50 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700"
        >
            <a href="/UserProfile" class="block rounded-full max-w-40">
                <img
                    class="rounded-full"
                    src="../../assets/user.png"
                    alt="Avatar"
                />
            </a>
            <div class="pt-5 text-center">
                <h3
                    class="text-xl font-bold tracking-tight text-gray-900 dark:text-white"
                >
                    <a href="/UserProfile">{{ name }}</a>
                </h3>
                <span class="text-gray-500 dark:text-gray-400">{{
                    email
                }}</span>
                <p
                    class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400"
                >
                    {{ specialization }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserCard",
    props: ["name", "specialization", "email"],

    components: {},
};
</script>
