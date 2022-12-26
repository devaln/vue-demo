<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
  first_name: props.userinfo.first_name,
  middle_name: props.userinfo.middle_name,
  last_name: props.userinfo.last_name,
  contact: props.userinfo.contact,
  gender: props.userinfo.gender,
  profile_pc: props.userinfo.profile_pc,
  user_id: props.userinfo.user_id,
})
</script>

<template>
  <BreezeAuthenticatedLayout>
    <div class="table table-hover">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>Contact</th>
          <th>Gender</th>
          <th>Profile Picture</th>
          <!-- <th></th> -->
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>first_name</td>
          <td>middle_name</td>
          <td>last_name</td>
          <td>contact</td>
          <td>gender</td>
          <td>profile_pic</td>
        </tr>
      </tbody>
    </div>
  </BreezeAuthenticatedLayout>
</template>