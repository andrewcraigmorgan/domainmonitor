<template>
    <div class="layout-container">
        <!-- Header -->
        <header class="header">
            <nav class="nav">
                <div class="nav-links">
                    <Link href="/" class="link">Home</Link>
                    <Link :href="route('domains.index')" class="link"
                        >Manage Domains</Link
                    >
                </div>
                <div class="auth-controls">
                    <span class="user-name" v-if="auth?.user?.name"
                        >Hello {{ auth?.user?.name }}!</span
                    >
                    <form @submit.prevent="handleLogout" class="logout-form">
                        <button type="submit" class="logout-button">
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <slot />
        </main>
    </div>
</template>

<script>
import { Link, usePage } from "@inertiajs/vue3";

export default {
    props: {
        auth: Object, // Auth data passed from Laravel middleware
    },
    components: {
        Link,
    },
    setup() {
        const { props } = usePage();
        const csrfToken = props.csrf_token;

        const handleLogout = async () => {
            try {
                const response = await fetch("/logout", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                    },
                });

                if (response.ok) {
                    window.location.href = "/"; // Redirect login page
                } else {
                    console.error("Logout failed.");
                }
            } catch (error) {
                console.error("An error occurred during logout:", error);
            }
        };

        return { csrfToken, handleLogout };
    },
};
</script>

<style lang="less">
.layout-container {
    min-height: 100vh;
    background-color: #f3f4f6;
}

.header {
    background-color: #1f2937;
    color: #ffffff;
    padding: 1rem;

    .nav {
        max-width: 1024px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;

        .nav-links {
            display: flex;
            gap: 1rem;

            .link {
                text-decoration: none;
                &:hover {
                    text-decoration: underline;
                }
            }
        }

        .auth-controls {
            display: flex;
            align-items: center;

            .user-name {
                margin-right: 1rem;
            }

            .logout-form {
                display: inline;

                .logout-button {
                    color: #ef4444;
                    background: none;
                    border: none;
                    cursor: pointer;
                    &:hover {
                        text-decoration: underline;
                    }
                }
            }
        }
    }
}

.main-content {
    max-width: 1024px;
    margin: 0 auto;
    padding: 1.5rem 0;
}
</style>
