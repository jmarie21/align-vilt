<script setup>
import { Button } from "@/components/ui/button";
import Separator from "@/components/ui/separator/Separator.vue";
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "@/components/ui/dialog";
import Input from "@/components/ui/input/Input.vue";
import Label from "@/components/ui/label/Label.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import { useToast } from "@/components/ui/toast";
import Toaster from "@/components/ui/toast/Toaster.vue";

const { toast } = useToast();
const isDialogOpen = ref(false);

const form = useForm({
    name: null,
});

const handleSubmit = () => {
    form.post(route("board.store"), {
        onSuccess: () => {
            form.reset();
            isDialogOpen.value = false;
            toast({
                title: "Board Created",
                description: "Board created successfully!",
                life: 3000,
            });
        },
    });
};
</script>

<template>
    <Toaster />
    <Head title="Dashboard" />
    <div class="px-64 min-h-screen flex flex-col">
        <div class="flex justify-between w-full py-8">
            <h1 class="text-3xl font-bold">My Boards</h1>
            <Dialog v-model:open="isDialogOpen">
                <DialogTrigger as-child>
                    <Button> Create Board </Button>
                </DialogTrigger>
                <DialogContent class="sm:max-w-[425px]">
                    <DialogHeader>
                        <DialogTitle>Add new board</DialogTitle>
                        <DialogDescription>
                            Enter board details. Click add when you're done.
                        </DialogDescription>
                    </DialogHeader>
                    <form @submit.prevent="handleSubmit">
                        <div class="flex">
                            <div class="flex flex-col w-full space-y-2">
                                <Label for="name"> Board Name </Label>
                                <Input
                                    v-model="form.name"
                                    id="name"
                                    class="col-span-3"
                                    placeholder="Enter board name"
                                />
                                <p
                                    v-if="form.errors.name"
                                    class="text-red-500 text-sm"
                                >
                                    {{ form.errors.name }}
                                </p>
                            </div>
                        </div>
                        <DialogFooter>
                            <Button
                                type="submit"
                                class="mt-4"
                                :disabled="form.processing"
                            >
                                Add
                            </Button>
                        </DialogFooter>
                    </form>
                </DialogContent>
            </Dialog>
        </div>

        <Separator />

        <div></div>
    </div>
</template>
