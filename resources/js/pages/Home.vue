<script setup lang="ts">
import Template from '@/components/Template.vue';

interface TemplateType {
    id: number;
    name: string;
    description: string;
    image: string;
    category: any;
    created_at: string;
    updated_at: string;
}

const props = defineProps<{
    templates: TemplateType[];
}>();

</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]">
        <header class="mb-6 w-full h-14 fixed top-0 left-0 right-0 z-50 bg-blue-500">
            <nav class="flex items-center justify-end gap-4 h-full w-full">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                    >
                        Log in
                    </Link>
                    <Link
                        :href="route('register')"
                        class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                    >
                        Register
                    </Link>
                </template>
            </nav>
        </header>
        <main class="flex items-center justify-center w-full min-h-screen flex-col overflow-hidden bg-black">
            <h1 class="text-2xl font-bold text-white">NOS TEMPLATES</h1>
            <div v-for="template in templates" :key="template.id" class="w-full h-full">
                <Template :template="template" />
            </div>
        </main>
    </div>
</template>
