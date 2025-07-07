<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Textarea } from '@/components/ui/textarea';

const form = useForm({
    title: '',
    description: '',
    date: '',
    time: '',
    location: '',
    images: null as File | null,
    csv_path: 'test.csv',
});

function handleImage(event: Event) {
    const target = event.target as HTMLInputElement;
    if (target.files && target.files[0]) {
        form.images = target.files[0];
    }
}

const submit = () => {
    form.post(route('events.store'), {
        forceFormData: true,
    });
};
</script>

<template>
    <div class="min-h-screen py-8">
        <div class="mx-auto max-w-2xl px-4">
            <Card>
                <CardHeader>
                    <CardTitle class="text-2xl font-bold text-center">Créer un nouvel événement</CardTitle>
                    <CardDescription class="text-center">
                        Remplissez les informations de votre événement
                    </CardDescription>
                </CardHeader>
                <CardContent>
                    <form @submit.prevent="submit" class="space-y-6">
                        <!-- Nom de l'événement -->
                        <div class="space-y-2">
                            <Label for="title">Nom de l'événement *</Label>
                            <Input
                                id="title"
                                v-model="form.title"
                                type="text"
                                placeholder="Ex: Mariage de Marie et Jean"
                                required
                            />
                            <div v-if="form.errors.title" class="text-red-500 text-sm">
                                {{ form.errors.title }}
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="space-y-2">
                            <Label for="description">Description</Label>
                            <Textarea
                                id="description"
                                v-model="form.description"
                                placeholder="Décrivez votre événement..."
                                rows="3"
                            />
                            <div v-if="form.errors.description" class="text-red-500 text-sm">
                                {{ form.errors.description }}
                            </div>
                        </div>

                        <!-- Date -->
                        <div class="space-y-2">
                            <Label for="date">Date de l'événement *</Label>
                            <Input
                                id="date"
                                v-model="form.date"
                                type="date"
                                required
                            />
                            <div v-if="form.errors.date" class="text-red-500 text-sm">
                                {{ form.errors.date }}
                            </div>
                        </div>

                        <!-- Lieu -->
                        <div class="space-y-2">
                            <Label for="location">Lieu *</Label>
                            <Input
                                id="location"
                                v-model="form.location"
                                type="text"
                                placeholder="Ex: Château de Versailles"
                                required
                            />
                            <div v-if="form.errors.location" class="text-red-500 text-sm">
                                {{ form.errors.location }}
                            </div>
                        </div>



                        <!-- Heure -->
                        <div class="space-y-2">
                            <Label for="time">Heure de l'événement</Label>
                            <Input
                                id="time"
                                v-model="form.time"
                                type="time"
                                placeholder="Ex: 14:30"
                            />
                            <div v-if="form.errors.time" class="text-red-500 text-sm">
                                {{ form.errors.time }}
                            </div>
                        </div>

                        <!-- Images -->
                        <div class="space-y-2">
                            <Label for="images">Images de l'événement</Label>
                            <Input
                                id="images"
                                type="file"
                                accept="image/*"
                                @change="handleImage"
                            />
                            <div v-if="form.errors.images" class="text-red-500 text-sm">
                                {{ form.errors.images }}
                            </div>
                        </div>



                        <!-- Boutons -->
                        <div class="flex gap-4 pt-4">
                            <Button
                                type="submit"
                                :disabled="form.processing"
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white"
                            >
                                <span v-if="form.processing">Création en cours...</span>
                                <span v-else>Créer l'événement</span>
                            </Button>
                            <Button
                                type="button"
                                variant="outline"
                                @click="$inertia.visit(route('dashboard'))"
                                class="flex-1"
                            >
                                Annuler
                            </Button>
                        </div>
                    </form>
                </CardContent>
            </Card>
        </div>
    </div>
</template>
