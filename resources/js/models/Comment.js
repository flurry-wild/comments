import axios from 'axios';

export default class Comment {
    get (newId, page) {
        return axios({
            method: 'get',
            url: '/news/'+newId+'/comments',
            params: {
                page: page
            }
        });
    }
}
