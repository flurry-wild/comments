<template>
    <Panel :header='titleNew' class="p-3 bg-white" :pt="
    {
        header: {class:'bg-cyan-700'},
        title: {class:'text-white text-2xl'},
        content: {class:'text-lg'}
    }
    ">
        <p class="mt-4">
            {{ textNew }}
        </p>
    </Panel>
</template>
<script>
export default {
    name: 'NewComponent',
    data() {
        return {
            textNew: window.textNew,
            titleNew: window.titleNew
        }
    }
}
</script>
