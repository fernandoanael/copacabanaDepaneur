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
                <th @click="sort($event,'price')">Price</th>
                <th @click="sort($event,'cost')">Cost</th>
                <th @click="sort($event,'stock.quantity')">Stock</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in filterBy(orderedProducts, keyword)" >
                    <td>{{product.id}}</td>
                    <td>{{product.name}}</td>
                    <td>${{product.price}}</td>
                    <td>${{product.cost}}</td>
                    <td>{{product.stock.quantity}}</td>
                    <td><a :href="'/products/' + product.id" class="_f-edit-btn">Edit</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
  data: function() {
      return {
          products: [],
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
    axios.get('api/products')
         .then((response)=>{
            this.products = response.data;
            console.log(response.data);
         })
         .catch(function(e){
            console.error(e);
         });
    
  },
  computed:{
      orderedProducts: function(){
         return _.orderBy(this.products, this.orderProperty, this.orderDirection );
      }
  }
}
</script>
<style>

</style>


