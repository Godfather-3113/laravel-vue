<template>
    <div style="display: flex; flex-wrap: wrap;">
        <spin v-if="loading"></spin>
        <div style="display:flex; flex-wrap: wrap;" v-else>
            <post
                v-for="post in posts"
                :title="post.title"
                :body="post.body"
                :date="post.created_at"
            />
        </div>
    </div>
</template>

<script>
import Spin from "../components/Spin";
import Post from "../components/Blog/Post";
import axios from "axios"
export default {
    data: () => ({
       loading: true,
        posts: []
    }),
    components: {
        Spin,
        Post
    },
    mounted ()  {
        this.loadPosts();
    },
    methods: {
        loadPosts() {
            axios.get('/api/posts')
            .then(res => {
              this.posts = res.data;
                setTimeout(() => {
                    this.loading = false;
                }, 500)
            })
        }
    },
}
</script>

<style scoped>
    .uk-card {
        width: 40%;
        margin-right: 20px;
        margin-bottom: 20px;
    }

    .uk-card:last-child {
        margin-right: 0;
    }
</style>
