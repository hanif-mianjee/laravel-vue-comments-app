<template>
    <div>
        <h1 class="mb-5">Comments</h1>
        <comment v-for="comment in comments" :key="comment.id" :comment="comment"
                 :postComment="postComment"
                 :child="child"
        ></comment>

        <hr>

        <div class="card mb-5">
            <div class="card-body">
                <h5 class="card-title">Add Comment</h5>
                <reply-form :postComment="postComment"></reply-form>
            </div>
        </div>

    </div>
</template>

<script>

import Comment from './components/comment'
import ReplyForm from './components/form'

import { ref,reactive, onMounted } from 'vue';
import axios from 'axios';
export default{
    setup(){
        const comments  = ref([]);

        const getComments = async() =>{
            let res = await axios.get('/api/v1/comments');
            comments.value = res.data;
        }

        const postComment = async(data) => {
            try{
                await axios.post('/api/v1/comments',data)
                getComments()

            }catch(e){
                // Handle errors
            }
        }

        onMounted( getComments() );

        return {
            comments,
            postComment,
        }
    },
    data(){
        return {
            "child": Comment
        }
    },
    components: {
        Comment, ReplyForm
    }
}
</script>
