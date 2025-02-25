<script setup lang="ts">
import Button from "@/components/ui/button/Button.vue";
import Input from "@/components/ui/input/Input.vue";
import Label from "@/components/ui/label/Label.vue";
import { useForm } from "@inertiajs/vue3";
import { route } from "../../../../vendor/tightenco/ziggy/src/js";
import { Loader2 } from "lucide-vue-next";

const form = useForm({
    email: null,
    password: null,
});

const handleLogin = () => {
    form.post(route("login"), {
        onSuccess: () => {
            console.log("logged in");
        },
    });
};
</script>

<template>
    <Head title="Login" />
    <div class="min-h-screen flex justify-center items-center">
        <div class="w-1/4">
            <form @submit.prevent="handleLogin">
                <div class="space-y-4 mb-4">
                    <h1 class="text-3xl font-bold">Login</h1>
                    <p class="text-gray-500">
                        Enter your email and password below to login.
                    </p>
                </div>

                <div>
                    <div class="mb-4">
                        <Label for="email">Email</Label>
                        <Input
                            v-model="form.email"
                            type="text"
                            placeholder="example@email.com"
                        />
                        <p
                            v-if="form.errors.email"
                            class="text-red-500 text-sm"
                        >
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <div class="mb-4">
                        <Label for="password">Password</Label>
                        <Input
                            v-model="form.password"
                            type="password"
                            placeholder="Enter your password"
                        />
                        <p
                            v-if="form.errors.password"
                            class="text-red-500 text-sm"
                        >
                            {{ form.errors.password }}
                        </p>
                    </div>

                    <div class="space-y-4 text-center">
                        <div v-if="form.processing">
                            <Button
                                type="submit"
                                class="w-full mt-4"
                                :disabled="form.processing"
                            >
                                <Loader2
                                    class="w-4 h-4 mr-2 animate-spin"
                                />Login
                            </Button>
                        </div>

                        <div v-else>
                            <Button type="submit" class="w-full mt-4"
                                >Login</Button
                            >
                        </div>

                        <p class="text-gray-500">
                            Don't have an account?
                            <Link
                                href="/register"
                                class="hover:text-black underline underline-offset-4"
                                >Register</Link
                            >
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
