<template>
    <div class="domain-monitor-container">
        <h1 class="domain-monitor-title">Domain Monitor</h1>

        <form @submit.prevent="submitForm" class="domain-form">
            <input
                v-model="form.url"
                type="url"
                placeholder="https://example.com"
                required
                class="domain-input"
            />
            <button
                type="submit"
                class="domain-submit-button"
            >
                Add Domain
            </button>
        </form>

        <div v-if="domains.length > 0" class="domain-table-wrapper">
            <table class="domain-table">
                <thead>
                    <tr class="domain-table-header">
                        <th class="domain-table-cell">Domain</th>
                        <th class="domain-table-cell">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="domain in domains"
                        :key="domain.id"
                        :class="domain.is_up ? 'domain-row-up' : 'domain-row-down'"
                    >
                        <td class="domain-table-cell">
                            {{ domain.url }}
                        </td>
                        <td class="domain-table-cell">
                            <span
                                :class="
                                    domain.is_up ? 'domain-status-up' : 'domain-status-down'
                                "
                                class="domain-status-label"
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
import AppLayout from "../../Layouts/AppLayout.vue";

export default {
    props: {
        auth: Object, // Shared auth data passed from Laravel middleware
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
    layout: AppLayout,
};
</script>

<style lang="less">
.domain-monitor-container {
    max-width: 1024px;
    margin: 0 auto;
    padding: 2rem 0;
}

.domain-monitor-title {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 1.5rem;
}

.domain-form {
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

.domain-input {
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
    width: 100%;
    max-width: 28rem;
}

.domain-submit-button {
    margin-left: 1rem;
    padding: 0.5rem 1.5rem;
    background-color: #3b82f6;
    color: white;
    border-radius: 0.5rem;
    border: none;
    cursor: pointer;

    &:hover {
        background-color: #2563eb;
    }
}

.domain-table-wrapper {
    overflow-x: auto;
}

.domain-table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #e5e7eb;
}

.domain-table-header {
    background-color: #f9fafb;
}

.domain-table-cell {
    padding: 0.5rem 1rem;
    border: 1px solid #e5e7eb;
}

.domain-row-up {
    background-color: #d1fae5;
}

.domain-row-down {
    background-color: #fee2e2;
}

.domain-status-label {
    padding: 0.25rem 0.5rem;
    border-radius: 0.5rem;
    color: white;
}

.domain-status-up {
    background-color: #10b981;
}

.domain-status-down {
    background-color: #ef4444;
}
</style>
