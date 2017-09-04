<template>
    <div class="_f-container">
        <div class="well">
            <input type="text" class="form-control _f-search-input" placeholder="Search" v-model="keyword">
        </div>
        <table class="table table-hover _f-products-table-scroll">
            <thead>
                <tr class="_f-list-header">
                <th @click="sort($event,'id')">#</th>
                <th @click="sort($event,'name')">Name</th>
                <th @click="sort($event,'price')">Price</th>
                <th @click="sort($event,'stock.quantity')">Stock</th>
                <th>Buy</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in filterBy(orderedProducts, keyword)" >
                    <td>{{product.id}}</td>
                    <td>{{product.name}}</td>
                    <td>${{product.price}}</td>
                    <td>{{product.stock.quantity}}</td>
                    <td class="_f-buy-td">
                        <span class="_f-danger" v-on:click="removeBuy(product)">-</span>
                        {{product.buyed}}
                        <span class="_f-success" v-on:click="addBuy(product)">+</span>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
import bus from '../bus';
export default {
  data: function() {
      return {
          products: [],
          orderProperty: 'id',
          orderDirection: 'asc',
          keyword: '',
          buyedProducts: []
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
      },
      removeBuy(product){
          if(product.buyed >= 1){
              product.buyed -= 1;
              product.stock.quantity += 1;
              bus.$emit('removeBuy', product);
          }
      },
      addBuy(product){
          if(product.stock.quantity >= 1){
              product.buyed += 1;
              product.stock.quantity -= 1;

              bus.$emit('addBuy', product);
          }
      }
  },
  created: function() {
    axios.get('http://localhost:3000/api/products')
         .then((response)=>{
            // Get the response data
            this.products = response.data;

            // Add the buyed property to every product
            this.products.forEach(function(element) {
                element.buyed = 0;
            }, this);
            
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
