<template>
  <div class="_f-container _f-productspreview-padding">
    <h3 class="_f-productspreview-header-margin">
        Employees  
        <span class="_f-float-right ">      
        <a href="http://localhost:3000/employees" class="btn btn-outline-dark _f-bold">
            View All
        </a>
        </span>
    </h3>
    <table class="table table-hover">
        <tbody>
            <tr v-for="employee in employees" >
                <td>{{employee.name}}</td>
                <td>{{employee.position}}</td>
                <td>${{employee.salary}}/hr</td>
                <td><a :href="'/employees/' + employee.id" class="_f-edit-btn">Edit</a></td>
            </tr>
        </tbody>
    </table> 
  </div>
</template>


<script>
export default {
  data: function(){
      return{
          employees: []
      }
  },
  created: function(){
    axios.get('http://localhost:3000/api/employeesPreview')
         .then((response) => {
            this.employees = response.data;
         })
         .catch((e) => {
            console.error(e);
    });
  }
}
</script>

<style>

</style>
