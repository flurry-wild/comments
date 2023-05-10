import axios from 'axios';

export default class Comment {
    get (newId) {
        return axios({
            method: 'get',
            url: '/news/'+newId+'/comments'
        });
    }
}
