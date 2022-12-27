<script>
export default {
    data() {
        return {
            keyword: null,
            userinfos: []
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {
        getResults() {
            axios.get('/livesearch', { params: { keyword: this.keyword } })
                .then(res => this.userinfos = res.data)
                .catch(error => { });
        }
    }
}
</script>
<template>
    <div>
        <input type="text" v-model="keyword" name="search" placeholder="Search">
        <ul v-if="userinfos.length > 0">
            <li v-for="userinfo in userinfos" :key="userinfo.id" v-text="userinfo.first_name, userinfo.last_name"></li>
        </ul>
    </div>
</template>