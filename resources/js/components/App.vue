<template>
    <NewComponent></NewComponent>
    <Panel class="mt-5">
        <CommentForm></CommentForm>
        <Comments :key="$store.state.commentsKey"></Comments>
    </Panel>
</template>
<script>
import NewComponent from './NewComponent';
import CommentForm from './CommentForm';
import Comments from './Comments';

export default {
    name: 'App',
    components: {
        NewComponent, CommentForm, Comments
    }
}
</script>
