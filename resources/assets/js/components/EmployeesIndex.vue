<template>
    <div class="_f-container">
        <div class="well">
            <input type="text" class="form-control _f-search-input" placeholder="Search" v-model="keyword">
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="_f-list-header">
                <th @click="sort($event,'id')">#</th>
                <th @click="sort($event,'name')">Name</th>
                <th @click="sort($event,'tel')">Tel</th>
                <th @click="sort($event,'address')">Address</th>
                <th @click="sort($event,'salary')">Salary</th>
                <th @click="sort($event,'position')">Position</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="employee in filterBy(orderedEmployees, keyword)" >
                    <td>{{employee.id}}</td>
                    <td>{{employee.name}}</td>
                    <td>{{employee.tel}}</td>
                    <td>{{employee.address}}</td>
                    <td>${{employee.salary}}/hr</td>
                    <td>{{employee.position}}</td>
                   <td><a :href="'/employees/' + employee.id" class="_f-edit-btn">Edit</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
  data: function() {
      return {
          employees: [],
          orderProperty: 'id',
          orderDirection: 'asc',
          keyword: ''
      }
  },
  methods:{
      sort(event, property){
          event.preventDefault();
          this.orderProperty = property;

          if(this.orderDirection == 'asc'){
              this.orderDirection = 'desc';
          }else{
              this.orderDirection = 'asc';
          }
      }
  },
  created: function() {
    axios.get('api/employees')
         .then((response)=>{
            this.employees = response.data;
            console.log(response.data);
         })
         .catch(function(e){
            console.error(e);
         });
    
  },
  computed:{
      orderedEmployees: function(){
         return _.orderBy(this.employees, this.orderProperty, this.orderDirection );
      }
  }
}
</script>
<style>

</style>


