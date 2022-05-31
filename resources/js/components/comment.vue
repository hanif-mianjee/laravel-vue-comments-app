<template>
    <div class="row">
        <div class="col-12">
            <strong>{{comment.user_name}}</strong>
            <p>{{ comment.comment}}</p>
            <reply-form :comment="comment" :postComment="postComment"></reply-form>

            <div class="col-11 offset-1">
                <component :is="child" v-for="replies in comment.replies_recursive" :key="replies.id" :comment="replies"
                           :postComment="postComment"
                           :child="child"
                ></component>
            </div>

        </div>
    </div>

</template>

<script>
import ReplyForm from './form'
export default {
    props: ['comment', 'postComment', 'child'],
    components: {
        ReplyForm
    }
}
</script>
