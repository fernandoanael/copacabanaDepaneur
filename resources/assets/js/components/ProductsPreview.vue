<template>
  <div class="_f-container _f-productspreview-padding">
      <div class="row _f-productspreview-header-margin">
          <div class="col-9">
              <h3>Products Review</h3>
          </div>
          <div class="col-3">
              <a href="http://localhost:3000/products" class="btn btn-outline-dark _f-bold">
                View All
              </a>
          </div>   
      </div>
      <table class="table table-hover">
            <tbody>
                <tr v-for="product in products" >
                    <td>{{product.name}}</td>
                    <td>${{product.price}}</td>
                    <td>x{{product.stock.quantity}}</td>
                    <td class="text-right"><a :href="'http://localhost:3000/products/' + product.id" class="_f-edit-btn">Edit</a></td>
                </tr>
            </tbody>
      </table>

  </div>
</template>

<script>
export default {
  data : function(){
      return {
          products: []
      }
  },
  created : function(){
      axios.get('http://localhost:3000/api/productsreview')
           .then((response) => {
               this.products = response.data;
           })
           .catch((e) => {
               console.error(e);
           });
  }
}
</script>

<style>

</style>
