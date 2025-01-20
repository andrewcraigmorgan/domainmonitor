<template>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Domain Monitor</h1>

        <!-- Add Domain Form -->
        <form @submit.prevent="submitForm" class="mb-6">
            <input
                v-model="form.url"
                type="url"
                placeholder="https://example.com"
                required
                class="border border-gray-300 rounded-lg px-4 py-2 w-full max-w-md"
            />
            <button
                type="submit"
                class="ml-4 px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
            >
                Add Domain
            </button>
        </form>

        <!-- Domains Table -->
        <div v-if="domains.length > 0" class="overflow-x-auto">
            <table
                class="table-auto w-full border-collapse border border-gray-200"
            >
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-2 border border-gray-200">Domain</th>
                        <th class="px-4 py-2 border border-gray-200">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="domain in domains"
                        :key="domain.id"
                        :class="domain.is_up ? 'bg-green-50' : 'bg-red-50'"
                    >
                        <td class="px-4 py-2 border border-gray-200">
                            {{ domain.url }}
                        </td>
                        <td class="px-4 py-2 border border-gray-200">
                            <span
                                :class="
                                    domain.is_up ? 'bg-green-500' : 'bg-red-500'
                                "
                                class="text-white px-2 py-1 rounded-lg"
                            >
                                {{ domain.is_up ? "Up" : "Down" }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p v-else>No domains found. Add a domain to start monitoring.</p>
    </div>
</template>

<script>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

export default {
    props: {
        domains: Array,
    },
    setup() {
        const form = useForm({
            url: "",
        });

        const submitForm = () => {
            form.post(route("domains.store"), {
                onSuccess: () => form.reset("url"),
            });
        };

        return { form, submitForm };
    },
};
</script>
