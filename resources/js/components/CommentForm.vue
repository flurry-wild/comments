<template>
    <div class="p-5 pt-1 col-md-5">
        <div class="pb-3"><b>{{userName}}</b></div>
        <Editor v-model="comment" class="pb-3" editorStyle="height: 120px"/>
        <div>
            <Button label="Отправить" @click="sendComment"/>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: 'CommentForm',
    props: {'parent_id': Number, default: null},
    data() {
        return {
            userName: window.userName,
            comment: '',
            newId: window.newId,
            textNew: window.textNew
        }
    },
    methods: {
        sendComment() {
            axios({
                method: 'post',
                url: '/news/'+this.newId+'/comments',
                data: {
                    comment: this.comment,
                    parent_id: this.parent_id
                }
            }).then((response) => {
                if (response.data.status == 'success') {
                    this.$store.state.commentsKey += 1;
                }
            });
        }
    }
}
</script>
