<script setup>
import AuthNavbar from "@/components/AuthNavbar.vue";
import GuestNavbar from "@/components/GuestNavbar.vue";
</script>

<template>
    <div>
        <div v-if="$page.props.auth.user">
            <AuthNavbar />
        </div>

        <div v-else><GuestNavbar /></div>

        <main><slot /></main>
    </div>
</template>
