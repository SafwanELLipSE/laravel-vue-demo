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
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Tester</td>
                    <td>test@gmail.com</td>
                    <td>1test</td>
                    <td>555-555-555-555</td>
                    <td>
                        <button class="btn btn-sm btn-danger">Delete</button>
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
        loadData(){
            let url = this.url + '/api/getContact';
            this.axios.get(url).then(response => {
                this.contacts = response
            });

        },
        mounted(){
            console.log('Contact List Component Mounted');
        },
        data(){
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                contacts:[]
            }
        }
    }
}
</script>