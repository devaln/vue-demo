<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/InputLabel.vue';
import BreezeInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    userinfo: Object,
});

const form = useForm({
    first_name: props.userinfo.first_name,
    middle_name: props.userinfo.middle_name,
    last_name: props.userinfo.last_name,
    contact: props.userinfo.contact,
    gender: props.userinfo.gender,
    profile_pic: props.userinfo.profile_pic,
    // user_id: props.userinfo.user_id,
});

const submit = () => {
    form.put(route('userinfos.update', props.userinfo.id));
};

</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit user-information
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div className="flex items-center justify-between mb-6">
                            <Link className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none" :href="route('userinfos.index')">
                              Back
                            </Link>
                        </div>

                        <form name="createForm" @submit.prevent="submit" enctype="multipart/form-data">
                          <div className="flex flex-col">
                            <strong class="text-red-500 mb-4 ">Fill the required details : </strong>
                            <!-- First Name -->
                              <div className="mb-4">

                                <BreezeLabel for="first_name"/><b>First Name :- </b>

                                <BreezeInput id="first_name" type="text" name="first_name" class="mt-1 block w-full" v-model="form.first_name" required />
                                <BreezeInputError className="text-red-600" v-if="form.errors.first_name">
                                    {{ form.errors.first_name }}
                                </BreezeInputError>
                              </div>
                              <!-- Middle Name -->
                              <div className="mb-4">

                                <BreezeLabel for="middle_name" /><b>Middle Name :- </b>

                                <BreezeInput id="middle_name" type="text" name="middle_name" class="mt-1 block w-full" v-model="form.middle_name" required />

                                <BreezeInputError className="text-red-600" v-if="form.errors.middle_name">
                                    {{ form.errors.middle_name }}
                                </BreezeInputError>
                              </div>
                              <!-- Last Name -->
                              <div className="mb-4">

                                <BreezeLabel for="last_name"/><b>Last Name :- </b>

                                <BreezeInput id="last_name" type="text" name="last_name" class="mt-1 block w-full" v-model="form.last_name" required />

                                <BreezeInputError className="text-red-600" v-if="form.errors.last_name">
                                    {{ form.errors.last_name }}
                                </BreezeInputError>
                              </div>
                              <!-- Contact -->
                              <div className="mb-4">

                                <BreezeLabel for="contact" /><b>Contact :- </b>

                                <BreezeInput id="contact" type="number" max-length="10" name="contact" class="mt-1 block w-full" v-model="form.contact" required />

                                <BreezeInputError className="text-red-600" v-if="form.errors.contact">
                                    {{ form.errors.contact }}
                                </BreezeInputError>
                              </div>
                              <!-- Gender -->
                              <div className="mb-4">

                                <BreezeLabel for="gender"/><b>Gender :- </b>&nbsp;&nbsp;

                                <input id="gender" type="radio" v-model="form.gender" name="gender" value="Male" required />&nbsp;Male&nbsp;&nbsp;
                                <input id="gender" type="radio" v-model="form.gender" name="gender" value="Female" required />&nbsp;Female&nbsp;&nbsp;
                                <input id="gender" type="radio" v-model="form.gender" name="gender" value="Other" required />&nbsp;Other&nbsp;&nbsp;

                                <BreezeInputError className="text-red-600" v-if="form.errors.gender">
                                    {{ form.errors.gender }}
                                </BreezeInputError>
                              </div>
                              <!-- Profile Picture -->
<!--                                     <div className="mb-4">

                                <BreezeLabel for="profile_pic" value="profile_pic" />Profile

                                <BreezeInput id="profile_pic" type="file" name="" class="mt-1 block w-full" v-model="form.profile_pic" required />

                                <BreezeInputError className="text-red-600" v-if="form.errors.profile_pic">
                                    {{ form.errors.profile_pic }}
                                </BreezeInputError>
                              </div> -->

                          </div>

                          <div className="mt-4">
                              <button type="submit" className="px-6 py-2 font-bold text-white bg-green-500 rounded">Save</button>
                          </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>