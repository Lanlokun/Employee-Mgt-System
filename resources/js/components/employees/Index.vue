<template>
  <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"> Employees  </h1><br/><br/>
        </div>


        <div class="row">
        <div class="card mx-auto">

                <div v-if="showMessage">
                        <div class="alert alert-success">
                                {{ message }}
                        </div>
                </div>
                <div class="card-header">
                `<div class="row">

                <div class="col">
                <form >
                        <div class="form-row align-items-center">
                        <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Name</label>
                        <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search">
                        </div>

                        <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </div>
                        </div>
                        </form>
                        </div>
                        <div>
                         <router-link :to="{name: 'EmployeesCreate'}" class="btn btn-primary mb-2">Create </router-link>   
                        </div>
                        </div>
                        </div>

                <div class="card-body">
                <table class="table">
                         <thead>
                                <tr>
                                <th scope="col">#id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Department</th>
                                <th scope="col">Manage</th>
                                </tr>
                        </thead>
                        <tbody>
                                        
                        <tr v-for="employee in employees" :key="employee.id">
                        <th scope="row"> {{ employee.id }}</th>
                        <td> {{ employee.first_name }}</td>
                        <td> {{ employee.last_name }} </td>
                        <td> {{ employee.address }} </td>
                        <td>{{ employee.department.name  }} </td>

                        <td>
                                <router-link :to="{name: 'EmployeesEdit', params: {id: employee.id}}" class="btn btn-success"><i class="far fa-edit"></i></router-link>
                               <button @click="deleteEmployee(employee.id)" class="btn btn-danger"><i class="fas fa-trash-alt"></i>

                                        </button>
                        </td>
                        
                        </tr>
                      
                        </tbody>
                </table>
                                       
         </div>
        </div>
        </div>
  </div>
</template>

<script>
export default {

    data (){
            return {
                    employees: [],
                    showMessage: false,
                    message: ''
            }
    },
    created() {
            this.getEmployees();
    },

    methods: {
        getEmployees(){
                axios.get('/api/employees')
                     .then(res => {
                             this.employees = res.data.data
                     }).catch(error => {
                             console.log(error);
                     });
        },
        deleteEmployee(id){
                axios.delete('/api/employees/'+ id)
                     .then(res => {
                        this.showMessage = true;
                        this.message = res.data;
                        this.getEmployees();
                     })   
        }



    }
}
</script>

<style>

</style>