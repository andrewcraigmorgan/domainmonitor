<template>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
        <p>Welcome, {{ auth.user.name }}!</p>

        <Link
            :href="route('domains.index')"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
        >
            Manage Domains
        </Link>
    </div>
</template>

<script>
export default {
    props: {
        auth: Object,
    },
};
</script>
