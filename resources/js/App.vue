<template>
  <div>
    <AddressLookup @select="select"/>
  </div>
</template>

<script>
import AddressLookup from './components/AddressLookup'

export default {
  name: 'App',
  data: function () {
    return {
      selected: null
    }
  },
  methods: {
    select(v) {
      this.selected = v
    }
  },
  filters: {
    json: v => JSON.stringify(v, null, 4)
  },
  components: {
    AddressLookup
  }
}
</script>
