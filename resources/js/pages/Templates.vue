<script setup>
import Template from '@/components/Template.vue';

const props = defineProps({
    templates: Array,
});

</script>

<template>
    <div>
        <h1>Templates disponibles</h1>
        <div class=" text-black"  v-for="template in templates" :key="template.id">
            <Template :template="template" />
        </div>
    </div>
</template>