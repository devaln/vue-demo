<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from "@inertiajs/inertia";
import { watch } from "vue";
import { ref } from "vue";
import Footer from '@/Layouts/Footer.vue';
import Swal from 'sweetalert2'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
defineProps({
  userinfos: Array,
  users: Array,
});

const form = useForm();

function destroy(id) {
  // if (confirm("Are you sure you want to Delete")) {
    //     form.delete(route('userinfos.destroy', id));
    // }
  /* Sweet Alert */
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
    }
  })
}

let search = ref('');
watch(search, (value) => {
  Inertia.get(
    "/userinfos",
    { search: value },
    {
      preserveState: true,
    }
  );
});
/* Pagination */
const getResults = async (page = 1) => {
  const response = await fetch(`/userinfos?page=${page}`);
  laravelData.value = await response.json();
}
getResults();
</script>

<template>

  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-bold text-xl text-gray-800 leading-tight">
        User Informations
      </h2>
      <!-- search Input -->
      <div align="right">
        <input type="text" v-model="search" placeholder="Search..."
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 " />
      </div>
    </template>
    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-8 bg-white border-b border-gray-200">

            <div className="flex items-center justify-between mb-6">
              <Link className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                :href="route('userinfos.create')">
              Create User-Informations
              </Link>
            </div>

            <table className="table-fixed w-full">
              <thead>
                <tr className="bg-gray-100">
                  <th className="px-4 py-2 w-20">#ID</th>
                  <th className="px-4 py-2">Profile</th>
                  <th className="px-4 py-2">First Name</th>
                  <th className="px-4 py-2">Last Name</th>
                  <th className="px-4 py-2">Contact</th>
                  <th className="px-4 py-2">Gender</th>
                  <th className="px-4 py-2">ACTIONS</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="userinfo in userinfos">
                  <td className="border px-4 py-2">{{ userinfo.id }}</td>
                  <td className="border px-4 py-2"><img class="rounded-full border border-black"
                      :src="`${userinfo.profile_pic}`" /></td>
                  <td className="border px-4 py-2">{{ userinfo.first_name }}</td>
                  <td className="border px-4 py-2">{{ userinfo.last_name }}</td>
                  <td className="border px-4 py-2">{{ userinfo.contact }}</td>
                  <td className="border px-4 py-2">{{ userinfo.gender }}</td>
                  <td className="border px-10 py-2">
                    <!-- Edit Button -->
                    <Link tabIndex="1" className="mx-1 px-1 py-1 text-sm text-white bg-slate-400 rounded"
                      :href="route('userinfos.show', userinfo.id)"> Show</Link>
                    <!-- Show Button -->
                    <Link tabIndex="1" className="mx-1 px-1 py-1 text-sm text-white bg-blue-500 rounded"
                      :href="route('userinfos.edit', userinfo.id)"> Edit </Link>
                    <!-- Delete button -->
                    <button @click="destroy(userinfo.id)" tabIndex="-1" type="button"
                      className="mx-1 mt-1 px-1 py-1 text-sm text-white bg-red-500 rounded">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
            {{ userinfos.links }}
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
  <Footer></Footer>
</template>
