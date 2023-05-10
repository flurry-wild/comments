<template>
    <div class="p-5 pt-2">
        <h3 class="pb-5">Обсуждение({{ comments.length }})</h3>
        <div v-for="(comment, index) in comments" class="pb-1">
            <b>{{ 'Ольга' }}</b>
            <div v-html='comment.text'></div>
            <div @click="commentAnswer(index)" v-show='comment.showButtonAnswer'>Ответить</div>
                <div v-for="commentChild in commentsChildren[comment.id]" class="p-5 pt-1 pb-0">
                    <b>{{ 'Ольга' }}</b>
                    <div v-html='commentChild.text'></div>
                </div>
            <CommentForm v-show='!comment.showButtonAnswer' :parent_id='comment.id'></CommentForm>
        </div>
    </div>
</template>
<script>
import Comment from '../models/Comment';
import CommentForm from './CommentForm';

export default {
    name: 'Comments',
    components: { CommentForm },
    data() {
        return {
            newId: window.newId,
            comments: [],
            commentsChildren: []
        }
    },
    created: function () {
        const commentService = new Comment();
        commentService.get(this.newId).then(response => {
            this.comments = response.data.comments;

            for (let i = 0; i < this.comments.length; i++) {
                this.comments[i].showButtonAnswer = true;
            }

            this.commentsChildren = response.data.commentsChildren;
        });
    },
    methods: {
        commentAnswer: function (index) {
            for (let i = 0; i < this.comments.length; i++) {
                this.comments[i].showButtonAnswer = true;
            }
            this.comments[index].showButtonAnswer = false;
        }
    }
}
</script>
