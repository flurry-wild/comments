<template>
    <div class="p-5 pt-2">
        <h3 class="pb-5">Обсуждение({{ totalCountComments }})</h3>
        <div v-for="(comment, index) in comments" class="pb-1">
            <b>{{ 'Ольга' }}</b>
            <div v-html='comment.text'></div>
            <a @click="commentAnswer(index)" v-show='comment.showButtonAnswer'>Ответить</a>
                <div v-for="commentChild in commentsChildren[comment.id]" class="p-5 pt-1 pb-0">
                    <b>{{ 'Ольга' }}</b>
                    <div v-html='commentChild.text'></div>
                </div>
            <CommentForm v-show='!comment.showButtonAnswer' :parent_id='comment.id'></CommentForm>
        </div>
        <Paginator :rows='2' :totalRecords='totalCountComments' @page="onPage($event)"></Paginator>
    </div>
</template>
<script>
import Comment from '../models/Comment';
import CommentForm from './CommentForm';

const commentService = new Comment();

export default {
    name: 'Comments',
    components: { CommentForm },
    data() {
        return {
            newId: window.newId,
            comments: [],
            commentsChildren: [],
            commentsPage: 1,
            totalCountComments: 0
        }
    },
    created: function () {
        this.updateComments()
    },
    methods: {
        commentAnswer: function (index) {
            for (let i = 0; i < this.comments.length; i++) {
                this.comments[i].showButtonAnswer = true;
            }
            this.comments[index].showButtonAnswer = false;
        },
        updateComments: function () {
            commentService.get(this.newId, this.commentsPage).then(response => {
                this.comments = response.data.comments;
                this.totalCountComments = response.data.totalCount;

                for (let i = 0; i < this.comments.length; i++) {
                    this.comments[i].showButtonAnswer = true;
                }

                this.commentsChildren = response.data.commentsChildren;
            });
        },
        onPage: function (event) {
            this.commentsPage = event.page;
            this.updateComments();
        }
    }
}
</script>
<style>
.p-paginator.p-component {
    display:flex;
    justify-content: center;
}
</style>
