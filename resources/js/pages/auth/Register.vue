<script setup lang="ts">
import Button from "@/components/ui/button/Button.vue";
import Input from "@/components/ui/input/Input.vue";
import Label from "@/components/ui/label/Label.vue";
import { useForm } from "@inertiajs/vue3";

import { route } from "../../../../vendor/tightenco/ziggy/src/js";
import { Loader2 } from "lucide-vue-next";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const handleRegister = () => {
    form.post(route("register"), {
        onSuccess: () => {
            console.log("registered");
        },
    });
};
</script>

<template>
    <Head title="Register" />
    <div class="min-h-screen flex justify-center items-center">
        <div class="w-1/4">
            <form @submit.prevent="handleRegister">
                <div class="space-y-4 mb-4">
                    <h1 class="text-3xl font-bold">Register</h1>
                    <p class="text-gray-500">
                        Enter your details below to create an account.
                    </p>
                </div>

                <div>
                    <div class="mb-4">
                        <Label for="name">Name</Label>
                        <Input
                            v-model="form.name"
                            type="text"
                            placeholder="Enter your name"
                        />
                        <p v-if="form.errors.name" class="text-red-500 text-sm">
                            {{ form.errors.name }}
                        </p>
                    </div>

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

                    <div class="mb-4">
                        <Label for="confirm_password">Confirm Password</Label>
                        <Input
                            v-model="form.password_confirmation"
                            type="password"
                            placeholder="Re-enter your password"
                        />
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
                                />Register
                            </Button>
                        </div>

                        <div v-else>
                            <Button type="submit" class="w-full mt-4"
                                >Register</Button
                            >
                        </div>
                        <p class="text-gray-500">
                            Already have an account?
                            <Link
                                href="/login"
                                class="hover:text-black underline underline-offset-4"
                                >Login</Link
                            >
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
