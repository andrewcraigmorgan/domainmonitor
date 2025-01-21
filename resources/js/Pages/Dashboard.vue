<template>
    <div class="dashboard-container">
        <h1 class="dashboard-title">Dashboard</h1>
        <p class="dashboard-welcome">Welcome, {{ auth.user.name }}!</p>
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import AppLayout from "../Layouts/AppLayout.vue";

// Get the shared `auth` data from Inertia
const {
    props: { auth },
} = usePage();

// Apply the layout
defineProps({
    layout: { type: Object, default: () => AppLayout },
});
</script>

<style lang="less">
.dashboard-container {
    padding: 2rem 0;
    max-width: 1024px;
    margin: 0 auto;

    .dashboard-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }

    .dashboard-welcome {
        font-size: 1rem;
        margin-top: 0;
    }
}
</style>
