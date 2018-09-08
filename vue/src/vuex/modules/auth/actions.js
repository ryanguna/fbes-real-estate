import Vue from 'vue';
export default {
    getAuthenticatedUser({ commit }, payload ){
        // commit('GET_AUTHENTICATED_USER', payload)

        Vue.axios.get('api/user/getCurrentlyLoggedInUser')
            .then((response) => {
                commit('GET_AUTHENTICATED_USER', response.data.data);
            })
            .catch(error => {
                console.log('ERROR');
            });



    }
};
