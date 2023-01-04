<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import span from '@/Components/InputError.vue';
import BreezeInputLabel from '@/Components/InputLabel.vue';
import BreezeInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    first_name: '',
    middle_name: '',
    last_name: '',
    contact: '',
    gender: '',
    profile_pic: '',
    user_id: '',
});
const submit = () => {
    form.post(route("userinfos.store"), {
        forceFormData: true,
    });
};

</script>

<template>

    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create userinfo
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div className="flex items-center justify-between mb-6">
                            <Link className="px-6 py-2 text-white bg-blue-600 rounded-md focus:outline-none"
                                :href="route('userinfos.index')"> Back</Link>
                        </div>

                        <form name="createForm" @submit.prevent="submit" enctype="multipart/form-data">
                            <div className="flex flex-col">
                                <strong class="text-gray-500 text-left mb-4">Fill the required details :- </strong><hr><br>
                                <!-- First Name -->
                                <div className="mb-4 mt-1 inline-flex space-x-20">
                                    <BreezeInputLabel for="first_name" /><b>First Name :- </b>

                                    <BreezeInput id="first_name" type="text" name="first_name" class=" block w-1/4 focus:outline-dotted focus:bg-white focus:border-purple-900" v-model="form.first_name" required autocomplete="first_name" autofocus/>
                                    <span className="text-red-600" v-if="form.errors.first_name">
                                        {{ form.errors.first_name }}
                                    </span>
                                </div>

                                <!-- Middle Name -->
                                <div className="mb-4 inline-flex space-x-20">
                                    <BreezeInputLabel for="middle_name" /><b>Middle Name :- </b>

                                    <BreezeInput id="middle_name" type="text" name="middle_name" class="block w-1/4 focus:outline-dotted focus:bg-white focus:border-purple-900" v-model="form.middle_name" required autocomplete="middle_name" />
                                    <span className="text-red-600" v-if="form.errors.middle_name">
                                        {{ form.errors.middle_name }}
                                    </span>
                                </div>

                                <!-- Last Name -->
                                <div className="mb-4 inline-flex space-x-20">
                                    <BreezeInputLabel for="last_name" /><b>Last Name :- </b>

                                    <BreezeInput id="last_name" type="text" name="last_name" class="block w-1/4 focus:outline-dotted focus:bg-white focus:border-purple-900" v-model="form.last_name" required autocomplete="last_name" />
                                    <span className="text-red-600" v-if="form.errors.last_name">
                                        {{ form.errors.last_name }}
                                    </span>
                                </div>

                                <!-- Contact -->
                                <div className="mb-4 inline-flex space-x-20">
                                    <BreezeInputLabel for="contact" /><b>Contact :- </b>

                                    <BreezeInput id="contact" type="number" name="contact" class="block w-1/4 focus:outline-dotted focus:bg-white focus:border-purple-900" v-model="form.contact" required autocomplete="contact" />
                                    <span className="text-red-600" v-if="form.errors.contact">
                                        {{ form.errors.contact }}
                                    </span>
                                </div>

                                <!-- Gender -->
                                <div className="mb-4 inline-flex space-x-20">
                                    <BreezeInputLabel for="gender" /><br><b>Gender :- </b>&nbsp;&nbsp;

                                    <BreezeInput type="radio" id="gender" name="gender" value="Male" v-model="form.gender" required autocomplete="gender" />Male
                                    <BreezeInput type="radio" id="gender" name="gender" value="Female" v-model="form.gender" required autocomplete="gender"/>Female
                                    <BreezeInput type="radio" id="gender" name="gender" value="Other" v-model="form.gender" required autocomplete="gender" />Other

                                    <span className="text-red-600" v-if="form.errors.gender">
                                        {{ form.errors.gender }}
                                    </span>
                                </div>

                                <!-- Profile Picture -->
                                <div className="mb-4 inline-flex space-x-20">
                                    <BreezeInputLabel for="profile_pic" /><b>Profile Picture :- </b>
                                    <!-- <input id="profile_pic" type="file" name="profile_pic" class="block w-1/4 focus:outline-dotted focus:bg-white focus:border-purple-900" v-on="onFileChange" /> -->
                                    <input type="file" name="profile_pic" @input="form.profile_pic = $event.target.files[0]"/>
                                    <span className="text-red-600" v-if="form.errors.profile_pic">
                                        {{ form.errors.profile_pic }}
                                    </span>
                                </div>

                            </div>

                            <div className="mt-4">
                                <button type="submit"
                                    className="px-6 py-2 font-bold text-white bg-green-600 rounded">Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>