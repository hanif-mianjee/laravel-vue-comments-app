<template>
    <div class="row mb-3">
        <div class="col-sm-12">
            <textarea type="text" class="form-control mb-3" v-model="reply" placeholder="Write comment"></textarea>
            <button :class="['btn', this.comment ? 'btn-warning' : 'btn-success']" @click="submit">{{ this.comment ? 'Reply' : 'Post' }}</button>
        </div>
    </div>
</template>

<script>

export default {
    props: ['comment', 'postComment'],
    data(){
        return {
            'reply': ""
        }
    },
    methods: {
        submit() {

            // Validate date

            let data = {
                "comment": this.reply,
                "comment_id": this.comment?.id,
                "user_name": "Test User"
            }
            this.reply = '';
            this.postComment(data)
        }
    },
}
</script>
