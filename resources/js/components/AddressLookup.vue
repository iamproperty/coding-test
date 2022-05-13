<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="form-group row">
          <label for="postcode" class="col-md-4 col-form-label text-md-right">Postcode</label>

          <div class="col-md-8">
            <Postcode @postcode="loadAddresses($event)" class="form-control" id="postcode"/>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <button class="btn btn-primary" @click="loadAddresses(postcode)">Load Addresses</button>
      </div>
    </div>

    <div v-show="addresses.length > 0 && show" class="list-group">
      <a href="#" v-for="address in addresses" @click="select(address)" class="list-group-item list-group-item-action">
        {{ address.line_1 }}
      </a>
    </div>
  </div>
</template>

<script>
import Postcode from './Postcode'

export default {
  name: 'AddressLookup',
  data: function () {
    return {
      postcode: null,
      addresses: [],
      show: false
    }
  },
  methods: {
    loadAddresses(postcode) {
      this.postcode = postcode;

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
