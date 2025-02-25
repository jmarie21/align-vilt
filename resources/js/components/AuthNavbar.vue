<script setup>
import { Button } from "@/components/ui/button";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { router, usePage } from "@inertiajs/vue3";
import { ChevronDown } from "lucide-vue-next";
import { route } from "../../../vendor/tightenco/ziggy/src/js";

const user = usePage().props.auth.user;

const handleLogout = () => {
    router.post(route("logout"), {
        onSuccess: () => {
            console.log("Logged out");
        },
    });
};
</script>

<template>
    <div>
        <nav class="shadow-lg flex justify-between items-center py-4 px-64">
            <div>
                <h1 class="text-2xl font-bold">Align</h1>
            </div>

            <div class="space-x-4">
                <DropdownMenu>
                    <DropdownMenuTrigger>
                        <div class="flex items-center">
                            {{ user.name }} <ChevronDown size="20" />
                        </div>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent>
                        <DropdownMenuLabel>My Account</DropdownMenuLabel>
                        <DropdownMenuSeparator />
                        <DropdownMenuItem>Profile</DropdownMenuItem>
                        <DropdownMenuItem
                            ><Link :href="route('logout')" method="post"
                                >Logout</Link
                            ></DropdownMenuItem
                        >
                    </DropdownMenuContent>
                </DropdownMenu>
            </div>
        </nav>
    </div>
</template>
