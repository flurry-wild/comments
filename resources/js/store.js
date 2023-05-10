import { createStore } from 'vuex';

const store = createStore({
    state() {
        return {
            commentsKey: null
        }
    }
});

export default store;
