<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BreezeInput from '@/Components/TextInput.vue';
// import { Pagination } from 'laravel-vue-pagination';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    userinfos: Array,
});

const form = useForm();

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('userinfos.destroy', id));
    }
}
/* Pagination */

</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Informations
            </h2>
        </template>

        <div class="text-right mr-16 mt-4">
            <div class="">
                <form action="">
                    <div class="form-group">
                        <BreezeInput type="text" class="form-control" id="search" name="search" v-model="search" placeholder="eg: rupesh bagwat" />
                        <button type="search" for="search" class="text-white  bg-green-600 ">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-12">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-8 bg-white border-b border-gray-200">

                        <div className="flex items-center justify-between mb-6">
                            <Link className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none" :href="route('userinfos.create')" >
                                Create User-Informations
                            </Link>
                        </div>

                        <table className="table-fixed w-full">
                            <thead>
                                <tr className="bg-gray-100">
                                    <th className="px-4 py-2 w-20">#ID</th>
                                    <th className="px-4 py-2">Profile</th>
                                    <th className="px-4 py-2">First Name</th>
                                    <!-- <th className="px-4 py-2">Middle Name</th> -->
                                    <th className="px-4 py-2">Last Name</th>
                                    <th className="px-4 py-2">Contact</th>
                                    <th className="px-4 py-2">Gender</th>
                                    <th className="px-4 py-2">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="userinfo in userinfos">
                                    <td className="border px-4 py-2">{{ userinfo.id }}</td>
                                    <td className="border px-4 py-2"><img :src="`/images/${userinfo.profile_pic}`" /></td>
                                    <td className="border px-4 py-2">{{ userinfo.first_name }}</td>
                                    <!-- <td className="border px-4 py-2">{{ userinfo.middle_name }}</td> -->
                                    <td className="border px-4 py-2">{{ userinfo.last_name }}</td>
                                    <td className="border px-4 py-2">{{ userinfo.contact }}</td>
                                    <td className="border px-4 py-2">{{ userinfo.gender }}</td>
                                    <td className="border px-4 py-2">
                                      <!-- Edit Button -->
                                      <Link tabIndex="1" className="px-1 py-1 text-sm text-white bg-slate-400 rounded" :href="route('userinfos.show', userinfo.id)"> Show</Link>&nbsp;
                                      <!-- Show Button -->
                                      <Link tabIndex="1" className="px-1 py-1 text-sm text-white bg-blue-500 rounded" :href="route('userinfos.edit', userinfo.id)"> Edit </Link>&nbsp;
                                      <!-- Delete button -->
                                      <button @click="destroy(userinfo.id)" tabIndex="-1" type="button" className="mx-1 px-0 py-0 text-sm text-white bg-red-500 rounded" >Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination :data="tabledata" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
