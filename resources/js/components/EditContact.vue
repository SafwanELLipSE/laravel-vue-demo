<template>
    <div class="container">
        <h2 class="text-center text-white bg-primary p-2 mt-5">Edit Contact page</h2>

        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form id="validateForm" @submit.prevent="updateContact" enctype="multipart/form-data" novalidate>
                    
                    <div class="alert alert-danger" v-if="errors.length">
                        <ul class="mb-0">
                            <li v-for="(error, index) in errors" :key="index">
                                {{ error }}
                            </li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="">Name:</label>
                        <input type="text" name="name" id="name" v-model="contact.name" placeholder="Enter Your Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="email" name="email" id="email" v-model="contact.email" placeholder="Enter Your Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Designation:</label>
                        <input type="text" name="designation" id="designation" v-model="contact.designation" placeholder="Enter Your Designation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Contact Number:</label>
                        <input type="text" name="contact_no" id="contact_no" v-model="contact.contact_no" placeholder="Enter Your Contact Number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Biography:</label>
                        <textarea type="text" cols="20" rows="3" name="bio" id="bio" v-model="contact.bio" class="form-control" placeholder="Enter Your Biography"></textarea>
                    </div>
                    <div class="form-group" v-if="contact.image">
                        <img :src="`${url+'/'+contact.image}`" alt="image" width="100" height="150">
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" v-on:change="saveImage" class="custom-file-input" id="validatedCustomFile" >
                        <label class="custom-file-label" for="validatedCustomFile">Choose File...</label>
                    </div>

                    <button class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            contact:{},
            name:'',
            email:'',
            designation:'',
            contact_no:'',
            bio:'',
            errors:[]
        }
    },
    methods:{
        loadData(){
            let url = this.url + `/api/get_contact/${this.$route.params.id}`;
            this.axios.get(url).then(response => {
                this.contact = response.data;
                console.log(this.contact);   
            });
        },
        updateContact(){
            this.errors=[];
            if(!this.contact.name){
                this.errors.push('Name is require');
            }
            if(!this.contact.email){
                this.errors.push('Emial is require');
            }
            if(!this.contact.designation){
                this.errors.push('Designation is require');
            }
            if(!this.contact.contact_no){
                this.errors.push('Contact Number is require');
            }
            if(!this.contact.bio){
                this.errors.push('Biography is require');
            }

            if(!this.errors.length){
                let formData = new FormData();
                formData.append('name', this.contact.name);
                formData.append('email', this.contact.email);
                formData.append('designation', this.contact.designation);
                formData.append('contact_no', this.contact.contact_no);
                formData.append('bio', this.contact.bio);
                formData.append('image', this.image);
                
                let url = this.url + `/api/update_contact/${this.$route.params.id}`;
                this.axios.post(url, formData).then((response) =>{
                    if(response.status){
                        this.$utils.showSuccess('Success',response.message);
                        this.$router.push({
                            name:'/'
                        })
                    }else{
                        this.$utils.showError('Error',response.message);
                    }
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            }
        },
        saveImage(e){
            this.image = e.target.files[0];
            console.log(this.image);
        }
    },
    created(){
        this.loadData()
    },
    mounted: function(){
        console.log('Edit contact componant loaded')
    }
}
</script>

<style scoped>

</style>