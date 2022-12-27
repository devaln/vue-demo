<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    userinfo: Array,
});

</script>

<template>

    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Informations
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div className="flex items-center justify-between mb-6">
                            <Link className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none" :href="route('userinfos.index')"> Back</Link>
                        </div>

                        <table className="table-fixed w-full">
                            <thead>
                                <tr className="bg-gray-100">
                                    <th className="px-4 py-2 w-20">No.</th>
                                    <th className="px-4 py-2">First Name</th>
                                    <th className="px-4 py-2">Middle Name</th>
                                    <th className="px-4 py-2">Last Name</th>
                                    <th className="px-4 py-2">Contact</th>
                                    <th className="px-4 py-2">Gender</th>
                                    <th className="px-4 py-2">Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td className="border px-4 py-2">{{ userinfo.id }}</td>
                                    <td className="border px-4 py-2">{{ userinfo.first_name }}</td>
                                    <td className="border px-4 py-2">{{ userinfo.middle_name }}</td>
                                    <td className="border px-4 py-2">{{ userinfo.last_name }}</td>
                                    <td className="border px-4 py-2">{{ userinfo.contact }}</td>
                                    <td className="border px-4 py-2">{{ userinfo.gender }}</td>
                                    <td className="border px-4 py-2"><img :src="`/images/${path}.png`" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
