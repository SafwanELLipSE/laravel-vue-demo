<template>
    <div class="container">
        <h2 class="text-center text-white bg-primary p-2 mt-5">Contact page</h2>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
<<<<<<< HEAD
            <tbody>
                <tr v-for="contact in contacts" :key="contact.id">
=======
            <tbody v-for="contact in contacts" :key="contact.id">
                <tr>
>>>>>>> 8fbd740e01618038b6b8903d439bd5e73a655427
                    <td>{{ contact.id }}</td>
                    <td>{{ contact.name }}</td>
                    <td>{{ contact.email }}</td>
                    <td>{{ contact.designation }}</td>
                    <td>{{ contact.contact_no }}</td>
                    <td>
                        <button class="btn btn-sm btn-danger" @click.prevent="deleteContact(contact.id)">Delete</button>
                        <router-link :to="{ name:'get_contact', params: {id:contact.id} }" class="btn btn-primary btn-sm">Edit</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</template>

<script>
export default {
    name: 'Contact',
    created(){
        this.loadData()
    },
    methods:{
<<<<<<< HEAD
            loadData(){
                let url = this.url + '/api/getContacts';
                this.axios.get(url).then(response => {
                    this.contacts = response.data
                    console.log(this.contacts);
                });
            },
            deleteContact(id){
                let url = this.url + `/api/deleteContact/${id}`;
                this.axios.delete(url).then(response => {
                    if(response.status){
                        this.loadData()
                        this.$utils.showSuccess('Success',response.message);
                    }else{
                        this.$utils.showError('Error',response.message);
                    }
                });
            }
        },
        mounted(){
            console.log('Contact List Component Mounted');
        },
        data(){
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                contacts:[]
            }
=======
        loadData(){
            let url = this.url + '/api/getContacts';
            this.axios.get(url).then(response => {
                this.contacts = response.data
            });
        }
    },
    mounted(){
        console.log('Contact List Component Mounted');
    },
    data(){
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            contacts:[]
>>>>>>> 8fbd740e01618038b6b8903d439bd5e73a655427
        }
}
</script>