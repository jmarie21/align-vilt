<script setup>
import { Button } from "@/components/ui/button";
</script>

<template>
    <div>
        <nav
            class="fixed top-0 w-full shadow-lg flex justify-between items-center py-4 px-64"
        >
            <div>
                <h1 class="text-2xl font-bold">Align</h1>
            </div>

            <div class="space-x-4">
                <Button as-child variant="outline">
                    <Link :href="route('login')"> Login </Link></Button
                >
                <Button as-child
                    ><Link :href="route('register')"> Register </Link></Button
                >
            </div>
        </nav>
    </div>
</template>
