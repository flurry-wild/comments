<template>
    <NewComponent></NewComponent>
    <Panel class="mt-5" :pt="
    {
        title: {class:'font-semibold'}
    }">
        <CommentForm></CommentForm>
        <Comments></Comments>
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
