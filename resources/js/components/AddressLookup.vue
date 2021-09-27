<template>
  <div>
    <Postcode @postcode="loadAddresses($event)" />
    <br>
    <ul class="list-group" v-show="addresses.length > 0" id="addressGroup">
      <li v-for="(address, index) in addresses" style="background-color: #b3d7f5;" class="list-group-item">
        <button class="btn" style="width:100%;text-align: left;background-color: #4aa0e6;" data-toggle="collapse" :data-target="'#collapse_index_'+index" aria-expanded="false" :aria-controls="'collapse_index_'+index">
          <strong>{{ address.line_1 }}</strong>
        </button>
        <div :id="'collapse_index_'+index" style="background-color: #fcfff6;" class="collapse" data-parent="#addressGroup">
          <div class="card-body">
            <ul class="list-group">
              <li v-for="(value, ind) in address" :key="ind" style="font-size: small;"><strong>{{ind}}:</strong> {{ value }}</li>
            </ul>
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
        if (j.hasOwnProperty("result"))
        {
          this.show = true;
          this.addresses = j.result;
        }
        else
        {
          this.show = false
          this.addresses = []
        }

      });
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
