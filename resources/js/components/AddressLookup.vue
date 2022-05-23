<template>
  <div>
    <Postcode @postcode="loadAddresses($event)" />

    <br>
    <ul class="list-group" v-show="addresses.length > 0" id="addressGroup">
      <li v-for="(address, index) in addresses"   class="list-group-item bg-light">
        <button class="btn   bg-dark text-white w-100 text-left"  data-toggle="collapse" :data-target="'#collapse_index_'+index" aria-expanded="false" :aria-controls="'collapse_index_'+index">
          <strong>{{ address.line_1 }}</strong>
        </button>
        <div :id="'collapse_index_'+index" class="collapse " data-parent="#addressGroup">
          <div class="row">
            <div v-for="(value, ind) in address" :key="ind"  v-if="value" class=" col-4 mt-2 "><strong>{{ind}}:</strong> {{ value  }} </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import Postcode from './Postcode'

export default {
  name: 'AddressLookup',
  data: function () {
    return {
      addresses: [],
      show: false
    }
  },
  methods: {
    loadAddresses (postcode) {
      fetch('https://addresses.iamproperty.com/postcodes/' + postcode + '/addresses')
      .then(r => r.json())
      .then(j => {
        this.show = true
        this.addresses = j.result
      })
    },
    select(v) {
      this.show = false
      this.$emit('select', v)
    }
  },
  components: {
    Postcode
  }
}
</script>

<style scoped>

</style>
